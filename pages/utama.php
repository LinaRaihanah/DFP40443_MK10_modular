<?php include "data/produk.php"; ?>

<h1 class="page-title">Selamat Datang</h1>
<div class="gallery-row">
<?php foreach ($data as $produk): ?>
    <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" class="gallery-thumb" alt="<?= htmlspecialchars($produk['nama']) ?>">
<?php endforeach; ?>
</div>

<div class="instructions-section">
    <h3>Cara Membuat Tempahan</h3>
    <p> Selamat datang ke Biskut Klasik! Untuk membuat tempahan, klik menu <a href="index.php?menu=tempah" class="instruction-link"><strong>Tempah</strong></a>, pilih kuantiti dan tekan <a href="index.php?menu=tempah" class="instruction-link"><strong>Teruskan</strong></a>. </p>
</div>