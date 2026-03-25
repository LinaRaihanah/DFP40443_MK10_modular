<?php
session_start();
include "../config/produk.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$namapelanggan=htmlspecialchars(trim($_POST['namapelanggan']));
$tempahan=$_POST['tempahan']??[];

$item=[];
$total=0;

foreach($tempahan as $id=>$saizlist){

foreach($data as $p){

if($p['id']==$id){

foreach($saizlist as $saiz=>$qty){

$qty=(int)$qty;

if($qty>0){

$harga=$p['harga'][$saiz];
$jumlah=$qty*$harga;

$item[]=[
'namaproduk'=>$p['nama'],
'saiz'=>ucfirst($saiz),
'hargaseunit'=>$harga,
'kuantiti'=>$qty,
'jumlahharga'=>$jumlah
];

$total+=$jumlah;

}

}

}

}

}

if($total==0){
header("Location: ../index.php?menu=tempah");
exit();
}

$_SESSION['invoisdata']=[
'noinvois'=>'INV-'.rand(10000,99999),
'namapelanggan'=>$namapelanggan,
'tarikh'=>date("d/m/Y"),
'items'=>$item,
'jumlahbesar'=>$total
];

header("Location: ../index.php?menu=invois");
exit();
}