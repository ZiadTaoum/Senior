<?php

namespace Database\Factories;

use App\Models\FoundItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\found_item_description>
 */
class FoundItemDescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => $this->faker->word,
            'dateFound' => $this->faker->date,
            'color' => $this->faker->colorName,
            'model' => $this->faker->year($max='now'),
            'found_item_id' => function(){
                return FoundItem::all()->random();
            }
        ];
    }
}
