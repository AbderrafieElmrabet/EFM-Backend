<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Rolex Submariner',
                'content' => 'Luxury diving watch with a classic design.',
                'price' => null,
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1
            ],
            [
                'title' => 'Omega Speedmaster',
                'content' => 'The legendary watch that went to the moon.',
                'price' => null,
                'stock' => 8,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1
            ],
            [
                'title' => 'Tag Heuer Carrera',
                'content' => 'A stylish sports chronograph.',
                'price' => null,
                'stock' => 12,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1
            ],
            [
                'title' => 'Patek Philippe Nautilus',
                'content' => 'A rare and luxurious timepiece.',
                'price' => null,
                'stock' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1
            ],
            [
                'title' => 'Audemars Piguet Royal Oak',
                'content' => 'An iconic luxury sports watch.',
                'price' => null,
                'stock' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1
            ],
        ]);
    }
}
