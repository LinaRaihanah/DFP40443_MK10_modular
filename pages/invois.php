<?php
// Jangan panggil session_start() di sini kerana sudah ada di index.php
include "layout/header.php";

if(!isset($_SESSION['invois_data'])){
    echo "Tiada invois.";
    include "layout/footer.php";
    exit();
}

$invois = $_SESSION['invois_data'];
?>

<h1 class="page-title">Invois</h1>

<p><strong>Nama :</strong> <?= htmlspecialchars($invois['nama_pelanggan']) ?></p>
<p><strong>No Invois :</strong> <?= htmlspecialchars($invois['no_invois']) ?></p>
<p><strong>Tarikh :</strong> <?= htmlspecialchars($invois['tarikh']) ?></p>

<?php include "layout/footer.php"; ?>