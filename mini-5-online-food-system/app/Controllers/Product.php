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
        $productTable = $this->db->table('products');
        $productTable
            ->select('
                products.product_id as id,
                products.name as productName,
                products.price as price,
                categories.name as categoryName,
                products.stock as stock,
                products.description as description,
                products.is_sale as is_sale,
                product_images.image_path
            ')
            ->join('categories', 'products.category_id = categories.category_id')
            ->join('product_images', 'product_images.product_id = products.product_id');
        $products = $productTable->get()->getResult('array');

        $pageData = [
            'products' => $products,
        ];

        $data['content'] = $parser->setData($pageData)->render('parser/product/product_list', ['cache' => HOUR, 'cache_name' => 'cache_product_catalog']);
        //
        return view('section_public/product_list', $data);
    }
}
