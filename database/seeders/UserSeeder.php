<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $referalCode = strtoupper(substr(md5(time().rand(10000,99999)), 0, 12));

        DB::table('users')->insert([
            'first_name'  => 'Rakashpal',
            'last_name' => 'Singh',
            'email'    =>'rakashpal87@gmail.com',
            'password'=> \Hash::make('admin123'),
            'account_status'=>config('constants.account_status.NO_VERIFIED'),
            'user_type'=>config('constants.role.USER'),
            'referred_by'=>0,
            'referral_code'=>$referalCode,
            'mobile_number'=>'9646367199'
                ]);
    }
}
