<?php
session_start(); // Mulakan session sekali sahaja di sini

$current = $_GET['menu'] ?? 'utama';

// Kawal routing halaman modular
switch($current){
    case 'utama':
        include "pages/utama.php";
        break;

    case 'tempah':
        include "pages/tempah.php";
        break;

    case 'invois':
        include "pages/invois.php";
        break;

    default:
        echo "Menu tidak wujud";
}