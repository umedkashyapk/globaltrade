<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levelList=[
            0=>[
            'name' => "Level 1",
            'percentage' => 10,
            'level_no' => 1,
            ],
            1=>[
                'name' => "Level 2",
                'percentage' => 5,
                'level_no' => 2,
                ],
            2=>[
                'name' => "Level 3",
                'percentage' => 3,
                'level_no' => 3,
                ], 
            3=>[
                'name' => "Level 4",
                'percentage' => 2,
                'level_no' => 4,
                ],
            4=>[
                'name' => "Level 5",
                'percentage' => 1,
                'level_no' => 5,
                ],              
    ];
        foreach($levelList as $key=>$value){
            DB::table('levels')->insert($value);
        }
    }
}
