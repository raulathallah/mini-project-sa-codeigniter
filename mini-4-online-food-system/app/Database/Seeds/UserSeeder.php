<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $currTime = Time::now();
        $data = [
            [
                'username'              => 'jodirodi',
                'email'                 => 'jodi@yopmail.com',
                'password'              => 'jodirodi',
                'full_name'             => 'Jodi Rodi',
                'role'                  => 'admin',
                'status'                => 'active',
                'last_login'            => $currTime,
                'created_at'            => $currTime,
                'updated_at'            => $currTime,
                //'deleted_at'            => new Time(),
            ],
            [
                'username'              => 'tatang',
                'email'                 => 'tatang@yopmail.com',
                'password'              => 'tatang',
                'full_name'             => 'Tatang Bala Bala',
                'role'                  => 'member',
                'status'                => 'active',
                'last_login'            => $currTime,
                'created_at'            => $currTime,
                'updated_at'            => $currTime,
                //'deleted_at'            => new Time(),
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
