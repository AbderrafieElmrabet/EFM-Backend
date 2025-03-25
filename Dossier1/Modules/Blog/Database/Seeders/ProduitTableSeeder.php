<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('produit')->insert([
            [
                'name' => 'Laptop',
                'price' => 999.99,
                'stock' => 10,
            ],
            [
                'name' => 'Smartphone',
                'price' => 699.99,
                'stock' => 20,
            ],
            [
                'name' => 'Headphones',
                'price' => 199.99,
                'stock' => 15,
            ],
            [
                'name' => 'Monitor',
                'price' => 299.99,
                'stock' => 8,
            ],
            [
                'name' => 'Keyboard',
                'price' => 49.99,
                'stock' => 25,
            ],
        ]);
    }
}
