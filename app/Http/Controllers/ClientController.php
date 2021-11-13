<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ClientController extends Controller
{
    
    public function index()
    {
        $client =  new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://wisata-api-zaim.test',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);

        $response = $client->get('/api/wisata');
        $body = $response->getBody();

        return view('layouts/main', [
            'dataBody' => json_decode($body, true)
        ]);
    }

    public function create(Request $request)
    {
        $client =  new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://wisata-api-zaim.test',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);


        $client->post('/api/wisata', [
            'json' => [
                'nama' => $request->input('nama'),
                'gambar' => $request->input('gambar'),
                'harga_masuk' => $request->input('harga_masuk'),
                'deskripsi' => $request->input('deskripsi'),
            ]
        ]);


        return redirect('/')->with('status', 'Data berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        $client =  new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://wisata-api-zaim.test',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);

        $id = $request->input('id');
        $client->put('/api/wisata/' . $id, [
            'json' => [
                'nama' => $request->input('nama'),
                'gambar' => $request->input('gambar'),
                'harga_masuk' => $request->input('harga_masuk'),
                'deskripsi' => $request->input('deskripsi'),
            ]
        ]);

        return redirect('/')->with('status', 'Data berhasil Diupdate');
    }

    public function destroy(Request $request)
    {
        $client =  new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://wisata-api-zaim.test',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);

        $id = $request->input('id');
        $client->delete('/api/wisata/' . $id, [
            'json' => [
                'nama' => $request->input('nama'),
                'gambar' => $request->input('gambar'),
                'harga_masuk' => $request->input('harga_masuk'),
                'deskripsi' => $request->input('deskripsi'),
            ]
        ]);
        return redirect('/')->with('status', 'Data berhasil Dihapus');
    }
}
