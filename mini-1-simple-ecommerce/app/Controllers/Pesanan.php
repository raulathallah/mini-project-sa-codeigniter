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

    public function on_update_status($id)
    {
        $pesanan = $this->pesananModel->getPesananById($id);
        return view('pesanan/v_pesanan_update_status', ['pesanan'=> $pesanan]);
    } 

    public function update_status($id)
    {
        $status = $this->request->getVar('status');
        $this->pesananModel->updateStatusById($id, $status);
        return redirect()->to('/order');
    } 

    public function create()
    {
        $produk = $this->request->getVar('produk');
        
        $status = "SEDANG DIPROSES";
        $produk_array = array();

        foreach($produk as $row){
            $detail = $this->produkModel->getProdukById($row);
            array_push($produk_array, $detail);
        }

        $data = $this->pesananModel->getAllPesanan();
    
        $newData = new EntitiesPesanan( 
            count($data) + 1,
            $produk_array,
            0,
            $status
        );
        $newData->calculateTotal();
        $this->pesananModel->addPesanan($newData);
        return redirect()->to('/order');
    } 

    public function delete($id)
    {
        $this->pesananModel->deletePesanan($id);
        return redirect()->to('/order');
    }
}
