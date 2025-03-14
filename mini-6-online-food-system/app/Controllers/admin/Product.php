<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Product as EntitiesProduct;
use App\Entities\ProductImage;
use App\Libraries\DataParams;
use App\Models\CategoryModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    protected $modelProduct;
    protected $modelCategory;
    protected $modelProductImage;
    private $db;

    public function __construct()
    {
        $this->db = db_connect();
        $this->db->initialize();

        $this->modelProduct = new ProductModel();
        $this->modelCategory = new CategoryModel();
        $this->modelProductImage = new ProductImageModel();
    }

    public function index()
    {
        //print_r($this->request->getGet('price_range'));
        $params = new DataParams([
            'search' => $this->request->getGet('search'),
            'price_range' => $this->request->getGet('price_range'),
            'categories' => $this->request->getGet('categories'),
            'sort' => $this->request->getGet('sort'),
            'order' => $this->request->getGet('order'),
            'page' => $this->request->getGet('page_users'),
            'perPage' => $this->request->getGet('perPage')
        ]);

        $result = $this->modelProduct->getFilteredProducts($params);


        $data = [
            //'title' => 'Manajemen Users',
            'products' => $result['products'],
            'pager' => $result['pager'],
            'total' => $result['total'],
            'params' => $params,
            'price_range' => $this->modelProduct->getPriceRange(),
            'categories' => $this->modelProduct->getAllCategories(),
            'baseUrl' => base_url('admin/product'),
        ];

        //$data['content'] = $parser->setData($pageData)->render('parser/product/product_list', ['cache' => HOUR, 'cache_name' => 'cache_product_catalog']);
        return view('section_admin/product_list', $data);
    }

    public function onCreate(): string
    {
        $new = new EntitiesProduct();
        $categories = $this->modelCategory->findAll();

        return view(
            'section_admin/product_form',
            [
                'type' => 'Create',
                'product' => $new,
                'categories' => $categories,
                'action' => 'create'
            ]
        );
    }

    public function onUpdate($id): string
    {
        $data = $this->modelProduct->find($id);
        $categories = $this->modelCategory->findAll();
        return view(
            'section_admin/product_form',
            [
                'type' => 'Update',
                'product' => $data,
                'categories' => $categories,
                'action' => 'update'
            ]
        );
    }

    public function create()
    {
        $data = new EntitiesProduct();
        $data->fill($this->request->getPost());
        $data->product_id = null;
        $data->status = 'active';
        $data->is_new = true;
        $data->is_sale = false;
        $saveProduct = $this->modelProduct->save($data);

        if ($saveProduct == false) {
            return redirect()->back()
                ->with('errors', $this->modelProduct->errors())
                ->withInput();
            return redirect()->to('/admin/product/on_create');
        }

        $pi = new ProductImage();
        $pi->product_id = $this->modelProduct->getInsertID();
        $pi->image_path = "images/placeholder.jpeg";
        $pi->is_primary = true;
        $saveProductImage = $this->modelProductImage->save($pi);

        if ($saveProductImage == false) {
            return redirect()->back()
                ->with('errors', $this->modelProductImage->errors())
                ->withInput();
            return redirect()->to('/admin/product/on_create');
        }

        session()->setFlashdata('success', 'Product berhasil disimpan');
        return redirect()->to('/admin/product');
    }

    public function update()
    {
        $data = new EntitiesProduct;
        $data->fill($this->request->getPost());
        if ($this->modelProduct->save($data)) {

            session()->setFlashdata('success', 'Product berhasil diubah');

            return redirect()->to('/admin/product');
        }

        return redirect()->back()
            ->with('errors', $this->modelProduct->errors())
            ->withInput();
        return redirect()->to('/admin/product');
    }

    public function delete($id)
    {
        $this->modelProduct->delete($id);
        return redirect()->to('/admin/product');
    }

    public function detail($id)
    {
        $product = $this->modelProduct->find($id);
        return view(
            'section_admin/product_detail',
            [
                'product' => $product,
            ]
        );
    }
}
