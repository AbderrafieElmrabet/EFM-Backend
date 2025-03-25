<?php

namespace Modules\Blog\Database\Seeders;

use Modules\Blog\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeederBlog extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProduitTableSeeder::class);

        // User::factory(10)->create();
    }
}
