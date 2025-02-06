<?php

namespace App\Controllers;

use App\Entities\Pesanan as EntitiesPesanan;
use App\Models\M_Pesanan;
use App\Models\M_Produk;

class Pesanan extends BaseController
{
    private $pesananModel;
    private $produkModel;

    public function __construct()
    {
        $this->pesananModel = new M_Pesanan();
        $this->produkModel = new M_Produk();
    }

    public function index()
    {
        
        $data = $this->pesananModel->getAllPesanan();

        return view('pesanan/v_pesanan', ['pesanan'=>$data]);
    } 
    
    public function on_create()
    {
        $produk = $this->produkModel->getAllProduk();
        return view('pesanan/v_pesanan_create', ['produk'=> $produk]);
    } 

    public function create()
    {
        $produk = $this->request->getVar('produk');
        
        $array_produk = array();
        $total = 0;
        $status = "SEDANG DIPROSES";

        foreach($produk as $row){
            $details = $this->produkModel->getProdukById($row);
            $total = $total + $details->harga;
            array_push($array_produk, $details);
        }

        $data = $this->pesananModel->getAllPesanan();

        $newData = new EntitiesPesanan( 
            count($data) + 1,
            $array_produk,
            $total,
            $status
        );
        $this->pesananModel->addPesanan($newData);
        return redirect()->to('/order');
    } 

    public function delete($id)
    {
        $this->pesananModel->deletePesanan($id);
        return redirect()->to('/order');
    }
}
