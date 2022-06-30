<?php

namespace Database\Factories;

use App\Models\Field;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Field>
 */
class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fieldType = Field::TYPES[array_rand(Field::TYPES)];
        $groupType = Field::GROUPS[array_rand(Field::GROUPS)];

        if ($groupType === Field::GROUPS['page']) {
            $groupTypeValue = Page::TYPES[array_rand(Page::TYPES)];
        } else {
            $groupTypeValue = Post::TYPES[array_rand(Post::TYPES)];
        }

        $name = $this->faker->unique()->jobTitle();

        return [
            'type' => $fieldType,
            'field_group_type' => $groupType,
            'field_group_value' => $groupTypeValue,
            'required' => $this->faker->boolean(),
            'shown_on_table' => $this->faker->boolean(),
            'translated' => in_array($fieldType, [Field::TYPES['string'], Field::TYPES['textarea'], Field::TYPES['editor']]) && $this->faker->boolean(),
            'identifier' => Str::slug($name),
            'name' => [
                'az' => Str::title($name),
                'en' => Str::title($name),
                'ru' => Str::title($name)
            ],
            'placeholder' => [
                'az' => Str::title($name) . ' daxil edin',
                'en' => 'Enter ' . Str::title($name),
                'ru' => 'Bводить ' . Str::title($name)
            ],
            'step' => $fieldType === Field::TYPES['number'] ? 1 : null,
            'min' => $fieldType === Field::TYPES['number'] ? 0 : null,
            'max' => $fieldType === Field::TYPES['number'] ? 200 : null,
            'min_length' => $fieldType === Field::TYPES['string'] ? 5 : null,
            'max_length' => $fieldType === Field::TYPES['string'] ? 255 : null,
        ];
    }
}
