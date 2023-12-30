<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use App\Models\Review;
use App\Models\Reward;
use App\Models\Address;
use App\Models\Category;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Models\Notification;
use Illuminate\Database\Seeder;
use App\Models\LostItemDescription;
use App\Models\FoundItemDescription;
use App\Models\LostFoundItem;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin_role = Role::factory()->create([
            'name' => 'admin'
        ]);
        $user_role = Role::factory()->create([
            'name' => 'user'
        ]);
        
        User::factory()->create(['role_id' => 1]); // Admin role
        User::factory()->create(['role_id' => 2]); // User role

        Image::factory(10)->create();
        Category::factory(10)->create();
        Reward::factory(10)->create();
        User::factory(10)->create();
        Address::factory(10)->create();
        Notification::factory(10)->create();
        Review::factory(10)->create();

        for ($i = 0; $i < 10; $i++) {
            $lost_item = LostItem::factory()->create();
            LostItemDescription::factory()->create([
                'lost_item_id' => $lost_item->id
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            $found_item = FoundItem::factory()->create();
            FoundItemDescription::factory()->create([
                'found_item_id' => $found_item->id
            ]);
        }

        LostFoundItem::factory(50)->create();

        $my_address = Address::factory()->create();
        $my_category = Category::factory()->create();
        $my_lost_item = LostItem::factory()->create([
            'address_id' => $my_address->id,
            'category_id' => $my_category->id
        ]);
        $my_found_item = FoundItem::factory()->create([
            'address_id' => $my_address->id,
            'category_id' => $my_category->id
        ]);
        LostItemDescription::factory()->create([
            'color' => 'black',
            'model' => 1990,
            'lost_item_id' => $my_lost_item->id
        ]);
        FoundItemDescription::factory()->create([
            'color' => 'black',
            'model' => 1990,
            'found_item_id' => $my_found_item->id
        ]);
    
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $admin_role->id
        ]);


        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $user_role->id
        ]);
    }
}
