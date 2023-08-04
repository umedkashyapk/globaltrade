<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Traits\SharedTrait;
use App\Traits\TatumManager;
use App\Models\ActivityLog;
use App\Models\UserPlan;
use Carbon\Carbon;
use App\Models\Config;

class DashboardController extends Controller
{   
    use SharedTrait,TatumManager;
     public function index(Request $request){
       // dd($request);
        $loggedInUser=$request->user();
         //dd($loggedInUser);
        $cakePrice=$this->getCakeLivePrie();
        

       //dd($cakePrice);

        // this is for testing

        
        $walletBalance=$this->getWalletBalance($loggedInUser->cWalletInfo->address,'CV');
        $usdtBalance=$this->getWalletBalance($loggedInUser->cWalletInfo->address,'USDT');
        $bnbBalance=$this->getAccountBalance($loggedInUser->cWalletInfo->address);
        $lastActive= $this->getActivityLog($loggedInUser->id);
       $currentPackage= UserPlan::where('user_id',$loggedInUser->id)->where('expire_date','>=',Carbon::now())->first();
       $cakeVersePrice= Config::where('key_name',config('constants.config.CAKE_VERSE_PRICE'))->first();
        // $walletBalance=['data' => ['data' => '100',],] ;
        $this->calculateRoi($loggedInUser->id);
        return view('dashboard.index',compact('loggedInUser','walletBalance','lastActive','currentPackage','cakeVersePrice','cakePrice','bnbBalance',"usdtBalance"));
    }
    private function getActivityLog($userId){
       return ActivityLog::where('user_id',$userId)->orderBy('id',"desc")->first();
    }
}
