<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
    public function index() {}


    public function userProfile()
    {
        $parser = \Config\Services::parser();

        $userData = [
            'id' => 1,
            'name' => 'John Doe',
            'dob' => new Time('2024-06-10'),
            'age' => 25,
            'gender' => 'Male',
            'status' => 'ACTIVE',
            'activity_history' => null
        ];

        $pageData = [
            'page_title' => $userData['name'],
            'user_profile_cell' => view_cell('UserProfileCell', ['user' => $userData], MINUTE * 5, 'cache_user_profile')
        ];


        $data['content'] = $parser->setData($pageData)->render('parser/user/user_profile');

        return view('section_public/user_profile', $data);
    }
}
