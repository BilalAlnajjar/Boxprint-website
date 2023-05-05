<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
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
         User::factory(20)->create();
         Message::factory(20)->create();
         Category::factory(10)->create();
         Product::factory(10)->create();
         Project::factory(10)->create();
         CartProduct::factory(10)->create();

        // \App\Models\UserController::factory()->create([
        //     'name' => 'Test UserController',
        //     'email' => 'test@example.com',
        // ]);
    }
}
