<?php

namespace App\Controllers;

use App\Models\M_Product;
use App\Models\M_User;

class Api extends BaseController
{
    private $userModel;
    private $productModel;

    public function __construct()
    {
        $this->userModel = new M_User();
        $this->productModel = new M_Product();
    }

    public function index()
    {
        return view('api/v_api');
    } 

    public function product_getIndex_api()
    {
        $data = $this->productModel->getAllProduct();

        if(!$data){
            return $this->response->setJSON([
                'status'=>false,
                'message'=>'No data'
            ]);
        }

        $result = array();
        foreach($data as $row){
            array_push($result, $row->toArray());
        }

        return $this->response->setJSON([
            'status'=>true,
            'message'=>'Success',
            'data'=>$result
        ]);

    } 

    public function product_getDetail_api()
    {
        $data = $this->productModel->getProductById($this->request->getVar('detail_id'));
        if(!$data){
            return $this->response->setJSON([
                'status'=>false,
                'message'=>'User not found'
            ]);
        }
        return $this->response->setJSON([
            'status'=>true,
            'message'=>'Success',
            'data'=>$data->toArray()
        ]);

    } 

    public function user_getIndex_api()
    {
        $data = $this->userModel->getAllUser();

        if(!$data){
            return $this->response->setJSON([
                'status'=>false,
                'message'=>'No data'
            ]);
        }

        $result = array();
        foreach($data as $row){
            array_push($result, $row->toArray());
        }

        return $this->response->setJSON([
            'status'=>true,
            'message'=>'Success',
            'data'=>$result
        ]);

    } 

    public function user_getDetail_api()
    {
        $data = $this->userModel->getUserById($this->request->getVar('detail_id'));
        if(!$data){
            return $this->response->setJSON([
                'status'=>false,
                'message'=>'User not found'
            ]);
        }
        return $this->response->setJSON([
            'status'=>true,
            'message'=>'Success',
            'data'=>$data->toArray()
        ]);

    } 

}
