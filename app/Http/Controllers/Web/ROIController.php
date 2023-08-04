<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkingIncomeLog;
use App\Models\RoiLog;
use App\Models\WithdrawalHistory;
use App\Traits\TatumManager;
use App\Traits\SharedTrait;
use UserManager;
use App\Models\Config;


class ROIController extends Controller
{
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
       $roiLog=RoiLog::where('user_id',$loggedInUser->id);
        $roiLog =$roiLog->offset(($page - 1) * $limit)->paginate($limit);
            $isPendingWithdrawal=WithdrawalHistory::where('user_id',$loggedInUser->id)->where('status',config('constants.withdrawal_status.PENDING'))->where('withdraw_type',config('constants.income_types.ROI'))->first();

        return view('my-income.roi.index',compact('roiLog','loggedInUser','isPendingWithdrawal'));
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
     $isPendingWithdrawal=WithdrawalHistory::where('user_id',$loggedInUser->id)->where('status',config('constants.withdrawal_status.PENDING'))->where('withdraw_type',config('constants.income_types.ROI'))->first();
     if(!is_null($isPendingWithdrawal)){
        return \Response::json(['message'=>"Your Previous Withdrawal Request in Pending State."],419);
     }

    // $walletBalance=$this->getWalletBalance($loggedInUser->cWalletInfo->address);
    // $wbalance=(int) UserManager::getCakePrice($walletBalance['data']['data']);
$wamount=$loggedInUser->walletInfo->non_working_income??0;
    if($wamount>=$request->total_cake){
        $withdrawalToken=$request->total_cake;
        if($request->wi=='USDT'){
            $cakeVersePrice= Config::where('key_name',config('constants.config.CAKE_VERSE_PRICE'))->first();
            $withdrawalToken=$withdrawalToken*$cakeVersePrice->key_value;
        }
          $withdrawalHistory=WithdrawalHistory::create([
             'user_id'=>$loggedInUser->id,
             'quantity'=>$withdrawalToken,
             'withdraw_type'=>config('constants.income_types.ROI'),
              'status'=>config('constants.withdrawal_status.PENDING'),
              'withdrawal_in'=>$request->wi
          ]);
           return \Response::json(['message'=>"Withdrawal request send to admin"],200);
        }else{
             return \Response::json(['message'=>"Wallet Balance is low."],419);
        }

          
         
         return \Response::json([],200);
    }catch(\Exception $e){
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
