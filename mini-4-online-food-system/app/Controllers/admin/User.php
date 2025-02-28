<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Product as EntitiesProduct;
use App\Entities\User as EntitiesUser;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

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
            'section_admin/product_form',
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
        //save to db
        if ($this->modelUser->save($data)) {

            session()->setFlashdata('success', 'User berhasil disimpan');

            return redirect()->to('/admin/user');
        }

        return redirect()->back()
            ->with('errors', $this->modelUser->errors())
            ->withInput();
        return redirect()->to('/admin/user');
    }

    public function update()
    {
        $data = new EntitiesProduct;
        $data->fill($this->request->getPost());
        if ($this->modelUser->save($data)) {

            session()->setFlashdata('success', 'User berhasil diubah');

            return redirect()->to('/admin/user');
        }

        return redirect()->back()
            ->with('errors', $this->modelUser->errors())
            ->withInput();
        return redirect()->to('/admin/user');
    }

    public function delete($id)
    {
        $this->modelUser->delete($id);
        return redirect()->to('/admin/user');
    }
}
