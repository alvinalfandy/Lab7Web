<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>

<body>
    <div id="container">
        <header>
            <h1>Admin Portal Berita</h1>
        </header>

        <?php
        // Ambil URI service buat ngecek segmen URL
        $uri = service('uri');
        ?>

        <nav>
            <a href="<?= base_url('/admin/artikel'); ?>"
                class="<?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'artikel' && $uri->getSegment(3) == '') ? 'active' : ''; ?>">
                Dashboard
            </a>

            <a href="<?= base_url('/artikel'); ?>"
                class="<?= ($uri->getSegment(1) == 'artikel' && $uri->getSegment(2) == '') ? 'active' : ''; ?>">
                Artikel
            </a>

            <a href="<?= base_url('/admin/artikel/add'); ?>"
                class="<?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'artikel' && $uri->getSegment(3) == 'add') ? 'active' : ''; ?>">
                Tambah Artikel
            </a>
        </nav>

        <section id="wrapper">
            <section id="main">
                <!-- Konten halaman tampil di sini -->