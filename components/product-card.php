<div class="product-card">
    <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" class="product-image">
    <h3 class="product-name"><?= htmlspecialchars($produk['nama']) ?></h3>
    <?php foreach ($produk['harga'] as $saiz => $harga): ?>
    <div class="product-option">
        <label class="option-label">
            <span class="option-name"><?= ucwords(str_replace('_',' ',$saiz)) ?></span>
            <span class="option-price">RM <?= number_format($harga,2) ?></span>
        </label>
        <input type="number" name="tempahan[<?= $produk['id'] ?>][<?= $saiz ?>]" min="0" value="0" data-price="<?= $harga ?>" class="qty-input">
    </div>
    <?php endforeach; ?>
</div>