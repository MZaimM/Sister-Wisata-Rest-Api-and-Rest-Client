<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * menampilkan semua data
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Wisata::all();
    }

    /**
     * membuat data baru
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $wisata = new Wisata();
        $wisata->nama = $request->nama;
        $wisata->gambar = $request->gambar;
        $wisata->harga_masuk = $request->harga_masuk;
        $wisata->deskripsi = $request->deskripsi;
        $wisata->save();

        return "data berhasil ditambahkan";
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $gambar = $request->gambar;
        $harga_masuk=$request->harga_masuk;
        $deskripsi = $request->deskripsi;

        $wisata = Wisata::find($id);
        $wisata->nama = $nama;
        $wisata->gambar = $gambar;
        $wisata->harga_masuk = $harga_masuk;
        $wisata->deskripsi = $deskripsi;

        $wisata->save();

        return "Data wisata berhasil diubah";


    }

    /**
     * menghapus data
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $wisata = Wisata::find($id);
        $wisata->delete();

        return "Data Wisata berhasil dihapus";
    }
}
