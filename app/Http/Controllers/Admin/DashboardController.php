<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Config;
use App\Traits\TatumManager;


class DashboardController extends Controller
{
    use TatumManager;
    public function index(){
        $totalUsers=User::all()->count();
        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
         $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $lastMonthUsers = User::whereBetween('created_at',[$fromDate,$tillDate])->get();
        $accountAddress= Config::where('key_name',config('constants.config.ADMIN_WALLET_ADDRESS_KEY'))->first();
        $cakeVerseBalance=$this->getWalletBalance($accountAddress->key_value,'CV');
        $usdtBalance=$this->getWalletBalance($accountAddress->key_value,'USDT');

        return view('admin.dashboard.index',compact('totalUsers','lastMonthUsers','cakeVerseBalance','usdtBalance'));
    }


}
