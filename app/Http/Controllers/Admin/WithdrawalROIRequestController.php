<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WithdrawalHistory;
use App\Models\Wallet;
use App\Traits\TatumManager;
use App\Models\Config;
use DB;


class WithdrawalROIRequestController extends Controller
{
    use TatumManager;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           $loggedInUser=$request->user();
         $page = $request->has('page') ? $request->get('page') : 1;
        $limit = $request->has('limit') ? $request->get('limit') :10;
       $whistory=WithdrawalHistory::where('status',config('constants.withdrawal_status.PENDING'))->where('withdraw_type',config('constants.income_types.ROI'));
        $whistory =$whistory->offset(($page - 1) * $limit)->paginate($limit);
    return view('admin.withdrwal-request.roi.index',compact('whistory'));
    }

    public function completedRejectedList(Request $request)
    {
           $loggedInUser=$request->user();
         $page = $request->has('page') ? $request->get('page') : 1;
        $limit = $request->has('limit') ? $request->get('limit') :10;
       $whistory=WithdrawalHistory::whereIn('status',[config('constants.withdrawal_status.COMPLETED'),config('constants.withdrawal_status.REJECTED')])->where('withdraw_type',config('constants.income_types.ROI'));
        $whistory =$whistory->offset(($page - 1) * $limit)->paginate($limit);
    return view('admin.withdrwal-request.roi.crlisting',compact('whistory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try {
            $this->validate($request, [
            'id'=>'required',
            'isApproved'=>'required'
        ]);
            $loggedInUser=$request->user();
     $isPendingWithdrawal=WithdrawalHistory::where('id',$request->id)->where('status',config('constants.withdrawal_status.PENDING'))->where('withdraw_type',config('constants.income_types.ROI'))->first();
     if(is_null($isPendingWithdrawal)){
        return \Response::json(['message'=>"This Withdrawal request does not exists."],419);
     }
     //isApproved==0=> Rejected,1 =>approved
     if($request->isApproved==0){
$isPendingWithdrawal->status=config('constants.withdrawal_status.REJECTED');
    $isPendingWithdrawal->save();
 return \Response::json(['message'=>"Request Rejected successfully"],200);

     }
     $adminWalletKey= Config::where('key_name',config('constants.config.ADMIN_PRIVATE_KEY'))->first();
     $userAddress=$isPendingWithdrawal->userInfo->cWalletInfo->address;
     
    
    $userWallet=Wallet::where('user_id',$isPendingWithdrawal->user_id)->first();
    if(!is_null($userWallet)){
        DB::beginTransaction();
        $userWallet->non_working_income=$userWallet->non_working_income-$isPendingWithdrawal->quantity;
        $userWallet->save();
       $adminCharges=$isPendingWithdrawal->quantity*5/100;
       $netWithdrawalAmount=$isPendingWithdrawal->quantity-$adminCharges;
       
       $transferToken=$this->transferTokenToAdmin($userAddress,$netWithdrawalAmount,$adminWalletKey->key_value,$isPendingWithdrawal->withdrawal_in);

       \Log::info($transferToken);
   if(isset($transferToken['data']['txId'])){
     $isPendingWithdrawal->status=config('constants.withdrawal_status.COMPLETED');
    $isPendingWithdrawal->txId=$transferToken['data']['txId'];
    $isPendingWithdrawal->admin_charges=$adminCharges;
    $isPendingWithdrawal->quantity=$netWithdrawalAmount;
    $isPendingWithdrawal->save();
      DB::commit();
       return \Response::json(['message'=>"Request approved successfully"],200);
   }else{
    DB::rollback();
    return \Response::json(['message'=>"There is error in token withdrawal"],419);
   }
    }
         return \Response::json([],419);
    }catch(\Exception $e){
        \Log::info($e->getMessage());
            return \Response::json(['error'=>$e->getMessage()],419);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportCsv(Request $request){
        $fileName = 'withdrawal-roi-report.csv';
        $withdrawalList=WithdrawalHistory::where('status',config('constants.withdrawal_status.COMPLETED'))->where('withdraw_type',config('constants.income_types.ROI'))->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );  
        $columns = array('User Name','Email','Mobile No','Total Cake Verse', 'Admin Charges', 'Transaction Hash',"Withdrawal Type");
        $callback = function() use($withdrawalList, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

        foreach ($withdrawalList as $withdrawalObj) {
            $row['User Name']  = $withdrawalObj->userInfo->name;
            $row['Email']  = $withdrawalObj->userInfo->email;
            $row['Mobile No']  = $withdrawalObj->userInfo->mobile_number;
            $row['Total Cake Verse']  = $withdrawalObj->quantity;
            $row['Admin Charges']    = $withdrawalObj->admin_charges;
            $row['Transaction Hash']  = $withdrawalObj->txId;
            $row['Withdrawal Type']  = "ROI";

            fputcsv($file, array($row['User Name'],$row['Email'],$row['Mobile No'],$row['Total Cake Verse'],$row['Admin Charges'],$row['Transaction Hash'], $row['Withdrawal Type']
        ));
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
    }
}
