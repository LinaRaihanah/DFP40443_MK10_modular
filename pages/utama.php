<?php
include "data/produk.php";
include "layout/header.php";
?>

<!-- Page Title -->
<h1 class="page-title">Selamat Datang</h1>

<!-- Gallery Container -->
<div class="gallery-row">
    <?php foreach($produk as $p): ?>
        <img
            src="gambar/<?= $p['gambar'] ?>"
            alt="<?= $p['nama'] ?>"
            class="gallery-thumb">
    <?php endforeach; ?>
</div>

<?php
include "layout/footer.php";
?>