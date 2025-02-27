<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = true;
    //protected $returnType       = 'array';
    protected $returnType       = \App\Entities\Product::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'status',
        'is_new',
        'is_sale'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'price'         => 'required|greater_than[0]',
        'stock'         => 'required|is_natural',
        'name'          => 'required|min_length[3]',
        //more validation
    ];

    protected $validationMessages   = [
        'price' => [
            'required' => 'Price is required',
            'greater_than' => 'Price must be greater than 0',
        ],
        'stock' => [
            'required' => 'Stock is required',
            'is_natural' => 'Stock need to be a valid number',
        ],
        'name' => [
            'required' => 'Name is required',
            'min_length' => 'Name must be minimum 3 character '
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findActiveProducts(array $data)
    {
        if (!isset($data)) {
            return $data;
        }

        $result = array();
        foreach ($data as $row) {
            if ($row->status == 'active') {
                array_push($result, $row);
            }
        }

        return $result;
    }

    public function getLowStockProducts(array $data)
    {
        if (!isset($data)) {
            return $data;
        }

        $result = array();
        foreach ($data as $row) {
            if ($row->stock > 0 && $row->stock <= 3) {
                array_push($result, $row);
            }
        }

        return $result;
    }

    public function countOutOfStockProducts(array $data)
    {
        if (!isset($data)) {
            return $data;
        }

        $result = array();
        foreach ($data as $row) {
            if ($row->stock == 0) {
                array_push($result, $row);
            }
        }

        return count($result);
    }

    public function countOnSaleProducts(array $data)
    {
        if (!isset($data)) {
            return $data;
        }

        $result = array();
        foreach ($data as $row) {
            if ($row->is_sale == 't') {
                array_push($result, $row);
            }
        }

        return count($result);
    }


    public function getProductsByCategory(array $data, $category_id)
    {
        if (!isset($category_id) || !isset($data)) {
            return $data;
        }

        $result = array();
        foreach ($data as $row) {
            if ($row->category_id == $category_id) {
                array_push($result, $row);
            }
        }

        return $result;
    }

    public function countTotalProducts(array $data)
    {
        return count($data);
    }
}
