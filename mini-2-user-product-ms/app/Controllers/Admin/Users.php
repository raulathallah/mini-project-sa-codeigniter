<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\M_User;

class Users extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new M_User();
    }

    public function getIndex()
    {
        $data = $this->userModel->getAllUser();
        return view('user/v_user', ['user'=>$data]);
    } 
    
    public function getNew()
    {
        $data = new User('', array());
        return view('user/v_user_form', ['user'=>$data, 'type'=>'Create']);
    } 

    public function postCreate()
    {
        $newData = new User(uniqid(), $this->request->getPost());
        $this->userModel->addUser($newData);
        return redirect()->to('admin/users');
    }

    public function getDetail($id)
    {
        $data = $this->userModel->getUserById($id);
        return view('user/v_user_detail', ['user'=>$data]);
    }

    public function getShow($id)
    {
        $data = $this->userModel->getUserById($id);
        return view('user/v_user_form', ['user'=>$data, 'type'=>'Update']);
    } 
    public function postUpdate($id)
    {
        if($this->request->getMethod() === 'POST'){

            $data = $this->userModel->getUserById($id);
            $newData = new User($data->id, $this->request->getPost());
            $this->userModel->updateUser($newData);
            return redirect()->to('admin/users');
        }else{
            echo "Invalid Method";
        }
    }

    public function deleteRemove($id)
    {
        if($this->request->getMethod() === "DELETE"){
            $this->userModel->deleteUser($id);
            return redirect()->to('admin/users');
        }else{
            echo "Invalid Method";
        }
    }

}
