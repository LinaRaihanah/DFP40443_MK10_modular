<?php
include "config/produk.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nama_pelanggan = htmlspecialchars(trim($_POST['nama_pelanggan']));
$tempahan_input = $_POST['tempahan'] ?? [];

$item_tempahan = [];
$jumlah_besar = 0;

foreach ($tempahan_input as $produk_id => $saiz_list) {

foreach ($data as $p) {
if ($p['id'] == $produk_id) {

foreach ($saiz_list as $saiz => $qty) {

$qty = (int)$qty;

if ($qty > 0) {

$harga = $p['harga'][$saiz];
$jumlah = $qty * $harga;

$item_tempahan[] = [
'nama_produk' => $p['nama'],
'saiz' => ucwords(str_replace('_',' ',$saiz)),
'harga_seunit' => $harga,
'kuantiti' => $qty,
'jumlah_harga' => $jumlah
];

$jumlah_besar += $jumlah;

}

}

}

}

}

if ($jumlah_besar == 0) {

echo "<script>
alert('Sila pilih sekurang-kurangnya satu biskut');
window.location='index.php?menu=tempah';
</script>";

exit();

}

$_SESSION['invois_data'] = [

'no_invois' => 'INV-'.rand(10000,99999),
'nama_pelanggan' => $nama_pelanggan,
'tarikh' => date("d/m/Y"),
'items' => $item_tempahan,
'jumlah_besar' => $jumlah_besar

];

header("Location:index.php?menu=invois");
exit();

}
?>

<h1 style="text-align:center;">Borang Tempahan</h1>

<form method="POST">

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;">

<?php foreach($data as $produk): ?>

<div style="background:white;padding:20px;border-radius:8px;">

<img src="gambar/<?= $produk['gambar'] ?>" style="width:100%;height:180px;object-fit:contain;">

<h3><?= $produk['nama'] ?></h3>

<?php foreach($produk['harga'] as $saiz => $harga): ?>

<div style="display:flex;justify-content:space-between;margin-bottom:10px;">

<div>

<?= ucwords(str_replace('_',' ',$saiz)) ?><br>
<span style="color:#e44d26;">RM <?= number_format($harga,2) ?></span>

</div>

<input type="number"
name="tempahan[<?= $produk['id'] ?>][<?= $saiz ?>]"
value="0"
min="0"
data-price="<?= $harga ?>"
class="qty-input"
style="width:60px;text-align:center;">

</div>

<?php endforeach; ?>

</div>

<?php endforeach; ?>

</div>

<div style="background:white;padding:25px;margin-top:30px;border-radius:8px;max-width:500px;margin-left:auto;margin-right:auto;">

<div style="display:flex;justify-content:space-between;margin-bottom:20px;">

<span>Jumlah Harga:</span>

<strong id="total-price">RM 0.00</strong>

</div>

<label>Nama Penuh:</label>

<input type="text"
name="nama_pelanggan"
required
style="width:100%;padding:10px;margin-top:5px;margin-bottom:20px;">

<button type="submit"
style="width:100%;padding:12px;background:#e44d26;color:white;border:none;border-radius:5px;font-size:18px;">

Teruskan

</button>

</div>

</form>

<script>

const qtyInputs = document.querySelectorAll('.qty-input');
const totalEl = document.getElementById('total-price');

function kiraTotal(){

let total = 0;

qtyInputs.forEach(input => {

let qty = parseInt(input.value) || 0;
let price = parseFloat(input.dataset.price);

total += qty * price;

});

totalEl.innerText = "RM " + total.toFixed(2);

}

qtyInputs.forEach(input=>{
input.addEventListener('input',kiraTotal);
});

</script>