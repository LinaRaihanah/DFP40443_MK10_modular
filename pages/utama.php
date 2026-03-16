<?php include "config/produk.php"; ?>

<h1>Selamat Datang</h1>

<div style="display:flex;gap:20px;flex-wrap:wrap;justify-content:center">

<?php foreach($data as $produk): ?>

<img src="gambar/<?= $produk['gambar'] ?>" width="150">

<?php endforeach; ?>

</div>

<div style="margin-top:40px;background:white;padding:30px;border-radius:8px">

<h3>Cara Membuat Tempahan</h3>

<p>
Klik menu Tempah, pilih biskut dan kuantiti, masukkan nama,
kemudian tekan Teruskan. Invois akan dipaparkan dan boleh dicetak.
</p>

</div>