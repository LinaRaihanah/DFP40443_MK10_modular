<?php
require_once __DIR__ . '/../function/tempah.php';
prosesTempahan();
include __DIR__ . '/../data/produk.php';

$error_message = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'no_items':
            $error_message = 'Sila pilih sekurang-kurangnya satu item untuk ditempah.';
            break;
        case 'no_name':
            $error_message = 'Sila masukkan nama penuh.';
            break;
    }
}
?>

<h1 class="page-title">Borang Tempahan</h1>

<?php if ($error_message): ?>
    <div class="error-message" style="color: red; text-align: center; margin-bottom: 20px;">
        <?php echo htmlspecialchars($error_message); ?>
    </div>
<?php endif; ?>

<form method="POST">
    <div class="product-grid">
        <?php foreach ($data as $produk): ?>
            <?php include __DIR__ . '/../components/product-card.php'; ?>
        <?php endforeach; ?>
    </div>
    
    <div class="checkout-section">
        <div class="total-display">
            <span class="total-label"> Jumlah Harga: </span>
            <span id="total-price" class="total-amount"> RM 0.00 </span>
        </div>
        <input type="text" name="nama_pelanggan" required placeholder="Nama Penuh" class="checkout-input">
        <button class="checkout-button"> Teruskan </button>
    </div>
</form>
<script src="assets/script.js"></script>