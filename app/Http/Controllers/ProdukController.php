<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        return Produk::all();
    }

    public function create(request $request)
    {
        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;

        $produk->save();


        return response($produk);
    }

    public function update(request $request, $id)
    {
        $nama_produk = $request->nama_produk;
        $harga_produk = $request->harga_produk;
        $deskripsi_produk = $request->deskripsi_produk;

        $produk = Produk::find($id);
        $produk->nama_produk = $nama_produk;
        $produk->harga_produk = $harga_produk;
        $produk->deskripsi_produk = $deskripsi_produk;

        $produk->save();

        return "Sukses";

    }

    public function delete(request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return "Sukses";
    }

    public function produkAuth()
    {
        $data = "Welcome ". Auth::user()->name;
        return response()->json($data, 200);
    }
}
