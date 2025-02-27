<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Product as EntitiesProduct;
use App\Models\CategoryModel;
use App\Models\M_Product;
use App\Models\ProductModel;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    protected $modelProduct;
    protected $modelCategory;
    private $db;

    public function __construct()
    {
        $this->db = db_connect();
        $this->db->initialize();

        $this->modelProduct = new ProductModel();
        $this->modelCategory = new CategoryModel();
    }

    public function index()
    {
        $parser = \Config\Services::parser();

        //ALL PRODUCT
        //$products = $this->product_model->getAllProduct();
        //$products = $this->modelProduct->findAll();

        $productTable = $this->db->table('products');
        $productTable
            ->select('
                products.product_id as id,
                products.name as productName,
                products.price as price,
                categories.name as categoryName,
                products.stock as stock,
                products.description as description,
                products.is_sale as is_sale
            ')
            ->join('categories', 'products.category_id = categories.category_id');
        $products = $productTable->get()->getResult('array');

        //$p = $this->modelProduct->findActiveProducts($this->modelProduct->findAll());
        //dd($p);

        // $product_discounted = array();
        // foreach ($products as $row) {
        //     if ($row['discount']) {
        //         $row['price'] = $row['price'] - $row['price'] * 0.2;
        //     }

        //     $row['price'] = number_format($row['price']);
        //     array_push($product_discounted, $row);
        // }
        $productProcessed = array();
        foreach ($products as $row) {
            array_push($productProcessed, $row);
        }

        $pageData = [
            'products' => $productProcessed,
        ];


        $data['content'] = $parser->setData($pageData)->render('parser/product/product_list', ['cache' => HOUR, 'cache_name' => 'cache_product_catalog']);
        //
        return view('section_public/product_list', $data);
    }

    public function onCreate(): string
    {
        $new = new EntitiesProduct();
        $categories = $this->modelCategory->findAll();


        return view(
            'section_public/product_form',
            [
                'type' => 'Create',
                'product' => $new,
                'categories' => $categories
            ]
        );
    }

    public function onUpdate($id): string
    {
        $data = $this->modelProduct->find($id);
        $categories = array($this->modelCategory->findAll());
        return view(
            'section_public/product_form',
            [
                'type' => 'Update',
                'product' => $data,
                'categories' => $categories
            ]
        );
    }

    public function create()
    {
        $data = new EntitiesProduct;
        $data->fill($this->request->getPost());
        $data->status = 'active';
        $data->is_new = true;
        $data->is_sale = false;


        //save to db
        if ($this->modelProduct->save($data)) {

            session()->setFlashdata('success', 'Product berhasil disimpan');

            return redirect()->to('/product');
        }

        return redirect()->back()
            ->with('errors', $this->modelProduct->errors())
            ->withInput();
        return redirect()->to('/product');
    }

    public function update()
    {
        $data = new EntitiesProduct;
        $data->fill($this->request->getPost());
        if ($this->modelProduct->save($data)) {

            session()->setFlashdata('success', 'Product berhasil diubah');

            return redirect()->to('/product');
        }

        return redirect()->back()
            ->with('errors', $this->modelProduct->errors())
            ->withInput();
        return redirect()->to('/product');
        return redirect()->to('/product');
    }


    public function delete($id)
    {
        $this->modelProduct->delete($id);
        return redirect()->to('/product');
    }
}
