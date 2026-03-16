<?php
session_start();

$menu = $_GET['menu'] ?? 'utama';

include "layout/header.php";

if($menu == "utama"){
    include "pages/utama.php";
}

elseif($menu == "tempah"){
    include "pages/tempah.php";
}

elseif($menu == "invois"){
    include "pages/invois.php";
}

else{
    echo "<h1>Halaman tidak wujud</h1>";
}

include "layout/footer.php";