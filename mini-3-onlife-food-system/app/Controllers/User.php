<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_User;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
    private $user_model;

    public function __construct()
    {
        $this->user_model = new M_User();
    }

    public function index() {}

    public function userProfile()
    {
        $parser = \Config\Services::parser();
        //$userData = $this->user_model->getUser();
        $pageData = [];
        $userData = [];
        if (cache()->get('user')) {
            $userData = cache()->get('user');
            $userData['dob'] = date('F d, Y', strtotime($userData['dob']));
            $pageData = [
                'user' => array($userData)
            ];
        } else {
            $pageData = [
                'user' => []
            ];
        }


        $data['content'] = $parser->setData($pageData)->render('parser/user/user_profile');

        return view('section_public/user_profile', $data);
    }
}
