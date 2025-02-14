<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        return view('home', ['environment'=> 'Production']);
    } 

    public function development()
    {
        return view('home', ['environment'=> 'Development']);
    } 

    public function about()
    {
        return view('about');
    } 

}
