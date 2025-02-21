<?php 
  namespace App\Models;

  use App\Entities\User;
  use CodeIgniter\Model;

  class M_User extends Model
  {
    private $userArray = array();
    private $session;

    public function __construct()
    {
      $this->session = session();
      $this->userArray = $this->session->get("user_list") ?? [];

    }

    public function getAllUser()
    {
      return $this->userArray;
    }

    public function getUserById($id)
    {
      foreach($this->userArray as $row){
        if($row->id == $id){
          return $row;
        }
      }
      return null;
    }

    public function getUserByName($slug)
    {
      foreach($this->userArray as $row){
        if(str_replace(' ', '', $row->nama) == $slug){
          return $row;
        }
      }
      return null;
    }
    
    public function getUserByRole($slug)
    {

      foreach($this->userArray as $row){
        if(str_replace(' ', '', $row->role) == $slug){
          return $row;
        }
      }
      return null;
    }

    public function addUser(User $new){
      $this->userArray[] = $new;
      $this->onSave();
    }

    public function deleteUser($id){
      foreach($this->userArray as $key => $row){
        if($row->id == $id){
          unset($this->userArray[$key]);
          $this->onSave();
        }
      }
    }

    public function updateUser(User $new){
      foreach($this->userArray as $key => $row){
        if($row->id == $new->id){
          $this->userArray[$key] = $new;
          $this->onSave();
        }
      }
    }
    function onSave(){
      $this->session->set("user_list", $this->userArray);
    }

  }
?>