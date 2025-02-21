<?php

namespace App\Controllers;

use App\Models\M_User;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
  private $user_model;

  public function __construct()
  {
    $this->user_model = new M_User();
  }

  public function login()
  {
    helper('date');
    $now = date('Y-m-d H:i:s', now());

    $user = $this->user_model->getUser();

    $user['activity_history'] = array_merge($user['activity_history'], [['desc' => 'login', 'time' => $now]]);

    cache()->save('logged_in', $now, MINUTE * 5);
    cache()->save("user", $user, MINUTE * 5);

    return redirect()->to('/home');
  }

  public function logout()
  {
    cache()->delete("user");
    cache()->delete("logged_in");
    return redirect()->to('/');
  }
}
