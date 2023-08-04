<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'first_name'  => 'Admin',
            'last_name' => 'User',
            'email'    =>'rakashpal87@gmail.com',
            'password'=> \Hash::make('password'),
            'account_status'=>config('constants.account_status.VERIFIED'),
            'user_type'=>config('constants.role.SUPER_ADMIN'),
            'mobile'=>'9646367199'
                ]);
    }
}
