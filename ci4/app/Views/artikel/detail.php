<?= $this->include('template/header'); ?>

<article class="entry container mt-4 p-4 shadow-lg rounded bg-white">
    <h2 class="text-center text-primary"><?= esc($artikel['judul']); ?></h2>
    <div class="text-center my-3">
        <img src="<?= base_url('/gambar/' . esc($artikel['gambar'])); ?>" alt="<?= esc($artikel['judul']); ?>" class="img-fluid rounded shadow-sm">
    </div>
    <p class="text-justify"><?= esc($artikel['isi']); ?></p>
</article>

<?= $this->include('template/footer'); ?>