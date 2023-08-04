<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planList=[
            0=>[
                'name'                  => '12 months',
                'description'           =>  'Minimum 10 Cakes or Multiple of 10 Cakes(No Limit)',
                'no_of_months'          =>  '12',
                'monthly_roi'           => '12',
                'min_joining_token'     => '10'
            ],
            1=>[
                'name'                  => '18 months',
                'description'           =>  'Minimum 10 Cakes or Multiple of 10 Cakes(No Limit)',
                'no_of_months'          =>  '18',
                'monthly_roi'           => '10',
                'min_joining_token'     => '10'
            ],
            2=>[
                'name'                  => '24 months',
                'description'           =>  'Minimum 10 Cakes or Multiple of 10 Cakes(No Limit)',
                'no_of_months'          =>  '24',
                'monthly_roi'           => '9',
                'min_joining_token'     => '10'
            ]
        ];
        foreach($planList as $key=>$value){
            DB::table('plans')->insert($value);
        }
    }
}
