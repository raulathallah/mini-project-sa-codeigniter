<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $datamap = [];

    protected $attributes = [
        'user_id'       => null,
        'username'      => null,
        'email'         => null,
        'password'      => null,
        'full_name'     => null,
        'role'          => null,
        'status'        => null,
        'last_login'    => null,
        'created_at'    => null,
        'updated_at'    => null,
        'deleted_at'    => null
    ];

    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_login'
    ];

    protected $casts   = [
        'user_id'        => 'integer',
        //'email'     => 'email'
    ];

    public function isAdmin()
    {
        if ($this->attributes['role'] != "admin") {
            return false;
        }

        return true;
    }

    public function getFullName()
    {
        return $this->attributes['full_name'];
    }

    public function getFormattedLastLogin()
    {
        //blom format
        return $this->attributes['last_login'];
    }

    public function setPassword()
    {
        $hashPassword = password_hash($this->attributes['password'], PASSWORD_BCRYPT);
        $this->attributes['password'] = $hashPassword;
        return $hashPassword;
    }
}
