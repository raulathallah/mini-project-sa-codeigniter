<?php

namespace App\Controllers;

use App\Entities\Product;
use App\Models\M_Product;
use App\Models\M_Produk;
use CodeIgniter\RESTful\ResourceController;

class Products extends ResourceController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new M_Product();
    }

    public function getIndex()
    {
        $data = $this->productModel->getAllProduct();
        return view('product/v_product', ['product'=>$data]);
    } 
    
    public function getNew()
    {
        $data = new Product('', array());
        return view('product/v_product_form', ['product'=>$data, 'type'=>'Create']);
    } 

    public function getShow($id)
    {
        $data = $this->productModel->getProductById($id);
        return view('product/v_product_form', ['product'=>$data, 'type'=>'Update']);
    } 

    public function getDetail($id)
    {
        $data = $this->productModel->getProductById($id);
        return view('product/v_product_detail', ['product'=>$data]);
    }

    public function postCreate()
    {
        $newData = new Product(uniqid(), $this->request->getPost());
        $this->productModel->addProduct($newData);
        return redirect()->to('/products');
    }

    public function postUpdate($id)
    {
        $data = $this->productModel->getProductById($id);
        $newData = new Product($data->id, $this->request->getPost());
        $newData->stok = $data-> stok;
        $this->productModel->updateProduct($newData);
        return redirect()->to('/products');
    }

    public function postDelete($id)
    {
        $this->productModel->deleteProduct($id);
        return redirect()->to('/products');
    }

    public function getKurangStok($id)
    {
        $this->productModel->kurangStok($id);
        return redirect()->to('/products');
    }

    public function getTambahStok($id)
    {
        $this->productModel->tambahStok($id);
        return redirect()->to('/products');
    }
}
