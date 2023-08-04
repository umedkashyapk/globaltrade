<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkingIncomeLog;
use App\Models\WithdrawalHistory;
use App\Traits\TatumManager;
use App\Traits\SharedTrait;
use UserManager;
use Carbon\Carbon;
use App\Models\Wallet;
use App\Models\Config;




class TotalWorkingIncomeController extends Controller
{
    use TatumManager,SharedTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loggedInUser=$request->user();
                $this->calcuateWithdrawalIncome($loggedInUser);

         $page = $request->has('page') ? $request->get('page') : 1;
        $limit = $request->has('limit') ? $request->get('limit') :10;
       $workingIncome=WorkingIncomeLog::where('to_user_id',$loggedInUser->id);
        $workingIncome =$workingIncome->offset(($page - 1) * $limit)->paginate($limit);
    $isPendingWithdrawal=WithdrawalHistory::where('user_id',$loggedInUser->id)->where('status',config('constants.withdrawal_status.PENDING'))->where('withdraw_type',config('constants.income_types.TWI'))->first();
   $currenttime=UserManager::utcToIst(Carbon::now());
   $currentDayName=date('D',strtotime($currenttime));
        return view('my-income.twi.index',compact('workingIncome','loggedInUser',"isPendingWithdrawal","currentDayName"));

    }
    private function calcuateWithdrawalIncome($loggedInUser){
        $currenttime=UserManager::utcToIst(Carbon::now());
        $userWallet=Wallet::where('user_id',$loggedInUser->id)->first();
        if(!is_null($userWallet)){
            if($userWallet->working_income>0){
 //            $workingILog=WorkingIncomeLog::where('to_user_id',$loggedInUser->id)->first();
 // $dif=Carbon::parse( $workingILog->created_at )->diffInDays( Carbon::now() );
 // $noOfWeel=intval($dif/7);
 //             if($noOfWeel==0){
 //                return;
 //             }
                if(is_null($userWallet->withdrawal_till_date) ){

                   
                    $weeklyWidthrwal=$userWallet->working_income*5/100;
                    $userWallet->withdrawal_working_income=$weeklyWidthrwal;//*$noOfWeel;
                    $userWallet->withdrawal_till_date=Carbon::now();
                    $userWallet->save();
                }else{
                    
             //         $dif=Carbon::parse( $userWallet->withdrawal_till_date )->diffInDays( Carbon::now() );
             //         $noOfWeel=intval($dif/7);
             // if($noOfWeel==0){
             //    return;
             // }
                    $weeklyWidthrwal=$userWallet->working_income*5/100;
                      $userWallet->withdrawal_working_income=$weeklyWidthrwal;//$userWallet->withdrawal_working_income+$weeklyWidthrwal*$noOfWeel;
                    $userWallet->withdrawal_till_date=Carbon::now();
                    $userWallet->save();
                }
            }
        }

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
            'total_cake'=>'required',
            'wi'        =>'required'
        ]);
            $loggedInUser=$request->user();
     $isPendingWithdrawal=WithdrawalHistory::where('status',config('constants.withdrawal_status.PENDING'))->where('withdraw_type',config('constants.income_types.TWI'))->where('user_id',$loggedInUser->id)->first();
     if(!is_null($isPendingWithdrawal)){
        return \Response::json(['message'=>"Your Previous Withdrawal Request in Pending State."],419);
     }

    // $walletBalance=$this->getWalletBalance($loggedInUser->cWalletInfo->address);
    // $wbalance=(int) UserManager::getCakePrice($walletBalance['data']['data']);
$wamount=$loggedInUser->walletInfo->withdrawal_working_income??0;

    if($wamount>=$request->total_cake){
        $withdrawalToken=$request->total_cake;
        if($request->wi=='USDT'){
            $cakeVersePrice= Config::where('key_name',config('constants.config.CAKE_VERSE_PRICE'))->first();
            $withdrawalToken=$withdrawalToken*$cakeVersePrice->key_value;
        }
          $withdrawalHistory=WithdrawalHistory::create([
             'user_id'=>$loggedInUser->id,
             'quantity'=>$withdrawalToken,
             'withdraw_type'=>config('constants.income_types.TWI'),
              'status'=>config('constants.withdrawal_status.PENDING'),
              'withdrawal_in'=>$request->wi
          ]);
           return \Response::json(['message'=>"Withdrawal request send to admin"],200);
        }else{
             return \Response::json(['message'=>"Your Withdrawal Balance is $wamount"],419);
        }

          
         
         return \Response::json([],200);
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
}
