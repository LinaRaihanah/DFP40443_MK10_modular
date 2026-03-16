<?php

if (!isset($_SESSION['invois_data'])) {
    echo "<script>
            alert('Invois belum ada kerana belum ada tempahan.');
            window.location.href='index.php?menu=tempah';
          </script>";
    exit();
}

$invois = $_SESSION['invois_data'];

?>

<h1 style="text-align:center;">Invois Tempahan Biskut Klasik</h1>

<div style="background:white;padding:40px;border-radius:8px;max-width:800px;margin:auto;">

<div style="display:flex;justify-content:space-between;margin-bottom:20px;border-bottom:1px solid #ddd;padding-bottom:10px;">

<div>
<strong>Kepada:</strong><br>
<?= htmlspecialchars($invois['nama_pelanggan']) ?>
</div>

<div style="text-align:right;">
<strong>No Invois:</strong> <?= $invois['no_invois'] ?><br>
<strong>Tarikh:</strong> <?= $invois['tarikh'] ?>
</div>

</div>

<table style="width:100%;border-collapse:collapse;">

<thead>

<tr style="background:#f5f5f5;">
<th style="padding:10px;border:1px solid #ddd;">Produk</th>
<th style="padding:10px;border:1px solid #ddd;">Saiz</th>
<th style="padding:10px;border:1px solid #ddd;">Harga</th>
<th style="padding:10px;border:1px solid #ddd;">Kuantiti</th>
<th style="padding:10px;border:1px solid #ddd;">Jumlah</th>
</tr>

</thead>

<tbody>

<?php foreach ($invois['items'] as $item): ?>

<tr>

<td style="padding:10px;border:1px solid #ddd;">
<?= htmlspecialchars($item['nama_produk']) ?>
</td>

<td style="padding:10px;border:1px solid #ddd;">
<?= htmlspecialchars($item['saiz']) ?>
</td>

<td style="padding:10px;border:1px solid #ddd;text-align:right;">
RM <?= number_format($item['harga_seunit'],2) ?>
</td>

<td style="padding:10px;border:1px solid #ddd;text-align:center;">
<?= $item['kuantiti'] ?>
</td>

<td style="padding:10px;border:1px solid #ddd;text-align:right;">
RM <?= number_format($item['jumlah_harga'],2) ?>
</td>

</tr>

<?php endforeach; ?>

</tbody>

<tfoot>

<tr>

<td colspan="4" style="text-align:right;padding:10px;border:1px solid #ddd;">
<strong>Jumlah Besar</strong>
</td>

<td style="text-align:right;padding:10px;border:1px solid #ddd;color:green;font-weight:bold;">
RM <?= number_format($invois['jumlah_besar'],2) ?>
</td>

</tr>

</tfoot>

</table>

<div style="margin-top:20px;text-align:center;color:#666;">

<p>* Sila cetak invois ini dan serahkan semasa mengambil tempahan.</p>
<p>* Bayaran boleh dibuat secara tunai atau imbas Kod QR.</p>

</div>

<div style="text-align:center;margin-top:20px;">
<button onclick="window.print()" style="padding:10px 25px;background:#333;color:white;border:none;border-radius:5px;cursor:pointer;">
Cetak Invois
</button>
</div>

</div>