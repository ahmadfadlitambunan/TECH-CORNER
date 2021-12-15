<?php 

    include('../_config/connect.php');
    session_start();

    $url = $_SERVER['REQUEST_URI'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECH CORNER</title>

    <!-- Icon CDN untuk Modal dan Header -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="assets/css/style.css">
    <?php if($url == '/tech-corner/forum/tim.php') : ?>
    <link rel="stylesheet" href="assets/css/tim.css">
    <?php endif; ?>
    <?php if($url == '/tech-corner/forum/all.php') : ?>
    <link rel="stylesheet" href="assets/css/forum.css">
    <?php endif; ?>
    <?php if($url == '/tech-corner/forum/buat.php') : ?>
    <link rel="stylesheet" href="assets/css/buat.css">
    <?php endif; ?>

    <!-- Bar Icon -->
    <link rel="shortcut icon" href="assets/img/icon.png" type="image/x-icon">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@600&display=swap" rel="stylesheet">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- CDN Font Awesome -->
    <script src="https://use.fontawesome.com/57879be922.js"></script>
</head>