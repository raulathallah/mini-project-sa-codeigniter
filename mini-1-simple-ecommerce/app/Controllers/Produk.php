<?php

namespace App\Controllers;

use App\Entities\Produk as EntitiesProduk;
use App\Models\M_Produk;

class Produk extends BaseController
{
    private $produkModel;

    public function __construct()
    {
        $this->produkModel = new M_Produk();
    }

    public function index()
    {
        $data = $this->produkModel->getAllProduk();
        return view('produk/v_produk', ['produk'=>$data]);
    } 
    
    public function on_create()
    {
        return view('produk/v_produk_create');
    } 

    public function on_update($id)
    {
        $data = $this->produkModel->getProdukById($id);
        return view('produk/v_produk_update', ['produk'=>$data]);
    } 

    public function detail($id):string
    {
        $data = $this->produkModel->getProdukById($id);
        return view('produk/v_produk_detail', ['produk'=>$data]);
    }

    public function create()
    {
        $newData = new EntitiesProduk( 
            $this->request->getVar('id'),
            $this->request->getVar('nama'),
            $this->request->getVar('harga'),
            $this->request->getVar('stok'),
            $this->request->getVar('kategori')
        );
        $this->produkModel->addProduk($newData);
        return redirect()->to('/');
    }

    public function update($id)
    {
        $data = $this->produkModel->getProdukById($id);
        $newData = new EntitiesProduk( 
            $this->request->getVar('id'),
            $this->request->getVar('nama'),
            $this->request->getVar('harga'),
            $data->stok,
            $this->request->getVar('kategori'),
        );

        $this->produkModel->updateProduk($newData);
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->produkModel->deleteProduk($id);
        return redirect()->to('/');
    }

    public function kurang_stok($id)
    {
        $this->produkModel->kurangStok($id);
        return redirect()->to('/');
    }

    public function tambah_stok($id)
    {
        $this->produkModel->tambahStok($id);
        return redirect()->to('/');
    }
}
