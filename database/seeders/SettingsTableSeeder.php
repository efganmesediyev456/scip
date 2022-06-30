<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentKeys = Settings::pluck('key');

        foreach (config('settings') as $key => $type) {
            if ($currentKeys->contains($key)) {
                continue;
            }

            Settings::create([
                'type' => $type,
                'key' => $key,
                'value' => collect(config('app.locales'))->map(fn ($value) => [$value => "example-value"])->collapse()->toArray()
            ]);
        }
    }
}
