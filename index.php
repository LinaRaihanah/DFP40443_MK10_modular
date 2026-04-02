<?php
session_start();
include "data_produk.php";
include "header.php";

$menu = $_GET['menu'] ?? 'utama';

switch ($menu) {
    case 'utama':
        include "utama.php";
        break;
    case 'tempah':
        include "tempah.php";
        break;
    case 'invois':
        include "invois.php";
        break;
    default:
        include "utama.php";

}
include "footer.php";
?>
   

