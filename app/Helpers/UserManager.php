<?php
namespace App\Helpers;
use Auth;

class UserManager {
    
   
    public function get()
    {
        $currentUser=Auth::user();
        return $currentUser;
    }
    public function accountStatusName()
    {
        $currentUser=Auth::user();
        if($currentUser->account_status==config('constants.account_status.NO_VERIFIED')){
            return 'Unverified';
        }else{
            return 'Verified';
        }
    }
   public function getCakePrice($price){
      return bcdiv($price,1000000000000000000);
   }

    function utcToIst($utc){
        $dt = new \DateTime($utc);
        $tz = new \DateTimeZone('Asia/Kolkata'); // or whatever zone you're after
        $dt->setTimezone($tz);
        return $dt->format('Y-m-d h:i:s a');
    }
  
  
}
