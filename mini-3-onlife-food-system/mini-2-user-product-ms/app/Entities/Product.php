<?php
  namespace App\Entities;

use Faker\Core\Uuid;

  class Product{
    private $id;
    private $nama;
    private $harga;
    private $stok;
    private $kategori;

    public function __construct($id, array $data)
    {
      $this->id = $id;
      $this->nama = $data['nama'] ?? '';
      $this->harga = $data['harga'] ?? '';
      $this->stok = $data['stok'] ?? '';
      $this->kategori = $data['kategori'] ?? '';
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

    public function toArray(){
      return [
        'id'=> $this->id,
        'nama'=>$this->nama,
        'harga'=>$this->harga,
        'stok'=>$this->stok,
        'kategori'=>$this->kategori
      ];
    }

    //validation methods

  }
?>






