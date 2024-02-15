<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reports')->delete();
        
        \DB::table('reports')->insert(array (
            0 => 
            array (
                'id' => 5,
                'created_at' => '2024-02-13 08:07:30',
                'updated_at' => '2024-02-13 08:07:30',
                'user_id' => 1,
                'date' => '2024-02-01',
                'year' => 2024,
                'month' => 2,
                'day' => 1,
            ),
            1 => 
            array (
                'id' => 6,
                'created_at' => '2024-02-13 08:09:15',
                'updated_at' => '2024-02-13 08:09:15',
                'user_id' => 1,
                'date' => '2024-02-02',
                'year' => 2024,
                'month' => 2,
                'day' => 2,
            ),
            2 => 
            array (
                'id' => 7,
                'created_at' => '2024-02-13 08:10:58',
                'updated_at' => '2024-02-13 08:10:58',
                'user_id' => 1,
                'date' => '2024-02-05',
                'year' => 2024,
                'month' => 2,
                'day' => 5,
            ),
            3 => 
            array (
                'id' => 8,
                'created_at' => '2024-02-13 08:11:41',
                'updated_at' => '2024-02-13 08:11:41',
                'user_id' => 1,
                'date' => '2024-02-06',
                'year' => 2024,
                'month' => 2,
                'day' => 6,
            ),
            4 => 
            array (
                'id' => 9,
                'created_at' => '2024-02-13 08:14:56',
                'updated_at' => '2024-02-13 08:14:56',
                'user_id' => 1,
                'date' => '2024-02-07',
                'year' => 2024,
                'month' => 2,
                'day' => 7,
            ),
        ));
        
        
    }
}