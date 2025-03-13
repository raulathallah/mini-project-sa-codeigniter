<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_User;
use App\Models\UserModel as UserAccountModel;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new UserAccountModel();
    }

    public function index() {}

    public function userProfile()
    {
        $parser = \Config\Services::parser();

        $userData = $this->modelUser->where('user_id', user_id())->first()->toArray();


        $data['content'] = $parser->setData($userData)->render('parser/user/user_profile');
        return view('section_public/user_profile', $data);
    }
}
