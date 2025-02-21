<?php

namespace App\Models;

use App\Entities\Product;
use CodeIgniter\Model;

class M_Product extends Model
{
  private $productArray = array();

  public function __construct()
  {
    $this->productArray = [
      [
        'id' => 1,
        'name' => 'Basketball Shoes',
        'description' => 'Perfect for athletes who need support and comfort on the court. These shoes come with a special discount and are ready to elevate your game.',
        'price' => 1200000,
        'stock' => 3,
        'status' => 'active',
        'sold' => 10,
        'discount' => true
      ],
      [
        'id' => 2,
        'name' => 'Football Shoes',
        'description' => 'Designed for ultimate performance on the field, these football shoes offer great traction and support. Currently not in stock, but still available for a discount.',
        'price' => 950000,
        'stock' => 2,
        'status' => 'inactive',
        'sold' => 4,
        'discount' => true
      ],
      [
        'id' => 3,
        'name' => 'Basketball Jersey',
        'description' => 'A classic and stylish jersey for basketball enthusiasts. Available now, though no discounts are applied, but it’s perfect for your game days.',
        'price' => 600000,
        'stock' => 9,
        'status' => 'active',
        'sold' => 2,
        'discount' => false
      ],
      [
        'id' => 4,
        'name' => 'Nike Headband',
        'description' => 'A stylish headband by Nike, perfect for any sports activity. Discounted, but not currently in stock.',
        'price' => 250000,
        'stock' => 5,
        'status' => 'inactive',
        'sold' => 12,
        'discount' => true
      ],
      [
        'id' => 4,
        'name' => 'Running Jacket',
        'description' => 'A high-performance running jacket built for durability and comfort, although no discounts are offered at the moment.',
        'price' => 1500000,
        'stock' => 4,
        'status' => 'inactive',
        'sold' => 9,
        'discount' => false
      ],
      [
        'id' => 5,
        'name' => 'Running Shoes',
        'description' => 'Ideal for long-distance runners who need comfort and support. Unfortunately, currently out of stock and no discount is offered.',
        'price' => 750000,
        'stock' => 0,
        'status' => 'active',
        'sold' => 7,
        'discount' => false
      ],
      [
        'id' => 6,
        'name' => 'NFL Jersey',
        'description' => 'Represent your favorite NFL team with this jersey, discounted and ready for you to show off your team spirit.',
        'price' => 700000,
        'stock' => 7,
        'status' => 'active',
        'sold' => 8,
        'discount' => true
      ],
    ];
  }

  public function getAllProduct()
  {
    return $this->productArray;
  }

  public function getProductById($id)
  {
    foreach ($this->productArray as $row) {
      if ($row->id == $id) {
        return $row;
      }
    }
    return null;
  }
}
