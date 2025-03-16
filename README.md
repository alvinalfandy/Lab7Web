<div align="center">
  <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" width="100" alt="PHP Logo">
  <img src="https://www.svgrepo.com/show/353579/codeigniter.svg" width="100" alt="CodeIgniter 4 Logo">
</div>

# 📌 Tugas Praktikum 1-3

Dokumen ini berisi laporan tugas untuk praktikum 1 hingga 3 dalam mata kuliah Pemrograman Website 2. Setiap praktikum mencakup konsep dasar hingga implementasi menggunakan framework CodeIgniter 4.

Dalam praktikum ini, mahasiswa diharapkan memahami konsep framework, arsitektur MVC (Model-View-Controller), serta mampu mengembangkan aplikasi web sederhana dengan CodeIgniter 4. Setiap tahap dijelaskan secara rinci mulai dari instalasi, konfigurasi, hingga pengembangan fitur CRUD, routing, serta penggunaan View Layout dan View Cell.

Laporan ini juga dilengkapi dengan screenshot hasil implementasi untuk mendukung pemahaman serta sebagai bukti keberhasilan dalam menyelesaikan setiap langkah praktikum. Dengan menyelesaikan tugas ini, mahasiswa diharapkan mampu membangun aplikasi berbasis web dengan struktur yang lebih terorganisir, efisien, dan modular.

## 🔗 Daftar Isi

| No  | Praktikum                                  | Link                                                     |
| --- | ------------------------------------------ | -------------------------------------------------------- |
| 1   | Praktikum 1: PHP Framework (CodeIgniter 4) | [Klik di sini](#praktikum-1-php-framework-codeigniter-4) |
| 2   | Praktikum 2: Framework Lanjutan (CRUD)     | [Klik di sini](#praktikum-2-framework-lanjutan-crud)     |
| 3   | Praktikum 3: View Layout dan View Cell     | [Klik di sini](#praktikum-3-view-layout-dan-view-cell)   |

## 👤 Profil Mahasiswa

| Atribut         | Keterangan            |
| --------------- | --------------------- |
| **Nama**        | Alvin Alfandy         |
| **NIM**         | 312310473             |
| **Kelas**       | TI.23.A.5             |
| **Mata Kuliah** | Pemrograman Website 2 |

---

# Praktikum 1: PHP Framework (CodeIgniter 4)

## 🎯 Tujuan Praktikum

- Memahami konsep dasar Framework.
- Memahami konsep dasar MVC.
- Membuat program sederhana menggunakan Framework CodeIgniter 4.
- Mengimplementasikan routing dan controller pada CodeIgniter.
- Membuat tampilan dengan View dan Layout menggunakan CSS.

---

## ⚙️ Langkah-Langkah Praktikum

### 📌 1. Persiapan

🔹 Mengaktifkan ekstensi PHP yang dibutuhkan melalui `php.ini`.
🔹 Restart Apache melalui XAMPP Control Panel.

📷 **Screenshot Konfigurasi PHP.ini:**

![alt text](image.png)

---

### 📌 2. Instalasi Codeigniter 4

🔹 Download Codeigniter 4 dari [🔗 Situs Resmi Codeigniter](https://codeigniter.com/download).
🔹 Ekstrak ke direktori `htdocs/lab11_ci/`.
🔹 Ubah nama folder menjadi `ci4`.
🔹 Akses `http://localhost/lab11_ci/ci4/public/` untuk memastikan instalasi berhasil.

📷 **Screenshot Tampilan Codeigniter 4:**

![alt text](gambar/image-1.png)

---

### 📌 3. Menjalankan CLI (Command Line Interface)

```bash
cd xampp/htdocs/lab11_ci/ci4/
php spark
```

📷 **Screenshot Hasil Perintah CLI:**

![alt text](gambar/image-2.png)

---

### 📌 4. Mengaktifkan Mode Debugging

```bash
# Buka file .env dan ubah:
CI_ENVIRONMENT = development
```

📷 **Screenshot Konfigurasi Debugging:**

![alt text](gambar/image-3.png)

---

### 📌 5. Membuat Route Baru

Tambahkan kode berikut di `app/config/Routes.php`:

```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```

```bash
php spark routes
```

📷 **Screenshot CLI & Error Page:**

![alt text](gambar/image-5.png)
![alt text](gambar/image-6.png)

---

### 📌 6. Membuat Controller Page

Buat file `Page.php` di `app/Controllers/`:

```php
<?php
namespace App\Controllers;
class Page extends BaseController {
    public function about() { echo "Ini halaman About"; }
    public function contact() { echo "Ini halaman Contact"; }
    public function faqs() { echo "Ini halaman FAQ"; }
}
```

📷 **Screenshot Tampilan About Page:**

![alt text](gambar/image-7.png)

---

### 📌 7. Membuat View

Buat file `app/Views/about.php`:

```php
<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    <p><?= $content; ?></p>
</body>
</html>
```

📷 **Screenshot Tampilan View About Page:**

![alt text](gambar/image-12.png)

---

### 📌 8. Membuat Layout Web dengan CSS

- Simpan file `style.css` di `public/`
- Buat `header.php` dan `footer.php` di `app/Views/template/`
- Ubah `about.php` agar menggunakan `include`:

```php
<?= $this->include('template/header'); ?>
<h1><?= $title; ?></h1>
<p><?= $content; ?></p>
<?= $this->include('template/footer'); ?>
```

📷 **Screenshot :**

![alt text](gambar/image-9.png)

### 📌 9. 🚀 Menambahkan Halaman Baru (Services) dan (Artikel)

Agar website lebih lengkap, kita akan menambahkan halaman `Services` dan `Artikel` pilkan informasi layanan yang disediakan. yang menampilkan informasi layanan yang disediakan.

🛠 **Langkah 1: Menambahkan Route untuk Halaman Services**
Tambahkan route baru di `app/Config/Routes.php`, sehingga halaman ini dapat diakses melalui URL:

```php
$routes->get('/services', 'Page::services');
```

📝 **Langkah 2: Membuat Method dalam Controller**
Tambahkan method `services()` di `app/Controllers/Page.php` agar controller bisa menghandle request halaman `Services`:

```php
public function services() {
    return view('services', [
        'title' => '💼 Halaman Services',
        'content' => 'Kami menyediakan berbagai layanan, mulai dari konsultasi IT hingga pengembangan software. Hubungi kami untuk informasi lebih lanjut!'
    ]);
}
```

🎨 **Langkah 3: Membuat View untuk Halaman Services**
Buat file baru `app/Views/services.php` dan isi dengan kode berikut untuk tampilan halaman:

```php
<?= $this->include('template/header'); ?>
<h1>🛠 <?= $title; ?></h1>
<p>📌 <?= $content; ?></p>
<?= $this->include('template/footer'); ?>
```

🌐 **Langkah 4: Mengakses Halaman Services**
Setelah semua selesai, buka browser dan akses:

```
http://localhost:8080/services
```

Jika semua sudah berjalan dengan baik, halaman `Services` akan tampil dengan informasi layanan yang tersedia. 🎉

📷 **Screenshot Tampilan Halaman Services:**

![alt text](gambar/image-10.png)
Pada langkah ini, kita akan menambahkan halaman baru bernama `Services` agar dapat diakses melalui URL.

## 📄 Menambahkan Halaman Artikel

Karena di navigasi ada menu `Artikel`, kita juga harus membuat halamannya.

🛠 **Langkah 1: Menambahkan Route untuk Halaman Artikel**
Tambahkan kode berikut di `app/Config/Routes.php`:

```php
$routes->get('/artikel', 'Page::artikel');
```

📝 **Langkah 2: Membuat Method dalam Controller**
Tambahkan method `artikel()` di `app/Controllers/Page.php`:

```php
public function artikel() {
    return view('artikel', [
        'title' => '📰 Halaman Artikel',
        'content' => 'Selamat datang di halaman artikel. Di sini Anda dapat membaca berbagai artikel menarik yang kami sajikan.'
    ]);
}
```

🎨 **Langkah 3: Membuat View untuk Halaman Artikel**
Buat file baru `app/Views/artikel.php` dan isi dengan kode berikut:

```php
<?= $this->include('template/header'); ?>
<h1>📰 <?= $title; ?></h1>
<p>📖 <?= $content; ?></p>
<?= $this->include('template/footer'); ?>
```

🌐 **Langkah 4: Mengakses Halaman Artikel**
Setelah semua selesai, buka browser dan akses:

```
http://localhost:8080/artikel
```

Jika semua sudah berjalan dengan baik, halaman `Artikel` akan tampil dengan kontennya. 🎉

📷 **Screenshot Tampilan Halaman Artikel:**
![alt text](gambar/image-11.png)

✅ Kesimpulan

Hasil Praktikum
Dari praktikum ini, kita telah memahami dasar-dasar penggunaan framework CodeIgniter 4, termasuk:

Struktur direktori dan konfigurasi awal CodeIgniter.

Mengaktifkan dan mengonfigurasi CodeIgniter 4 untuk pengembangan aplikasi.

Menjalankan aplikasi menggunakan Command Line Interface (CLI).

Membuat dan mengelola routing untuk berbagai halaman dalam website.

Menggunakan Controller dan View untuk menampilkan konten dinamis.

Menerapkan layout dengan template header dan footer.

Menambahkan halaman Services dan Artikel agar website lebih informatif.

✨ Kesimpulan
Dengan menyelesaikan praktikum ini, kita telah mendapatkan wawasan mendalam tentang bagaimana CodeIgniter 4 mempermudah pengembangan aplikasi web. Framework ini menawarkan struktur yang lebih terorganisir, efisien, dan fleksibel, yang sangat membantu dalam membangun aplikasi berbasis web secara lebih profesional. 🚀🔥
Dari praktikum ini, kita telah memahami konsep dasar penggunaan framework CodeIgniter 4, termasuk struktur direktori, konfigurasi awal, serta implementasi konsep MVC (Model-View-Controller). Selain itu, kita juga telah berhasil:

- Mengaktifkan dan mengkonfigurasi CodeIgniter 4.
- Menjalankan aplikasi menggunakan Command Line Interface (CLI).
- Membuat dan mengelola routing untuk halaman-halaman dalam website.
- Membuat Controller dan View untuk menampilkan konten dinamis.
- Mengimplementasikan layout menggunakan template header dan footer.
- Menambahkan halaman Services dan Artikel agar website lebih lengkap.

Dengan menyelesaikan praktikum ini, kita mendapatkan pemahaman yang lebih baik tentang bagaimana CodeIgniter 4 mempermudah pengembangan aplikasi berbasis web dengan struktur yang lebih terorganisir dan efisien. 🚀

# Praktikum 2: Framework Lanjutan (CRUD)

## Tujuan

1. Mahasiswa mampu memahami konsep dasar Model.
2. Mahasiswa mampu memahami konsep dasar CRUD.
3. Mahasaswa mampu membuat program sederhana menggunakan Framework Codeigniter4.

## Persiapan

1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Pastikan MySQL Server sudah dapat dijalankan melalui XAMPP.

## Pertanyaan dan Tugas

Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.

## Laporan Praktikum

1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab7Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum beserta screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

## Langkah-langkah Praktikum

### 1. Membuat Database: Studi Kasus Data Artikel

```sql
CREATE DATABASE lab_ci4;
```

### 2. Membuat Tabel

```sql
CREATE TABLE artikel (
    id INT(11) auto_increment,
    judul VARCHAR(200) NOT NULL,
    isi TEXT,
    gambar VARCHAR(200),
    status TINYINT(1) DEFAULT 0,
    slug VARCHAR(200),
    PRIMARY KEY(id)
);
```

![alt text](gambar/praktikum2-1.png)

### 3. Konfigurasi koneksi database

Konfigurasi dapat dilakukan dengan du acara, yaitu pada file app/config/database.php atau menggunakan file .env. Pada praktikum ini kita gunakan konfigurasi pada file .env.

![alt text](gambar/praktikum2-2.png)

### 4. Membuat Model

Buat file baru pada direktori app/Models dengan nama ArtikelModel.php

```php
<?php
namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar'];
}
```

![alt text](gambar/praktikum2-3.png)

### 5. Membuat Controller

Buat Controller baru dengan nama Artikel.php pada direktori app/Controllers.

```php
<?php
namespace App\Controllers;
use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/index', compact('artikel', 'title'));
    }
}
```

![alt text](gambar/praktikum2-4.png)

### 6. Membuat View

Buat direktori baru dengan nama artikel pada direktori app/views, kemudian buat file baru dengan nama index.php.

```php
<?= $this->include('template/header'); ?>

<?php if($artikel): foreach($artikel as $row): ?>
<article class="entry">
    <h2><a href="<?= base_url('/artikel/' . $row['slug']);?>"><?= $row['judul']; ?></a></h2>
    <img src="<?= base_url('/gambar/' . $row['gambar']);?>" alt="<?= $row['judul']; ?>">
    <p><?= substr($row['isi'], 0, 200); ?></p>
</article>
<hr class="divider" />
<?php endforeach; else: ?>
<article class="entry">
    <h2>Belum ada data.</h2>
</article>
<?php endif; ?>

<?= $this->include('template/footer'); ?>
```

![alt text](gambar/praktikum2-5.png)

### 7. Akses dengan browser

Selanjutnya buka browser kembali, dengan mengakses url http://localhost:8080/artikel

![alt text](gambar/praktikum2-6.png)

### 8. Menambahkan Data Artikel

Belum ada data yang ditampilkan. Kemudian coba tambahkan beberapa data pada database agar dapat ditampilkan datanya.

```sql
INSERT INTO artikel (judul, isi, slug) VALUE
('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun.', 'artikel-kedua');
```

![alt text](gambar/praktikum2-7.png)

### 9. Membuat Tampilan Detail Artikel

Tambahkan fungsi baru pada Controller Artikel dengan nama view().

```php
public function view($slug)
{
    $model = new ArtikelModel();
    $artikel = $model->where([
        'slug' => $slug
    ])->first();

    // Menampilkan error apabila data tidak ada.
    if (!$artikel)
    {
        throw PageNotFoundException::forPageNotFound();
    }

    $title = $artikel['judul'];
    return view('artikel/detail', compact('artikel', 'title'));
}
```

### 10. Membuat View Detail

Buat view baru untuk halaman detail dengan nama app/views/artikel/detail.php.

```php
<?= $this->include('template/header'); ?>

<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?= $artikel['judul']; ?>">
    <p><?= $row['isi']; ?></p>
</article>

<?= $this->include('template/footer'); ?>
```

### 11. Membuat Routing untuk artikel detail

Buka Kembali file app/config/Routes.php, kemudian tambahkan routing untuk artikel detail.

```php
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
```

![alt text](gambar/praktikum2-8.png)

### 12. Membuat Menu Admin

Menu admin adalah untuk proses CRUD data artikel. Buat method baru pada Controller Artikel dengan nama admin_index().

```php
public function admin_index()
{
    $title = 'Daftar Artikel';
    $model = new ArtikelModel();
    $artikel = $model->findAll();
    return view('artikel/admin_index', compact('artikel', 'title'));
}
```

### 13. Membuat View Admin

Selanjutnya buat view untuk tampilan admin dengan nama admin_index.php

```php
<?= $this->include('template/admin_header'); ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </thead>
    <tbody>
        <?php if($artikel): foreach($artikel as $row): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td>
                <b><?= $row['judul']; ?></b>
                <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
            </td>
            <td><?= $row['status']; ?></td>
            <td>
                <a class="btn" href="<?= base_url('/admin/artikel/edit/' . $row['id']);?>">Ubah</a>
                <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' . $row['id']);?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan="4">Belum ada data.</td>
        </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </tfoot>
</table>

<?= $this->include('template/admin_footer'); ?>
```

### 14. Menambahkan Routing untuk Menu Admin

Tambahkan routing untuk menu admin seperti berikut:

```php
$routes->group('admin', function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
```

Akses menu admin dengan url http://localhost:8080/admin/artikel

![alt text](gambar/praktikum2-9.png)

### 15. Menambah Data Artikel

Tambahkan fungsi/method baru pada Controller Artikel dengan nama add().

```php
public function add()
{
    // validasi data.
    $validation = \Config\Services::validation();
    $validation->setRules(['judul' => 'required']);
    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid)
    {
        $artikel = new ArtikelModel();
        $artikel->insert([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'slug' => url_title($this->request->getPost('judul')),
        ]);
        return redirect('admin/artikel');
    }

    $title = "Tambah Artikel";
    return view('artikel/form_add', compact('title'));
}
```

### 16. Membuat View Form Tambah

Kemudian buat view untuk form tambah dengan nama form_add.php

```php
<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>
<form action="" method="post">
    <p>
        <input type="text" name="judul">
    </p>
    <p>
        <textarea name="isi" cols="50" rows="10"></textarea>
    </p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>

<?= $this->include('template/admin_footer'); ?>
```

![alt text](gambar/gambarpraktikum2-11.png)

### 17. Mengubah Data

Tambahkan fungsi/method baru pada Controller Artikel dengan nama edit().

```php
public function edit($id)
{
    $artikel = new ArtikelModel();
    // validasi data.
    $validation = \Config\Services::validation();
    $validation->setRules(['judul' => 'required']);
    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid)
    {
        $artikel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
        ]);
        return redirect('admin/artikel');
    }

    // ambil data lama
    $data = $artikel->where('id', $id)->first();
    $title = "Edit Artikel";
    return view('artikel/form_edit', compact('title', 'data'));
}
```

### 18. Membuat View Form Edit

Kemudian buat view untuk form tambah dengan nama form_edit.php

```php
<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>
<form action="" method="post">
    <p>
        <input type="text" name="judul" value="<?= $data['judul'];?>" >
    </p>
    <p>
        <textarea name="isi" cols="50" rows="10"><?= $data['isi'];?></textarea>
    </p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>

<?= $this->include('template/admin_footer'); ?>
```

![alt text](gambar/gambarpraktikum12.png)

### 19. Menghapus Data

Tambahkan fungsi/method baru pada Controller Artikel dengan nama delete().

```php
public function delete($id)
{
    $artikel = new ArtikelModel();
    $artikel->delete($id);
    return redirect('admin/artikel');
}
```

# Praktikum 3: View Layout dan View Cell

## Tujuan

1. Memahami konsep View Layout di CodeIgniter 4.
2. Menggunakan View Layout untuk membuat template tampilan.
3. Memahami dan mengimplementasikan View Cell dalam CodeIgniter 4.
4. Menggunakan View Cell untuk memanggil komponen UI secara modular.

## Persiapan

1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Pada praktikum sebelumnya kita telah menggunakan template layout dengan konsep parsial atau memecah bagian template menjadi beberapa bagian untuk kemudian di include pada view yang lain.
4. Praktikum kali ini kita akan mengunakan konsep View Layout dan View Cell untuk memudahkan dalam penggunaan layout.

## Langkah-langkah Praktikum

### 1. Membuat Layout Utama

Buat folder layout di dalam app/Views/
Buat file main.php di dalam folder layout dengan kode berikut:

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'My Website' ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
    <div id="container">
        <header>
            <h1>Layout Sederhana</h1>
        </header>
        <nav>
            <a href="<?= base_url('/');?>" class="active">Home</a>
            <a href="<?= base_url('/artikel');?>">Artikel</a>
            <a href="<?= base_url('/about');?>">About</a>
            <a href="<?= base_url('/contact');?>">Kontak</a>
        </nav>
        <section id="wrapper">
            <section id="main">
                <?= $this->renderSection('content') ?>
            </section>
            <aside id="sidebar">
                <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>
                <div class="widget-box">
                    <h3 class="title">Widget Header</h3>
                    <ul>
                        <li><a href="#">Widget Link</a></li>
                        <li><a href="#">Widget Link</a></li>
                    </ul>
                </div>
                <div class="widget-box">
                    <h3 class="title">Widget Text</h3>
                    <p>Vestibulum lorem elit, iaculis in nisl volutpat, malesuada tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, faucibus felis. Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
                </div>
            </aside>
        </section>
        <footer>
            <p>&copy; 2021 - Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
```

![alt text](gambar/praktikum3-1.png)

### 2. Modifikasi File View

Ubah app/Views/home.php agar sesuai dengan layout baru:

```php
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
    <h1><?= $title; ?></h1>
    <hr>
    <p><?= $content; ?></p>
<?= $this->endSection() ?>
```

![alt text](gambar/praktikum3-2.png)

### 3. Menampilkan Data Dinamis dengan View Cell

View Cell adalah fitur yang memungkinkan pemanggilan tampilan dalam bentuk komponen yang dapat digunakan ulang. Cocok digunakan untuk elemen-elemen yang sering muncul di berbagai halaman seperti sidebar, widget, atau menu navigasi.

### 4. Membuat Class View Cell

Buat folder Cells di dalam app/
Buat file ArtikelTerkini.php di dalam app/Cells/ dengan kode berikut:

```php
<?php
namespace App\Cells;
use CodeIgniter\View\Cell;
use App\Models\ArtikelModel;

class ArtikelTerkini extends Cell
{
    public function render()
    {
        $model = new ArtikelModel();
        $artikel = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();
        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
```

![alt text](gambar/praktikum3-3.png)

### 5. Membuat View untuk View Cell

Buat folder components di dalam app/Views/
Buat file artikel_terkini.php di dalam app/Views/components/ dengan kode berikut:

```php
<h3>Artikel Terkini</h3>
<ul>
    <?php foreach ($artikel as $row): ?>
    <li><a href="<?= base_url('/artikel/' . $row['slug']) ?>"><?= $row['judul'] ?></a></li>
    <?php endforeach; ?>
</ul>
```

![alt text](gambar/praktikum3-4.png)

### 6. Modifikasi Database: Menambahkan Field created_at

Untuk menampilkan artikel terkini berdasarkan tanggal, kita perlu menambahkan field created_at pada tabel artikel:

```sql
ALTER TABLE artikel
ADD COLUMN created_at DATETIME DEFAULT CURRENT_TIMESTAMP;
```

![alt text](gambar/praktikum3-5.png)

### 7. Update Data Artikel dengan Tanggal

Untuk artikel yang sudah ada, kita perlu mengupdate field created_at:

```sql
UPDATE artikel SET created_at = CURRENT_TIMESTAMP;
```

![alt text](gambar/praktikum3-7.png)

### 8. Modifikasi Model ArtikelModel

Update file app/Models/ArtikelModel.php untuk menambahkan field created_at di allowedFields:

```php
<?php
namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar', 'created_at'];
}
```

### 9. Modifikasi Controller untuk Menampilkan Halaman Home dengan Layout Baru

Update file app/Controllers/Home.php:

```php
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

```

![alt text](gambar/praktikum3-9.png)

### 10. Lihat Hasil Tampilan

Akses halaman home melalui browser untuk melihat hasil tampilan dengan layout baru:
http://localhost:8080/

![alt text](gambar/praktikum3-8.png)

### 11. Modifikasi View Artikel

Ubah file app/Views/artikel/index.php agar menggunakan layout baru:

```php
<?= $this->include('template/header'); ?>

<link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

<!-- Tombol Tambah Artikel (Untuk Admin) -->
<div style="margin-bottom: 20px;">
    <a href="<?= base_url('/admin/artikel/add'); ?>" class="tambah-artikel-btn">
        + Tambah Artikel
    </a>
</div>

<!-- ARTIKEL TERKINI dari Cell -->
<?= view_cell('App\Cells\ArtikelTerkini::index') ?>

<hr class="divider" />

<!-- SEMUA ARTIKEL -->
<?php if ($artikel) : foreach ($artikel as $row) : ?>
        <article class="entry">
            <h2>
                <a href="<?= base_url('/artikel/' . $row['slug']); ?>"><?= esc($row['judul']); ?></a>
            </h2>
            <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= esc($row['judul']); ?>" style="width: 100%; max-width: 400px;">
            <p><?= esc(substr($row['isi'], 0, 200)); ?>...</p>
        </article>
        <hr class="divider" />
    <?php endforeach;
else : ?>
    <article class="entry">
        <h2>Belum ada data.</h2>
    </article>
<?php endif; ?>

<?= $this->include('template/footer'); ?>
```

![alt text](gambar/praktikum3-10.png)

### 12. Modifikasi View Detail Artikel

Ubah file app/Views/artikel/detail.php:

```php
<?= $this->include('template/header'); ?>

<article class="entry container mt-4 p-4 shadow-lg rounded bg-white">
    <h2 class="text-center text-primary"><?= esc($artikel['judul']); ?></h2>
    <div class="text-center my-3">
        <img src="<?= base_url('/gambar/' . esc($artikel['gambar'])); ?>" alt="<?= esc($artikel['judul']); ?>" class="img-fluid rounded shadow-sm">
    </div>
    <p class="text-justify"><?= esc($artikel['isi']); ?></p>
</article>

<?= $this->include('template/footer'); ?>
```

![alt text](gambar/praktikum3-11.png)

## Pertanyaan dan Jawaban

### 1. Apa manfaat utama dari penggunaan View Layout dalam pengembangan aplikasi?

Manfaat utama penggunaan View Layout dalam pengembangan aplikasi adalah:

- **Konsistensi Tampilan**: Memastikan tampilan yang konsisten di seluruh halaman aplikasi
- **Pemisahan Konten dan Layout**: Memungkinkan pemisahan yang jelas antara konten dan layout
- **Penggunaan Kembali Kode**: Mengurangi duplikasi kode dengan menggunakan layout yang sama untuk halaman berbeda
- **Pemeliharaan Lebih Mudah**: Perubahan pada layout hanya perlu dilakukan di satu tempat
- **Struktur Kode Lebih Terorganisir**: Membantu mengorganisir kode dengan lebih baik dan lebih mudah dibaca

### 2. Jelaskan perbedaan antara View Cell dan View biasa.

Perbedaan antara View Cell dan View biasa:

| View Cell                                                 | View Biasa                                                          |
| --------------------------------------------------------- | ------------------------------------------------------------------- |
| Komponen independen dengan logika sendiri                 | Tidak memiliki logika pemrosesan data sendiri                       |
| Dapat dipanggil dari berbagai tampilan                    | Biasanya digunakan sebagai tampilan utama atau bagian dari tampilan |
| Memiliki class dedicated dengan metode render             | Hanya file template tanpa class                                     |
| Cocok untuk widget, sidebar, menu yang digunakan berulang | Cocok untuk tampilan halaman utama                                  |
| Dapat memanggil model dan mengambil data                  | Menerima data dari controller                                       |
| Dapat dirender dengan parameter                           | Biasanya tidak menerima parameter langsung                          |

### 3. Ubah View Cell agar hanya menampilkan post dengan kategori tertentu.

Untuk mengubah View Cell agar hanya menampilkan post dengan kategori tertentu, kita perlu:

1. Menambahkan kolom kategori pada tabel artikel
2. Memodifikasi class ArtikelTerkini untuk menerima parameter kategori
3. Menggunakan parameter tersebut untuk memfilter artikel yang ditampilkan

Berikut implementasinya:

```php
// Di Layout Main.php, panggil dengan parameter kategori
<?= view_cell('App\\Cells\\ArtikelTerkini::render', ['kategori' => 'tutorial']) ?>

// Modifikasi ArtikelTerkini.php
public function render($kategori = null)
{
    $model = new ArtikelModel();

    if ($kategori) {
        $artikel = $model->where('kategori', $kategori)
                    ->orderBy('created_at', 'DESC')
                    ->limit(5)
                    ->findAll();
    } else {
        $artikel = $model->orderBy('created_at', 'DESC')
                    ->limit(5)
                    ->findAll();
    }

    return view('components/artikel_terkini', ['artikel' => $artikel]);
}
```

## Kesimpulan

Dalam praktikum ini, saya telah berhasil mengimplementasikan View Layout dan View Cell dalam aplikasi CodeIgniter 4. Penggunaan View Layout memungkinkan pemisahan yang jelas antara konten dan layout, sementara View Cell menyediakan cara efisien untuk membuat komponen UI yang dapat digunakan kembali. Melalui praktikum ini, saya memahami bagaimana membuat tampilan aplikasi web yang lebih terstruktur, modular, dan mudah dikelola.
