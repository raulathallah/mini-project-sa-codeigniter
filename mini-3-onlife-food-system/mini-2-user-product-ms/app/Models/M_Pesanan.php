<?php 
  namespace App\Models;

  use App\Entities\Pesanan;
  use CodeIgniter\Model;

  class M_Pesanan extends Model
  {
    private $pesananArray = array();
    private $session;

    public function __construct()
    {
      $this->session = session();
      $this->pesananArray = $this->session->get("pesanan_list") ?? [];
    }

    public function getAllPesanan()
    {
      return $this->pesananArray;
    }

    public function getPesananById($id)
    {
      foreach($this->pesananArray as $row){
        if($row->id == $id){
          return $row;
        }
      }
      return null;
    }

    public function addPesanan(Pesanan $new){
      $this->pesananArray[] = $new;
      $this->onSave();
    }

    public function deletePesanan($id){
      foreach($this->pesananArray as $key => $row){
        if($row->id == $id){
          unset($this->pesananArray[$key]);
          $this->onSave();
        }
      }
    }

    public function updateProduk(Pesanan $new){
      foreach($this->pesananArray as $key => $row){
        if($row->id == $new->id){
          $this->pesananArray[$key] = $new;
          $this->onSave();
        }
      }
    }

    public function updateStatusById($id, $status){
      foreach($this->pesananArray as $key => $row){
        if($row->id == $id){
          $this->pesananArray[$key]->updateStatus($status);
          $this->onSave();
        }
      }
    }

    function onSave(){
      $this->session->set("pesanan_list", $this->pesananArray);
    }

  }
?>