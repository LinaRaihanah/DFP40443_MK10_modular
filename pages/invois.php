<?php
if (!isset($_SESSION['invoisdata'])) {
    header("Location: index.php?menu=tempah");
    exit();
}

$invois = $_SESSION['invoisdata'];
?>

<h1>Invois</h1>

<p>Nama: <?= $invois['namapelanggan'] ?></p>
<p>No: <?= $invois['noinvois'] ?></p>

<table border="1">

<tr>
<th>Produk</th>
<th>Saiz</th>
<th>Harga</th>
<th>Qty</th>
<th>Jumlah</th>
</tr>

<?php foreach($invois['items'] as $item): ?>

<tr>
<td><?= $item['namaproduk'] ?></td>
<td><?= $item['saiz'] ?></td>
<td><?= number_format($item['hargaseunit'],2) ?></td>
<td><?= $item['kuantiti'] ?></td>
<td><?= number_format($item['jumlahharga'],2) ?></td>
</tr>

<?php endforeach; ?>

<tr>
<td colspan="4">Total</td>
<td><?= number_format($invois['jumlahbesar'],2) ?></td>
</tr>

</table>