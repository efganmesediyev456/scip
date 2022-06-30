<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sessions')->delete();
        
        \DB::table('sessions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sessionable_id' => 1,
                'sessionable_type' => 'App\\Models\\Admin',
                'identifier' => '558905339',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36',
                'ip' => '127.0.0.1',
                'location' => 'Unknown',
                'expires_at' => '2022-06-27 00:47:56',
                'created_at' => '2022-06-21 11:27:47',
                'updated_at' => '2022-06-27 00:47:56',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'sessionable_id' => 1,
                'sessionable_type' => 'App\\Models\\Admin',
                'identifier' => '1803284119',
                'user_agent' => 'PostmanRuntime/7.28.4',
                'ip' => '127.0.0.1',
                'location' => 'Unknown',
                'expires_at' => '2022-07-01 11:46:55',
                'created_at' => '2022-06-21 11:46:55',
                'updated_at' => '2022-06-21 11:46:55',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'sessionable_id' => 1,
                'sessionable_type' => 'App\\Models\\Admin',
                'identifier' => '1258210810',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36',
                'ip' => '127.0.0.1',
                'location' => 'Unknown',
                'expires_at' => '2022-07-07 00:38:03',
                'created_at' => '2022-06-27 00:38:03',
                'updated_at' => '2022-06-27 00:38:03',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'sessionable_id' => 1,
                'sessionable_type' => 'App\\Models\\Admin',
                'identifier' => '1436550867',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36',
                'ip' => '127.0.0.1',
                'location' => 'Unknown',
                'expires_at' => '2022-07-07 00:48:24',
                'created_at' => '2022-06-27 00:48:24',
                'updated_at' => '2022-06-27 00:48:24',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'sessionable_id' => 1,
                'sessionable_type' => 'App\\Models\\Admin',
                'identifier' => '1228476695',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36',
                'ip' => '127.0.0.1',
                'location' => 'Unknown',
                'expires_at' => '2022-07-07 00:48:26',
                'created_at' => '2022-06-27 00:48:26',
                'updated_at' => '2022-06-27 00:48:26',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}