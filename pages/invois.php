<?php
require_once __DIR__ . '/../function/invois.php';
$invois = dapatkanInvois();
?>

<div class="invoice-box">
    <h2>INVOIS TEMPAHAN</h2>
    <div class="info">
        <span class="label">No Invois:</span>
        <?php echo htmlspecialchars($invois['invoice_no']); ?>
    </div>
    <div class="info">
        <span class="label">Nama Pelanggan:</span>
        <?php echo htmlspecialchars($invois['nama_pelanggan']); ?>
    </div>
    <div class="info">
        <span class="label">Tarikh:</span>
        <?php echo htmlspecialchars($invois['tarikh'] ?? date("d-m-Y")); ?>
    </div>

    <hr>
    <h3>Senarai Tempahan:</h3>
    <table class="invoice-table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Saiz</th>
                <th>Harga (RM)</th>
                <th>Kuantiti</th>
                <th>Jumlah (RM)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($invois['ordered_items']) && is_array($invois['ordered_items'])): ?>
                <?php foreach ($invois['ordered_items'] as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['nama'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($item['saiz'] ?? ''); ?></td>
                        <td><?php echo number_format($item['harga'] ?? 0, 2); ?></td>
                        <td><?php echo htmlspecialchars($item['kuantiti'] ?? 0); ?></td>
                        <td><?php echo number_format($item['jumlah'] ?? 0, 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: right;"><strong>Jumlah Keseluruhan:</strong></td>
                <td><strong>RM <?php echo number_format($invois['total'] ?? 0, 2); ?></strong></td>
            </tr>
        </tfoot>
    </table>

    <hr>
    <p>Terima kasih kerana membuat tempahan di <strong>Biskut Klasik</strong> 🍪</p>
    <a href="index.php?menu=tempah" class="btn">Buat Tempahan Baru</a>
</div>