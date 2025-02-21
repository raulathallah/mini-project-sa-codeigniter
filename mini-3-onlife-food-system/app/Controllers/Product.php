<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Product;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    private $product_model;

    public function __construct()
    {
        $this->product_model = new M_Product();
    }

    public function index()
    {
        $parser = \Config\Services::parser();


        //ALL PRODUCT
        $products = $this->product_model->getAllProduct();

        $product_discounted = array();
        foreach ($products as $row) {
            if ($row['discount']) {
                $row['price'] = $row['price'] - $row['price'] * 0.2;
            }

            $row['price'] = number_format($row['price']);
            array_push($product_discounted, $row);
        }

        $pageData = [
            'products' => $product_discounted,
            'product_statistics_cell' => view_cell('ProductStatisticsCell', ['products' => $products], HOUR, 'cache_product_statistics'),
        ];

        $data['content'] = $parser->setData($pageData)->render('parser/product/product_list', ['cache' => HOUR, 'cache_name' => 'cache_product_catalog']);

        return view('section_public/product_list', $data);
    }
}
