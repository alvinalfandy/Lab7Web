<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Home extends BaseController
{
    public function index()
    {
        $title = 'Beranda';
        $model = new ArtikelModel();

        // Ambil semua artikel
        $artikel = $model->orderBy('tanggal', 'DESC')->findAll();

        // Ambil 3 artikel terkini
        $artikel_terkini = $model->orderBy('tanggal', 'DESC')->findAll(3);

        // Kirim ke view
        return view('home', compact('artikel', 'artikel_terkini', 'title'));
    }
}
