<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CategorySeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'name'                  => 'Running',
                'description'           => 'A category for every running products',
                'status'                => 'active',
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
                //'deleted_at'            => new Time(),
            ],
            [
                'name'                  => 'Basketball',
                'description'           => 'A category for every basketball products',
                'status'                => 'active',
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
                //'deleted_at'            => new Time(),
            ],
            [
                'name'                  => 'Casual',
                'description'           => 'A category for every casual products',
                'status'                => 'active',
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
                //'deleted_at'            => new Time(),
            ],
        ];
        $this->db->table('categories')->insertBatch($data);
    }
}
