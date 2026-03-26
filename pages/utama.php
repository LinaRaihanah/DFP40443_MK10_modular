<?php include "config/produk.php"; ?>

<h1>Selamat Datang</h1>

<div class="produk-list">

    <?php foreach ($data as $produk): ?>

        <img src="gambar/<?= $produk['gambar'] ?>">

    <?php endforeach; ?>

</div>