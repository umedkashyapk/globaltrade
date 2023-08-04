<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\UserPlan;
use Carbon\Carbon;
use App\Traits\SharedTrait;
use App\Models\Level;
use App\Models\Config;
use App\Models\WorkingIncomeLog;
use App\Models\Wallet;
use App\Traits\TatumManager;
use UserManager;


class PlanController extends Controller
{
    use SharedTrait,TatumManager;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       
        $loggedInUser=$request->user();
       $userPlanData= UserPlan::where('user_id',$loggedInUser->id)->where('expire_date','>=',Carbon::now())->where('active',1)->first();
       if(!is_null($userPlanData)){
        //echo"ttt"; die;
           return redirect('/dashboard');
       }

        $plans=Plan::where('active',1)->get();            
        $cakeVersePrice= Config::where('key_name',config('constants.config.CAKE_VERSE_PRICE'))->first();

        return view('plan.index', ['plans'=>$plans,'cakeVersePrice'=>$cakeVersePrice]);
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
            'plan_id'=>'required|exists:plans,id',
            'total_cake'=>'required',
        ]);
       
            $loggedInUser=$request->user();
            $cakeVersePrice= Config::where('key_name',config('constants.config.CAKE_VERSE_PRICE'))->first();
           // dd($cakeVersePrice);
                $walletBalance=$this->getWalletBalance($loggedInUser->cWalletInfo->address,'CV');
                $selectedPlan= Plan::where(['id'=>$request->plan_id])->first();
                if($request->total_cake%$selectedPlan->min_joining_token !=0){
                    return \Response::json(['message'=>"Purchase Plan price should multiple of  ".$selectedPlan->min_joining_token." USD"],419);

                }

         // $walletBalance=['data' => ['data' => '100',],] ;
               $wbalance= UserManager::getCakePrice($walletBalance['data']['data']);
               $totalCakesRequired=$request->total_cake/$cakeVersePrice->key_value;
        if($wbalance>=$totalCakesRequired){
          if($selectedPlan->min_joining_token<=$request->total_cake){
             $accountAddress= Config::where('key_name',config('constants.config.ADMIN_WALLET_ADDRESS_KEY'))->first();
               $transferToken=$this->transferTokenToAdmin($accountAddress->key_value,$totalCakesRequired,$loggedInUser->cWalletInfo->pkey,'CV');
               \Log::info($transferToken);

               if(isset($transferToken['data']['txId'])){
                 
               // DB::beginTransaction();
                $userPlan=UserPlan::create([
                  'plan_id'     => $request->plan_id,
                  'user_id'     => $loggedInUser->id,
                  'total_cakes' => $totalCakesRequired,
                  'usd_price' => $request->total_cake,
                  'expire_date'=> Carbon::now()->addMonths($selectedPlan->no_of_months),
                  'txId'=>$transferToken['data']['txId']

                ]);
                $this->referalBonusSendToRespectiveUsers($loggedInUser,$totalCakesRequired,$userPlan);
            $wallet= Wallet::where('user_id',$loggedInUser->id)->first();
            if(is_null($wallet)){
                Wallet::create([
                'user_id'=>$loggedInUser->id,
                'working_income'=>0,
                'non_working_income'=>0
                ]);
            }   
            }else{
                return \Response::json(['message'=>$transferToken['data']['message']],419);
            } 
        }else{
              return \Response::json(['message'=>"Min ".$selectedPlan->min_joining_token." USD are required to subscribe plan"],419);
          }
        }else{
             return \Response::json(['message'=>"Wallet Balance is low."],419);
        }

          
         
         return \Response::json([],200);
    }catch(\Exception $e){
        \Log::info($e->getMessage());
            return \Response::json(['error'=>$e->getMessage()],419);
        }
    }
    private function referalBonusSendToRespectiveUsers($loggedInUser,$totalCake,$userPlan){
        $referalUpto=Config::where('key_name','REFERRAL_UPTO')->first();
        $levelInfo= $this->getLevelHierarchyByUserId($loggedInUser->id);
        $referalHList=[];
        for($i=1;$i<=$referalUpto->key_value;$i++){
        if($levelInfo[0]['level'.$i]>0){
            $referalHList[]=$levelInfo[0]['level'.$i];
            if($i>1){
                $purchasePlans=WorkingIncomeLog::where('to_user_id',$levelInfo[0]['level'.$i])->where('level_no',1)->pluck('user_plan_id');
                $totalInvestment=UserPlan::whereIn('id',$purchasePlans)->sum('usd_price');
          if( $totalInvestment<500){ 
            continue;
          }
        }
            $levelPercentageList=Level::where('active',1)->where('level_no',$i)->first();
             $firstLevelpercentage=($totalCake*$levelPercentageList->percentage)/100;
            $wallet= Wallet::where('user_id',$levelInfo[0]['level'.$i])->first();
            if(is_null($wallet)){
                Wallet::create([
                'user_id'=>$levelInfo[0]['level'.$i],
                'working_income'=>$firstLevelpercentage,
                'non_working_income'=>0
                ]);
            }else{
                $updateAmount=$wallet->working_income+$firstLevelpercentage;
                Wallet::where('user_id',$levelInfo[0]['level'.$i])
       ->update([
           'working_income' => $updateAmount
        ]);

            }
            $workingLog=WorkingIncomeLog::create([
            'user_plan_id'=>$userPlan->id,
            'from_user_id'=>$loggedInUser->id,
            'to_user_id'=>$levelInfo[0]['level'.$i],
            'referal_amount'=>$firstLevelpercentage,
            'referal_hierarchy_ids'=>implode(",",$referalHList),
            'level_no'=>$i]);
        }else{
            break;
        }

      
        
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
