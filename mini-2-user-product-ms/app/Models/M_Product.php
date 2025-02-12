<?php 
  namespace App\Models;

use App\Entities\Product;
use CodeIgniter\Model;

  class M_Product extends Model
  {
    private $productArray = array();
    private $session;

    public function __construct()
    {
      $this->session = session();
      $this->productArray = $this->session->get("product_list") ?? [];

    }

    public function getAllProduct()
    {
      return $this->productArray;
    }

    public function getProductById($id)
    {
      foreach($this->productArray as $row){
        if($row->id == $id){
          return $row;
        }
      }
      return null;
    }

    public function addProduct(Product $new){
      $this->productArray[] = $new;
      $this->onSave();
    }

    public function deleteProduct($id){
      foreach($this->productArray as $key => $row){
        if($row->id == $id){
          unset($this->productArray[$key]);
          $this->onSave();
        }
      }
    }

    public function updateProduct(Product $new){
      foreach($this->productArray as $key => $row){
        if($row->id == $new->id){
          $this->productArray[$key] = $new;
          $this->onSave();
        }
      }
    }

    public function kurangStok($id){
      foreach($this->productArray as $key => $row){
        if($row->id == $id){
          $this->productArray[$key]->kurangStok();
        }
      }
    }

    public function tambahStok($id){
      foreach($this->productArray as $key => $row){
        if($row->id == $id){
          $this->productArray[$key]->tambahStok();
        }
      }
    }

    function onSave(){
      $this->session->set("product_list", $this->productArray);
    }

  }
?>