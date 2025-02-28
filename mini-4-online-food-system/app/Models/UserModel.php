<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    //protected $returnType       = 'array';
    protected $returnType       = \App\Entities\User::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username',
        'email',
        'password',
        'full_name',
        'role',
        'status',
        'last_login'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'username'      => 'required|is_unique|min_length[3]',
        'email'         => 'required|is_unique|valid_email',
        'password'      => 'required|min_length[8]',
        'full_name'     => 'required',
        'role'          => 'required',
    ];

    protected $validationMessages   = [
        'username' => [
            'required' => 'Username is required',
            'is_unique' => 'Username already exist',
            'min_length' => 'Username must be minimum 3 character',
        ],
        'email' => [
            'required' => 'Email is required',
            'is_unique' => 'Email already exist',
            'valid_email' => 'Email is not valid',
        ],
        'password' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be minimum 8 character '
        ],
        'full_name' => [
            'required' => 'Full name is required',
        ],
        'role' => [
            'required' => 'Role is required',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findActiveUsers()
    {
        return $this->where('status', 'active')->countAllResults();
    }

    public function getTotalUsers()
    {
        return $this->countAllResults();
    }

    public function getNewUsersThisMonth()
    {
        $currTime = Time::now();
        $startOfMonth = Time::createFromTimestamp(strtotime($currTime->format('Y-m-01 00:00:00')));
        $endOfMonth = Time::createFromTimestamp(strtotime($currTime->format('Y-m-t 23:59:59')));
        return $this
            ->where('created_at >=', $startOfMonth)
            ->where('created_at <=', $endOfMonth)
            ->countAllResults();
    }

    public function updateLastLogin()
    {
        //
    }
}
