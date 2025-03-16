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