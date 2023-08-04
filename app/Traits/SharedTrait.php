<?php 

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use DB;
use App\Models\UserPlan;
use Carbon\Carbon;
use App\Models\RoiLog;
use App\Models\Wallet;
use Illuminate\Support\Facades\Http;


trait SharedTrait{
   
   public function getLevelHierarchyByUserId($user_id){
        $result= DB::select("SELECT u1.id as current_user_id,u2.id as level1,u3.id as level2 ,u4.id level3,u5.id as level4,u6.id as level5 FROM users as u1 LEFT JOIN users as u2 on u1.referred_by=u2.id LEFT JOIN users as u3 on u2.referred_by=u3.id LEFT JOIN users as u4 on u3.referred_by=u4.id LEFT JOIN users as u5 on u4.referred_by=u5.id LEFT JOIN users as u6 on u5.referred_by=u6.id where u1.id=$user_id");
        return json_decode(json_encode($result), true);
   }

   public function calculateRoi($user_id){
      $plans=UserPlan::where('user_id',$user_id)->where('active',1)->orderBy('id','desc')->get();
      //check and deactivate package
      if($plans->count()>0){
         foreach($plans as $key=>$planInformation){
            if(!is_null($planInformation->roi_until_date) && $planInformation->roi_until_date->toDateString()==$planInformation->expire_date->toDateString()){
               $planInformation->active=0;
               $planInformation->save();
               continue;
            }else{
               
      $now = Carbon::now();
      $date = Carbon::parse($now)->toDateString();
      $dateDiff=$planInformation->expire_date->diffInDays($planInformation->created_at);
      $dailyCake=$planInformation->total_cakes/$dateDiff;
      $dailyAmount=$dailyCake+($dailyCake*$planInformation->planInfo->monthly_roi/100);
      if(is_null($planInformation->roi_until_date)){

        if($planInformation->expire_date->toDateString() > $date){
         $this->checkDateAddRoiInDatabase($user_id,$now,$planInformation->created_at,$planInformation,$dailyAmount);
         }else{
           

            $this->checkDateAddRoiInDatabase($user_id,$planInformation->expire_date,$planInformation->created_at,$planInformation,$dailyAmount);

         }
      }else{
         if($planInformation->expire_date->toDateString() > $date){
           $this->checkDateAddRoiInDatabase($user_id,$now,$planInformation->roi_until_date,$planInformation,$dailyAmount);
            }else{
               $this->checkDateAddRoiInDatabase($user_id,$planInformation->expire_date,$planInformation->roi_until_date,$planInformation,$dailyAmount);
   
            }
      }

   }
}
}
//check and dact package
      }

      private function checkDateAddRoiInDatabase($user_id,$lastDateObj,$currentDateObj,$planInformation,$dailyAmount){
         
         $dateDiff=$lastDateObj->diffInDays($currentDateObj);
        
           if($lastDateObj>=$currentDateObj->toDateString()){
            for($i=1;$i<=$dateDiff;$i++){
               $roiDate=$currentDateObj->addDays(1);
               \Log::info($roiDate);
               $walletInfo=Wallet::where('user_id',$user_id)->first();
               $latestWalletPrice=$walletInfo->non_working_income+$dailyAmount;
               \Log::info($latestWalletPrice);
               try{
               Wallet::where('user_id',$user_id)->update([
                  "non_working_income"=>$latestWalletPrice
               ]);
               // UserPlan::where('id',$planInformation->id)
               // ->update([
               //    "roi_until_date"=>$roiDate,
               //    'expire_date'=>$planInformation->expire_date
               // ]);
               $amounttillThen=is_null($planInformation->roi_price_till_date)?$dailyAmount:$planInformation->roi_price_till_date+$dailyAmount;
               \Log::info($amounttillThen);

               $planInformation->roi_until_date=$roiDate;
               $planInformation->roi_price_till_date=$amounttillThen;
               $planInformation->save();
               RoiLog::create([
                  'user_id'=>$user_id,
                   'amount'=>$dailyAmount,
                  'roi_date'=>$roiDate, 
                  'user_plan_id'=> $planInformation->id
               ]);
            }catch (\Exception $e) {
            }
           }
           
           }
      }

      public function getCakeLivePrie($symbol='CAKEUSDT'){
         $response = Http::get("https://api.binance.com/api/v3/ticker/price?symbol=$symbol");
         return $response->json();
      }

   

}