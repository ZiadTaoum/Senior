<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Image;
use App\Models\Review;
use App\Models\Reward;
use App\Models\Address;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lost_item>
 */
class LostItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['found', 'pending', 'not found'];
        $random_status_index = rand($min=0, $max=2);
        return [
            'item_name' => $this->faker->name,
            'status' => $statuses[$random_status_index],
            'user_id' => function(){
                return User::all()->random();
            },
            'image_id' => function(){
                return Image::all()->random();
            },
            'address_id' => function(){
                return Address::all()->random();
            },
            'category_id' => function(){
                return Category::all()->random();
            },
            'review_id' => function(){
                return Review::all()->random();
            },
            'reward_id' => function(){
                return Reward::all()->random();
            },
        ];
    }
}
