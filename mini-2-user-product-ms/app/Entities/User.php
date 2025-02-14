<?php
  namespace App\Entities;

  class User{
    private $id;
    private $nama;
    private $email;
    private $role;

    public function __construct($id, array $data)
    {
      $this->id = $id;
      $this->nama = $data['nama'] ?? '';
      $this->email = $data['email'] ?? '';
      $this->role = $data['role'] ?? '';
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

    public function toArray(){
      return [
        'id'=> $this->id,
        'nama'=>$this->nama,
        'role'=>$this->role
      ];
    }
    
    //validation methods
  }
?>






