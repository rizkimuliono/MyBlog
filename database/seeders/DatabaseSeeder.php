<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Menu;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(3)->create();

        foreach ($categories as $category) {
            Post::factory()->count(5)->create(['category_id' => $category->id]);
        }

        Menu::create(['name' => 'Home', 'link' => '/']);
        Menu::create(['name' => 'About', 'link' => '/about']);
        Menu::create(['name' => 'Login Admin', 'link' => '/admin/login']);

        User::create([
            'name' => 'Admin',
            'email' => 'rizkimuliono@gmail.com',
            'password' => Hash::make('12345678'), // Hash the password
        ]);
    }
}
