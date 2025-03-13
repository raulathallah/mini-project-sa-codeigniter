<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Product as EntitiesProduct;
use App\Entities\User as EntitiesUser;
use App\Libraries\DataParams;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
    protected $modelUser;
    private $db;

    public function __construct()
    {
        $this->db = db_connect();
        $this->db->initialize();

        $this->modelUser = new UserModel();
    }

    public function index() {}

    public function onCreate(): string
    {
        $new = new EntitiesProduct();

        return view(
            'section_admin/user_form',
            [
                'type' => 'Create',
                'user' => $new,
                'action' => 'create'
            ]
        );
    }

    public function onUpdate($id): string
    {
        $data = $this->modelUser->find($id);
        return view(
            'section_admin/user_form',
            [
                'type' => 'Update',
                'user' => $data,
                'action' => 'update'
            ]
        );
    }

    public function create()
    {
        $data = new EntitiesUser;
        $data->fill($this->request->getPost());
        //$data->setPassword();
        $data->status = 'active';
        $data->last_login = new Time();
        $data->user_id = 1;


        $validationRules = $this->modelUser->getValidationRules();
        $validationMessages = $this->modelUser->getValidationMessages();
        $validationRules['email'] = 'required|is_unique[accounts.email,account_id]|valid_email';
        $validationRules['username'] = 'required|is_unique[accounts.username,account_id]|min_length[3]';

        // Validate input data
        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }
        $this->modelUser->save($data);
        session()->setFlashdata('success', 'User berhasil disimpan');
        return redirect()->to('/admin/user');
    }

    public function update()
    {
        $user_id = $this->request->getPost('user_id');
        $password = $this->request->getPost('password');

        $data = new EntitiesUser;
        $data->fill($this->request->getPost());
        $data->last_login = new Time();

        $validationRules = $this->modelUser->getValidationRules();
        $validationMessages = $this->modelUser->getValidationMessages();

        $validationRules['email'] = 'required|is_unique[users.email,user_id,' . $user_id . ']|valid_email';
        $validationRules['username'] = 'required|is_unique[users.username,user_id,' . $user_id . ']|min_length[3]';

        if (!empty($password)) {
            //$data->password = $data->setPassword();
        } else {
            //$data->password = $data->password;
        }

        // Validate input data
        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }

        $this->modelUser->update($user_id, $data);
        session()->setFlashdata('success', 'User berhasil diubah');
        return redirect()->to('/admin/user');
    }

    public function delete($id)
    {
        $this->modelUser->delete($id);
        return redirect()->to('/admin/user');
    }
}
