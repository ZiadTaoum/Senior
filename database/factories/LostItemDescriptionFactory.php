<?php

namespace Database\Factories;

use App\Models\LostItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lost_item_description>
 */
class LostItemDescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_lost' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'color' => $this->faker->colorName,
            'model' => $this->faker->year($max='now'),
            'lost_item_id' => function(){
                return LostItem::all()->random();
            }
        ];
    }
}
