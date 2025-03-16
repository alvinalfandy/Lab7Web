<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<div class="form-container">
    <form action="" method="post" class="form-tambah">
        <div class="form-group">
            <label for="judul">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="input" placeholder="Masukkan judul artikel..." required>
        </div>

        <div class="form-group">
            <label for="isi">Isi Artikel</label>
            <textarea name="isi" id="isi" cols="50" rows="10" class="area" placeholder="Tulis isi artikel di sini..." required></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-large btn-primary">Kirim Artikel</button>
        </div>
    </form>
</div>

<?= $this->include('template/admin_footer'); ?>