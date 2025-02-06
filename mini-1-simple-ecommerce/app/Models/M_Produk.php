<?php 
  namespace App\Models;

use App\Entities\Produk;
use CodeIgniter\Model;

  class M_Produk extends Model
  {
    private $produkArray = array();
    private $session;

    public function __construct()
    {
      $this->session = session();
      $this->produkArray = $this->session->get("produk_list") ?? [];
    }

    public function getAllProduk()
    {
      return $this->produkArray;
    }

    public function getProdukById($id)
    {
      foreach($this->produkArray as $row){
        if($row->id == $id){
          return $row;
        }
      }
      return null;
    }

    public function addProduk(Produk $newProduk){
      $this->produkArray[] = $newProduk;
      $this->onSave();
    }

    public function deleteProduk($id){
      foreach($this->produkArray as $key => $row){
        if($row->id == $id){
          unset($this->produkArray[$key]);
          $this->onSave();
        }
      }
    }

    public function updateProduk(Produk $newProduk){
      foreach($this->produkArray as $key => $row){
        if($row->id == $newProduk->id){
          $this->produkArray[$key] = $newProduk;
          $this->onSave();
        }
      }
    }

    public function kurangStok($id){
      foreach($this->produkArray as $key => $row){
        if($row->id == $id){
          $this->produkArray[$key]->kurangStok();
        }
      }
    }

    public function tambahStok($id){
      foreach($this->produkArray as $key => $row){
        if($row->id == $id){
          $this->produkArray[$key]->tambahStok();
        }
      }
    }

    function onSave(){
      $this->session->set("produk_list", $this->produkArray);
    }

  }
?>