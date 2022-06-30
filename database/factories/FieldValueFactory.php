<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FieldValue>
 */
class FieldValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => $this->faker->randomElement([[
                'az' => 'Bəli',
                'en' => 'Yes',
                'ru' => 'Da'
            ], [
                'az' => 'Xeyr',
                'en' => 'No',
                'ru' => 'Net'
            ]])
        ];
    }
}
