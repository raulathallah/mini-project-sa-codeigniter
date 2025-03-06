<?php

namespace App\Models;

use App\Libraries\DataParams;
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
        'category_id'   => 'required',
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
        ],
        'category_id' => [
            'required' => 'Category is required',
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

    public function product_images()
    {
        return $this->hasMany('App\Models\ProductImageModel', 'product_id', 'product_id');
    }

    public function findActiveProducts()
    {
        return $this->where('status', 'active')->countAllResults();
    }

    public function getLowStockProducts()
    {
        return $this
            ->where('stock >', 0)
            ->where('stock <=', 3);
    }

    public function countOutOfStockProducts()
    {
        return $this->where('stock', 0)->countAllResults();
    }

    public function countOnSaleProducts()
    {
        return $this->where('is_sale', true)->countAllResults();
    }


    public function getProductsByCategory($category_id)
    {
        return $this->where('category_id', $category_id);
    }

    public function countTotalProducts()
    {
        return $this->countAllResults();
    }

    public function getFilteredProducts(DataParams $params)
    {
        $joined = $this
            ->select('
            products.product_id as id,
            products.name as productName,
            products.price as price,
            categories.name as categoryName,
            products.status as status,
            products.description as description,
            products.is_new as is_new,
            products.is_sale as is_sale,
            product_images.image_path
            ')
            ->join('categories', 'products.category_id = categories.category_id')
            ->join('product_images', 'product_images.product_id = products.product_id');

        if (!empty($params->search)) { // Apply search
            $joined
                ->groupStart()
                ->like('products.product_id::text', '%' . $params->search . '%', 'both', null, true)
                ->orLike('products.name', $params->search, 'both', null, true)
                ->orLike('categories.name', $params->search, 'both', null, true)
                ->orLike('products.status', $params->search, 'both', null, true)
                ->orLike('products.price::text', '%' . $params->search . '%', 'both', null, true)
                ->orLike('products.description', $params->search, 'both', null, true)
                //->orLike('products.is_new::text', '%' . $params->search . '%', 'both', null, //true)
                //->orLike('products.is_sale::text', '%' . $params->search . '%', 'both', null, true)
                ->groupEnd();
        }

        // Apply sort
        $allowedSortColumns = ['price', 'products.name', 'date'];
        $sort = in_array($params->sort, $allowedSortColumns) ? $params->sort : 'id';
        $order = ($params->order === 'desc') ? 'desc' : 'asc';
        $this->orderBy($sort, $order);

        $result = [
            'products' => $this->paginate($params->perPage, 'products', $params->page),
            'pager' => $this->pager,
            'total' => $this->countAllResults(false)
        ];
        return $result;
    }
}
