<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public $categories = [
        'electronics',
        'clothing',
        'health_beauty',
        'home_garden',
        'toys',
        'sport',
        'pets',
        'books',
        'accessories',
        'motors'
    ];

    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
