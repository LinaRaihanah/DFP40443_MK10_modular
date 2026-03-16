<?php
$current = $_GET['menu'] ?? 'utama';
?>

<!DOCTYPE html>
<html lang="ms">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Questrial&display=swap" rel="stylesheet">

<?php include "layout/style.php"; ?>

</head>

<body class="page-body">

<div class="container">

<div class="header-wrapper">

<h2 class="site-title">Biskut Klasik</h2>

<nav class="nav-menu">

<a href="index.php?menu=utama"
class="nav-link <?= $current=='utama'?'active':'' ?>">
Utama
</a>

<a href="index.php?menu=tempah"
class="nav-link <?= $current=='tempah'?'active':'' ?>">
Tempah
</a>

<a href="index.php?menu=invois"
class="nav-link <?= $current=='invois'?'active':'' ?>">
Invois
</a>

</nav>

</div>