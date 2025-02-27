<?php

namespace App\Cells;

use App\Models\M_Product;
use App\Models\ProductModel;
use CodeIgniter\View\Cells\Cell;

class ProductStatisticsCell extends Cell
{
    //protected $trend;
    //protected $inventory;

    protected $totalProducts;
    protected $outOfStock;
    protected $onSale;
    protected $activeProduct;


    public function mount(array $products)
    {
        $modelProduct = new ProductModel();
        $this->totalProducts = count($products);
        $this->outOfStock = $modelProduct->countOutOfStockProducts($products);
        $this->onSale = $modelProduct->countOnSaleProducts($products);
        $this->activeProduct = count($modelProduct->findActiveProducts($products));

        //inventory
        // $inventoryResult = array();
        // foreach ($products as $row) {
        //     $stockStatus = "";
        //     if ($row->stock < 5 && $row->stock != 0) {
        //         $stockStatus = "Low";
        //     } else if ($row->stock == 0) {
        //         $stockStatus = "Out of Stock";
        //     } else {
        //         $stockStatus = "Good";
        //     }

        //     array_push($inventoryResult, ['name' => $row->name, 'stock' => $row->stock, 'stockStatus' => $stockStatus]);
        // }
        //$this->inventory = $inventoryResult;

        //total products
        //$this->totalProducts = count($products);

        //trend
        //$sorted = $products;
        // usort($sorted, function ($a, $b) {
        //     if ($a->sold === $b->sold) {
        //         return 0;
        //     }
        //     return $a->sold > $b->sold ? -1 : 1;
        // });

        //$this->trend = array_slice($sorted, 0, 3);
    }

    public function getTotalProductsProperty()
    {
        return $this->totalProducts;
    }

    public function getOutOfStockProperty()
    {
        return $this->outOfStock;
    }

    public function getOnSaleProperty()
    {
        return $this->onSale;
    }

    public function getActiveProductProperty()
    {
        return $this->activeProduct;
    }
}
