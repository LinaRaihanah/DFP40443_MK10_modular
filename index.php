<?php
session_start();

$menu = $_GET['menu'] ?? 'utama';

include "layout/header.php";

switch($menu){
    case "utama":
        include "pages/utama.php";
        break;

    case "tempah":
        include "pages/tempah.php";
        break;

    case "invois":
        include "pages/invois.php";
        break;

    default:
        echo "<h1>Halaman tidak wujud</h1>";
}

include "layout/footer.php";