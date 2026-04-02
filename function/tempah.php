<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function prosesTempahan() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['tempahan']) || empty($_POST['tempahan'])) {
            header("Location: index.php?menu=tempah&error=no_items");
            exit();
        }

        $invoice_no = "INV" . date("Ymd") . rand(100,999);
        $nama_pelanggan = trim($_POST['nama_pelanggan']);
        if (empty($nama_pelanggan)) {
            header("Location: index.php?menu=tempah&error=no_name");
            exit();
        }

        include __DIR__ . '/../data/produk.php';

        $ordered_items = [];
        $total = 0;

        foreach ($_POST['tempahan'] as $product_id => $sizes) {
            foreach ($sizes as $size => $qty) {
                $qty = (int)$qty;
                if ($qty > 0) {
                    $product = null;
                    foreach ($data as $p) {
                        if ($p['id'] == $product_id) {
                            $product = $p;
                            break;
                        }
                    }
                    if ($product && isset($product['harga'][$size])) {
                        $price = $product['harga'][$size];
                        $subtotal = $qty * $price;
                        $total += $subtotal;
                        $ordered_items[] = [
                            'nama'    => $product['nama'],
                            'gambar'  => $product['gambar'],
                            'saiz'    => ucwords(str_replace('_', ' ', $size)),
                            'harga'   => $price,
                            'kuantiti'=> $qty,
                            'jumlah'  => $subtotal
                        ];
                    }
                }
            }
        }

        if (empty($ordered_items)) {
            header("Location: index.php?menu=tempah&error=no_items");
            exit();
        }

        $_SESSION['invois_data'] = [
            'invoice_no'     => $invoice_no,
            'nama_pelanggan' => $nama_pelanggan,
            'tarikh'         => date("Y-m-d"),
            'ordered_items'  => $ordered_items,
            'total'          => $total
        ];

        header("Location: index.php?menu=invois");
        exit();
    }
}
?>