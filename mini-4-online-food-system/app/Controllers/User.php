<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_User;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new UserModel();
    }

    public function index() {}

    public function userProfile($user_id)
    {
        $parser = \Config\Services::parser();
        $userData = $this->modelUser->find($user_id);

        //$y = $this->modelUser->getTotalUsers($x);
        //$x = $this->modelUser->findActiveUsers($this->modelUser->findAll());
        //dd($x);

        $data['content'] = $parser->setData($userData->toArray())->render('parser/user/user_profile');
        return view('section_public/user_profile', $data);
    }
}
