<?php
// Jangan panggil session_start() di sini kerana sudah ada di index.php
include "data/produk.php";
include "layout/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pelanggan = trim($_POST['nama_pelanggan'] ?? '');
    $tempahan = $_POST['tempahan'] ?? [];

    $no_invois = 'INV' . rand(1000, 9999);
    $tarikh = date('d/m/Y');

    $_SESSION['invois_data'] = [
        'nama_pelanggan' => $nama_pelanggan,
        'tempahan' => $tempahan,
        'no_invois' => $no_invois,
        'tarikh' => $tarikh
    ];

    header("Location: index.php?menu=invois");
    exit();
}
?>

<h1 class="page-title">Borang Tempahan</h1>

<form method="POST">

    <?php foreach($produk as $p): ?>
        <h3><?= htmlspecialchars($p['nama']) ?></h3>

        <?php foreach($p['harga'] as $saiz => $harga): ?>
            <input
                type="number"
                name="tempahan[<?= $p['id'] ?>][<?= $saiz ?>]"
                value="0"
                min="0">
            <?= ucwords(str_replace('_',' ',$saiz)) ?>
            RM <?= number_format($harga,2) ?>
            <br>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <br>

    <input type="text"
        name="nama_pelanggan"
        placeholder="Nama"
        required>

    <button type="submit">
        Teruskan
    </button>

</form>

<?php include "layout/footer.php"; ?>