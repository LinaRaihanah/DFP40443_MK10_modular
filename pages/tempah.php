<?php include "config/produk.php"; ?>

<h1>Borang Tempahan</h1>

<form method="POST" action="process/tempah_process.php">

<?php foreach($data as $produk): ?>

<h3><?= $produk['nama'] ?></h3>

<?php foreach($produk['harga'] as $saiz => $harga): ?>

<label>
<?= ucfirst($saiz) ?> (RM <?= number_format($harga,2) ?>)
</label>

<input type="number"
name="tempahan[<?= $produk['id'] ?>][<?= $saiz ?>]"
value="0"
min="0"
data-price="<?= $harga ?>"
class="qty-input">

<br>

<?php endforeach; ?>

<?php endforeach; ?>

<h3>Jumlah: <span id="total-price">RM 0.00</span></h3>

<input type="text" name="namapelanggan" placeholder="Nama" required>

<button type="submit">Teruskan</button>

</form>

<script src="js/script.js"></script>