<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function dapatkanInvois() {
    if (!isset($_SESSION['invois_data'])) {
        header("Location: index.php?menu=tempah");
        exit();
    }
    return $_SESSION['invois_data'];
}
?>