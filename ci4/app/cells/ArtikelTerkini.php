<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->orderBy('tanggal', 'DESC')->findAll(5);

        return view('components/artikel_terkini', $data);
    }
}
