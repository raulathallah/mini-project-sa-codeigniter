<?php
  namespace App\Entities;

  class Produk{
    private $id;
    private $nama;
    private $harga;
    private $stok;
    private $kategori;

    public function __construct($id, $nama, $harga, $stok, $kategori)
    {
      $this->id = $id;
      $this->nama = $nama;
      $this->harga = $harga;
      $this->stok = $stok;
      $this->kategori = $kategori;
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

    public function kurangStok(){
      return $this->stok = $this->stok - 1;
    }
    
    public function tambahStok(){
      return $this->stok = $this->stok + 1;
    }

    //validation method
  }
?>






