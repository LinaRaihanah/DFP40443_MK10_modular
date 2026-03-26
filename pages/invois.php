<?php
if (!isset($_SESSION['invoisdata'])) {
    header("Location:index.php?menu=tempah");
    exit();
}

$inv = $_SESSION['invoisdata'];
?>

<h1>Invois</h1>

<p><?= $inv['namapelanggan'] ?></p>
<p><?= $inv['noinvois'] ?></p>

<table border="1">

    <tr>
        <th>Produk</th>
        <th>Saiz</th>
        <th>Harga</th>
        <th>Kuantiti</th>
        <th>Jumlah</th>
    </tr>

    <?php foreach ($inv['items'] as $i): ?>

        <tr>
            <td><?= $i['namaproduk'] ?></td>
            <td><?= $i['saiz'] ?></td>
            <td><?= number_format($i['hargaseunit'], 2) ?></td>
            <td><?= $i['kuantiti'] ?></td>
            <td><?= number_format($i['jumlahharga'], 2) ?></td>
        </tr>

    <?php endforeach; ?>

    <tr>
        <td colspan="4">Total</td>
        <td><?= number_format($inv['jumlahbesar'], 2) ?></td>
    </tr>

</table>