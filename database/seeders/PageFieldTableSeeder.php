<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageFieldTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {



        \DB::table('page_field')->insert(array (
            0 =>
                array (
                    'id' => 13,
                    'field_id' => 66,
                    'page_id' => 16,
                    'field_value_id' => NULL,
                    'value' => NULL,
                ),

        ));


    }
}
