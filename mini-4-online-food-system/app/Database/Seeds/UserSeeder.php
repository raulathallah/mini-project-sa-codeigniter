<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'username'              => 'jodirodi',
                'email'                 => 'jodi@yopmail.com',
                'password'              => 'jodirodi',
                'full_name'             => 'Jodi Rodi',
                'role'                  => 'admin',
                'status'                => 'active',
                'last_login'            => new Time(),
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
                //'deleted_at'            => new Time(),
            ],
            [
                'username'              => 'tatang',
                'email'                 => 'tatang@yopmail.com',
                'password'              => 'tatang',
                'full_name'             => 'Tatang Bala Bala',
                'role'                  => 'member',
                'status'                => 'active',
                'last_login'            => new Time(),
                'created_at'            => new Time(),
                'updated_at'            => new Time(),
                //'deleted_at'            => new Time(),
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
