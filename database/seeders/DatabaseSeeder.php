<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Field;
use App\Models\FieldValue;
use App\Models\Page;
use App\Models\SearchEngineField;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(SettingsTableSeeder::class);

//        if (Admin::count() === 0) {
//            Admin::factory(5)->create();
//        }
//
//        if (Page::whereKey(1)->doesntExist()) {
//            $mainPage = new Page();
//            $mainPage->type = Page::TYPES['main'];
//            $mainPage->shown_in_menu = false;
//            $mainPage->slug = [
//                'az' => '',
//                'en' => '',
//                'ru' => '',
//            ];
//            $mainPage->name = [
//                'az' => 'Ana səhifə',
//                'en' => 'Main Page',
//                'ru' => 'Главная страница'
//            ];
//            $mainPage->published = true;
//            $mainPage->save();
//
//            $seo = new SearchEngineField();
//            $seo->keywords = localed([]);
//
//            $seo->title = [
//                'az' => 'Ana səhifə',
//                'en' => 'Main Page',
//                'ru' => 'Главная страница'
//            ];
//
//            $seo->description = [
//                'az' => 'Ana səhifə',
//                'en' => 'Main Page',
//                'ru' => 'Главная страница'
//            ];
//
//            $mainPage->seo()->save($seo);
//        }

//        Page::factory(20)->createQuietly([
//            'page_type' => Page::TYPES['content'],
//            'page_id' => Page::all()->random()->id
//        ]);

//        Field::factory(150)->createQuietly()->each(function (Field $field) {
//            if (in_array($field->type, [Field::TYPES['select'], Field::TYPES['radio'], Field::TYPES['multiselect']])) {
//                FieldValue::factory(2)->createQuietly([
//                    'field_id' => $field->id
//                ]);
//            }
//        });


        $this->call(PagesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);


        $this->call(FieldsTableSeeder::class);
        $this->call(FieldValuesTableSeeder::class);
        $this->call(JobsTableSeeder::class);




        $this->call(PostsTableSeeder::class);
        $this->call(SearchEngineFieldsTableSeeder::class);
        $this->call(SessionsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(MediaTableSeeder::class);


        $this->call(PageFieldTableSeeder::class);

    }
}
