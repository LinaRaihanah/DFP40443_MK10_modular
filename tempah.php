<?php
// Clear previous invoice data when loading tempah page to allow new orders
unset($_SESSION['invois_data']);
?>

<script>
// Check for error messages and show pop-up
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    
    if (error === 'no_order') {
        alert('Sila buat tempahan sebelum melihat invois.Pilih produk dan kuantiti yang anda inginkan, kemudian klik "Teruskan".Mestilah ada sekurang-kurangnya satu item dengan kuantiti lebih daripada 0');
    } else if (error === 'empty') {
        alert('Sila pilih kuantiti produk sebelum meneruskan! . Mestilah ada sekurang-kurangnya satu item dengan kuantiti lebih daripada 0.');
    }
});
</script>

<h1 class="page-title">Borang Tempahan</h1>
    <form method="POST" action="proses_tempah.php" id="orderForm">
        <div class="product-grid">
            <?php foreach ($data as $produk): ?>
                <div class="product-card">
                    <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" class="product-image">
                    <div class="product-info">
                        <h3 class="product-name"><?= htmlspecialchars($produk['nama']) ?></h3>
                        <?php foreach ($produk['harga'] as $saiz => $harga): ?>
                            <div class="product-option">
                                <div class="option-label">
                                    <span class="label-saiz"><?= ucwords(str_replace('_',' ',$saiz)) ?></span>
                                    <span class="label-harga">RM <?= number_format($harga, 2) ?></span>
                                </div>
                                <input type="number" name="tempahan[<?= $produk['id'] ?>][<?= $saiz ?>]" 
                                       value="0" min="0" class="qty-input" data-price="<?= $harga ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="checkout-card"> 
            <div class="price-row">
                <span class="total-label">Jumlah Harga:</span>
                <span id="totalPrice" class="grand-total">RM 0.00</span>
            </div>
            
            <div class="name-input-section">
                <label>Nama Penuh Anda:</label>
                <input type="text" name="nama_pelanggan" placeholder="Contoh: Ali Bin Abu" required>
            </div>
            
            <button type="submit" class="btn-teruskan">Teruskan</button>
        </div>
    </form>
<script src="order_script.js"></script>

    

