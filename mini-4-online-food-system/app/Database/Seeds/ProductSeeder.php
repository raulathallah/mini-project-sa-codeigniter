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
                'name'                  => 'Lakers Jersey',
                'description'           => '2011 Lakers Jersey from the NBA',
                'price'                 => '1200000',
                'category_id'           => 2,
                'status'                => 'active',
                'stock'                 => 5,
                'is_new'                => false,
                'is_sale'               => true,
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
                //'deleted_at'            => new Time(),
            ],
            [
                'name'                  => 'Red T-Shirt',
                'description'           => 'Casual T-Shirt for daily use',
                'price'                 => '250000',
                'category_id'           => 3,
                'stock'                 => 1,
                'status'                => 'active',
                'is_new'                => true,
                'is_sale'               => false,
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
                //'deleted_at'            => new Time(),
            ],
        ];
        $this->db->table('products')->insertBatch($data);
    }
}
