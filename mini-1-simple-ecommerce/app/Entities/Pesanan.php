<?php
  namespace App\Entities;

  class Pesanan{
    private $id;
    private $produk;
    private $total;
    private $status;

    public function __construct($id, $produk, $total, $status)
    {
      $this->id = $id;
      $this->produk = $produk;
      $this->total = $total;
      $this->status = $status;
    }

    public function __get($atribute) {
      if (property_exists($this, $atribute)) {
        return $this->$atribute;
      }
    }
      
    public function __set($atribut, $value){
      if (property_exists($this, $atribut)) 
      {
        $this->$atribut = $value;
      }  
    }

    public function addProduk($newProduk){
      $this->produk = $newProduk;
    }
    
    public function removeProduk($id){
      foreach($this->produk as $key => $row){
        if($row->id == $id){
          unset($this->produk[$key]);
        }
      }
    }

    public function calculateTotal(){
      foreach($this->produk as $row){
        $this->total = $this->total + $row->harga;
      }
      return $this->total;
    }

    public function updateStatus($status){
      $this->status = $status;
    }
  }
?>






