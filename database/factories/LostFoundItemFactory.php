<?php

namespace Database\Factories;

use App\Models\FoundItem;
use App\Models\LostItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LostFoundItem>
 */
class LostFoundItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lost_item_id' => function(){
                return LostItem::all()->random();
            },
            'found_item_id' => function(){
                return FoundItem::all()->random();
            },
            'email_sent' => rand(0,1),
            'admin_checked' => rand(0,1)
        ];
    }
}
