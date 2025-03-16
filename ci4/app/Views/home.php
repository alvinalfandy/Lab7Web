<?= $this->include('template/header'); ?>

<link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

<!-- ARTIKEL TERKINI dari CELL -->
<?= view_cell('App\Cells\ArtikelTerkini::index') ?>

<hr class="divider" />

<!-- SEMUA ARTIKEL -->
<section>
    <?php if (!empty($artikel)) : ?>
        <?php foreach ($artikel as $row) : ?>
            <article class="entry">
                <h2>
                    <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
                        <?= esc($row['judul']); ?>
                    </a>
                </h2>
                <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= esc($row['judul']); ?>" style="width: 100%; max-width: 400px;">
                <p><?= esc(substr($row['isi'], 0, 200)); ?>...</p>
            </article>
            <hr class="divider" />
        <?php endforeach; ?>
    <?php else : ?>
        <article class="entry">
            <h2>Belum ada artikel.</h2>
        </article>
    <?php endif; ?>
</section>

<?= $this->include('template/footer'); ?>