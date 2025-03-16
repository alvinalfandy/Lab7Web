<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    // Halaman User - List Artikel
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();

        // Ambil semua artikel
        $artikel = $model->findAll();

        // TIDAK perlu ambil artikel_terkini lagi, karena pakai CELL
        return view('artikel/index', compact('artikel', 'title'));
    }

    // Halaman User - Detail Artikel
    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where([
            'slug' => $slug
        ])->first();

        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];

        return view('artikel/detail', compact('artikel', 'title'));
    }

    // Halaman Admin - List Artikel
    public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();

        $artikel = $model->findAll();

        // TIDAK perlu ambil artikel_terkini di sini juga
        return view('artikel/admin_index', compact('artikel', 'title'));
    }

    // Halaman Admin - Tambah Artikel
    public function add()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'isi'   => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel = new ArtikelModel();
            $artikel->insert([
                'judul'   => $this->request->getPost('judul'),
                'isi'     => $this->request->getPost('isi'),
                'slug'    => url_title($this->request->getPost('judul')),
                'tanggal' => date('Y-m-d')
            ]);

            return redirect()->to('admin/artikel');
        }

        $title = "Tambah Artikel";

        return view('artikel/form_add', compact('title'));
    }

    // Halaman Admin - Edit Artikel
    public function edit($id)
    {
        $artikel = new ArtikelModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'isi'   => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel->update($id, [
                'judul' => $this->request->getPost('judul'),
                'isi'   => $this->request->getPost('isi'),
            ]);

            return redirect()->to('admin/artikel');
        }

        $data = $artikel->where('id', $id)->first();

        $title = "Edit Artikel";

        return view('artikel/form_edit', compact('title', 'data'));
    }

    // Halaman Admin - Delete Artikel
    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);

        return redirect()->to('admin/artikel');
    }
}
