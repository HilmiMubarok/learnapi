<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        return Mahasiswa::all();
    }

    public function create(request $request)
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;

        $mahasiswa->save();

        return "Sukses";
    }

    public function update(request $request, $nim)
    {
        $nama = $request->nama;
        $alamat = $request->alamat;

        $mahasiswa = Mahasiswa::find($nim);
        $mahasiswa->nama = $nama;
        $mahasiswa->alamat = $alamat;

        $mahasiswa->save();

        return "Sukses";

    }

    public function delete($nim)
    {
        $mahasiswa = Mahasiswa::find($nim);


        $mahasiswa->delete();

        return "Sukses";
    }
}
