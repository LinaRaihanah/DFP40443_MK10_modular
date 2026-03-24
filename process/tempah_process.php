<?php
session_start();
include "../config/produk.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $namapelanggan = htmlspecialchars(trim($_POST['namapelanggan']));
    $tempahaninput = $_POST['tempahan'] ?? [];

    $itemtempahan = [];
    $jumlahbesar = 0;

    foreach ($tempahaninput as $produkid => $saizlist) {

        foreach ($data as $p) {
            if ($p['id'] == $produkid) {

                foreach ($saizlist as $saiz => $qty) {

                    $qty = (int)$qty;

                    if ($qty > 0) {

                        $harga = $p['harga'][$saiz];
                        $jumlah = $qty * $harga;

                        $itemtempahan[] = [
                            'namaproduk' => $p['nama'],
                            'saiz' => ucfirst($saiz),
                            'hargaseunit' => $harga,
                            'kuantiti' => $qty,
                            'jumlahharga' => $jumlah
                        ];

                        $jumlahbesar += $jumlah;
                    }
                }
            }
        }
    }

    if ($jumlahbesar == 0) {
        header("Location: ../index.php?menu=tempah");
        exit();
    }

    $_SESSION['invoisdata'] = [
        'noinvois' => 'INV-' . rand(10000,99999),
        'namapelanggan' => $namapelanggan,
        'tarikh' => date("d/m/Y"),
        'items' => $itemtempahan,
        'jumlahbesar' => $jumlahbesar
    ];

    header("Location: ../index.php?menu=invois");
    exit();
}