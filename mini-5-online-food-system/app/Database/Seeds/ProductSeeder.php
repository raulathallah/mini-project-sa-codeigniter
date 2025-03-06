<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProductSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'name'                  => 'Spaghetti Bolognese',
                'description'           => 'Classic Italian pasta served with a rich, savory bolognese sauce.',
                'price'                 => 70000,  // 70,000 IDR
                'category_id'           => 1,        // Food category
                'status'                => 'active',
                'stock'                 => 15,
                'is_new'                => true,
                'is_sale'               => false,
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
            ],

            [
                'name'                  => 'Penne Arrabbiata',
                'description'           => 'Spicy Italian penne pasta with tomato, garlic, and chili sauce.',
                'price'                 => 65000,  // 65,000 IDR
                'category_id'           => 1,        // Food category
                'status'                => 'active',
                'stock'                 => 20,
                'is_new'                => false,
                'is_sale'               => true,
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
            ],

            [
                'name'                  => 'Iced Lemon Tea',
                'description'           => 'Refreshing iced tea with a twist of lemon for a perfect balance of sweetness and tartness.',
                'price'                 => 15000,  // 15,000 IDR
                'category_id'           => 2,        // Drinks category
                'status'                => 'active',
                'stock'                 => 30,
                'is_new'                => true,
                'is_sale'               => false,
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
            ],

            [
                'name'                  => 'Cappuccino',
                'description'           => 'Classic Italian cappuccino with rich espresso and frothy milk.',
                'price'                 => 25000,  // 25,000 IDR
                'category_id'           => 2,        // Drinks category
                'status'                => 'active',
                'stock'                 => 40,
                'is_new'                => false,
                'is_sale'               => true,
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
            ],


        ];
        $this->db->table('products')->insertBatch($data);
    }
}
