<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FieldValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('field_values')->delete();
        
        \DB::table('field_values')->insert(array (
            0 => 
            array (
                'id' => 1,
                'field_id' => 17,
                'value' => '{"az":"Imelda Sullivan","en":"Ella Horn","ru":"Noelani Allison"}',
                'created_at' => '2022-06-24 14:05:29',
                'updated_at' => '2022-06-24 14:05:29',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'field_id' => 17,
                'value' => '{"az":"Ba\\u015fl\\u0131q","en":"Ba\\u015fl\\u0131q","ru":"Ba\\u015fl\\u0131q"}',
                'created_at' => '2022-06-24 14:05:40',
                'updated_at' => '2022-06-24 14:05:40',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'field_id' => 27,
                'value' => '{"az":"boz","en":"boz","ru":"boz"}',
                'created_at' => '2022-06-24 14:25:23',
                'updated_at' => '2022-06-24 14:25:23',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'field_id' => 27,
                'value' => '{"az":"qehveyi","en":"qehveyi","ru":"qehveyi"}',
                'created_at' => '2022-06-24 14:25:38',
                'updated_at' => '2022-06-24 14:25:38',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'field_id' => 27,
                'value' => '{"az":"boz-qehveyi","en":"boz-qehveyi","ru":"boz-qehveyi"}',
                'created_at' => '2022-06-24 14:25:53',
                'updated_at' => '2022-06-24 14:25:53',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'field_id' => 27,
                'value' => '{"az":"yasil","en":"yasil","ru":"yasil"}',
                'created_at' => '2022-06-24 14:26:15',
                'updated_at' => '2022-06-24 14:26:15',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}