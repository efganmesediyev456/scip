<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->company();

        return [
            'name' => [
                'az' => Str::title($name),
                'en' => Str::title($name),
                'ru' => Str::title($name)
            ],
            'slug' => [
                'az' => Str::slug($name),
                'en' => Str::slug($name),
                'ru' => Str::slug($name)
            ],
            'published' => $this->faker->boolean()
        ];
    }
}
