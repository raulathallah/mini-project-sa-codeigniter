<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        $userData = array();
        if (cache()->get("user")) {
            $userData = cache()->get("user");
        }
        return view('home', ['user' => $userData]);
    }

    public function login()
    {
        return view('login');
    }

    public function about()
    {
        return view('about');
    }
}
