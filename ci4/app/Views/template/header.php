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
            <h1>Layout Sederhana</h1>
        </header>

        <?php
        $uri = service('uri');
        ?>

        <nav>
            <a href="<?= base_url('/'); ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : ''; ?>">Home</a>
            <a href="<?= base_url('/artikel'); ?>" class="<?= $uri->getSegment(1) == 'artikel' ? 'active' : ''; ?>">Artikel</a>
            <a href="<?= base_url('/about'); ?>" class="<?= $uri->getSegment(1) == 'about' ? 'active' : ''; ?>">About</a>
            <a href="<?= base_url('/contact'); ?>" class="<?= $uri->getSegment(1) == 'contact' ? 'active' : ''; ?>">Kontak</a>
        </nav>

        <section id="wrapper">
            <section id="main">