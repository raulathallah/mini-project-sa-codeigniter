<?php

namespace App\Controllers;

use App\Entities\User as UserAccountModel;
use App\Models\M_User;
use CodeIgniter\I18n\Time;
use Myth\Auth\Controllers\AuthController;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;

class Auth extends AuthController
{
  protected $auth;
  protected $config;
  protected $userModel;
  protected $groupModel;
  protected $accountModel;

  public function __construct()
  {
    //$this->user_model = new M_User();
    parent::__construct();
    $this->userModel = new UserModel();
    $this->groupModel = new GroupModel();
    $this->accountModel = new UserAccountModel();

    $this->auth = service('authentication');
  }

  public function attemptLogin()
  {
    $result = parent::attemptLogin();
    return $this->redirectBasedOnRole();
  }

  public function attemptRegister()
  {
    // Jalankan registrasi bawaan
    $store = parent::attemptRegister();
    $email = $this->request->getPost('email');

    $roleGroup = $this->request->getPost('role_group');
    //$roleGroup = 'student';

    $user = $this->userModel->where('email', $email)->first();

    if ($user) {
      // Tambahkan ke group student
      $studentGroup = $this->groupModel->where('name', $roleGroup)->first();
      if ($studentGroup) {
        $this->groupModel->addUserToGroup($user->id, $studentGroup->id);
      }
    }
    return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
  }

  private function redirectBasedOnRole()
  {
    $userId = user_id();

    if ($userId == null) {
      return redirect()->to('/login');
    }

    $userGroups = $this->groupModel->getGroupsForUser($userId);

    // foreach ($userGroups as $group) {
    //   if ($group['name'] === 'admin') {
    //     return redirect()->to('dashboard/admin');
    //   } else if ($group['name'] === 'lecturer') {
    //     return redirect()->to('dashboard/lecturer');
    //   } else if ($group['name'] === 'student') {
    //     return redirect()->to('dashboard/student');
    //   }
    // }

    return redirect()->to('/');
  }

  // public function login()
  // {
  //   helper('date');
  //   $now = date('Y-m-d H:i:s', now());

  //   //$user = $this->user_model->getUser();

  //   //$user['activity_history'] = array_merge($user['activity_history'], [['desc' => 'login', 'time' => $now]]);

  //   //cache()->save('logged_in', $now, MINUTE * 5);
  //   //cache()->save("user", $user, MINUTE * 5);

  //   return redirect()->to('/home');
  // }

  // public function logout()
  // {
  //   cache()->delete("user");
  //   cache()->delete("logged_in");
  //   return redirect()->to('/');
  // }
}
