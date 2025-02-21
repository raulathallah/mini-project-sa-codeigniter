<?php

namespace App\Models;

use App\Entities\Product;
use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class M_User extends Model
{
  private $user;

  public function __construct()
  {
    $this->user = [
      'id' => 1,
      'name' => 'John Doe',
      'dob' => new Time('2024-06-10'),
      'age' => 25,
      'gender' => 'Male',
      'status' => 'ACTIVE',
      'activity_history' => [],
    ];
  }

  public function getUser()
  {
    return $this->user;
  }
}
