<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Product as EntitiesProduct;
use App\Entities\User as EntitiesUser;
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

    public function index()
    {
        $productTable = $this->db->table('products');
        $productTable
            ->select('
                products.product_id as id,
                products.name as productName,
                products.price as price,
                categories.name as categoryName,
                products.stock as stock,
                products.status as status,
                products.description as description,
                products.is_new as is_new,
                products.is_sale as is_sale,
                product_images.image_path
            ')
            ->join('categories', 'products.category_id = categories.category_id')
            ->join('product_images', 'product_images.product_id = products.product_id');
        $products = $productTable->get()->getResult('array');


        //$data['content'] = $parser->setData($pageData)->render('parser/product/product_list', ['cache' => HOUR, 'cache_name' => 'cache_product_catalog']);
        return view('section_admin/product_list', ['products' => $products]);
    }

    public function onCreate(): string
    {
        $new = new EntitiesProduct();

        return view(
            'section_admin/user_form',
            [
                'type' => 'Create',
                'user' => $new,
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
            ]
        );
    }

    public function create()
    {
        $data = new EntitiesUser;
        $data->fill($this->request->getPost());
        $data->setPassword();
        $data->status = 'active';
        $data->last_login = new Time();


        $validationRules = $this->modelUser->getValidationRules();
        $validationMessages = $this->modelUser->getValidationMessages();
        $validationRules['email'] = 'required|is_unique[users.email,user_id]|valid_email';
        $validationRules['username'] = 'required|is_unique[users.username,user_id]|min_length[3]';

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
            $data->password = $data->setPassword();
        } else {
            $data->password = $data->password;
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
