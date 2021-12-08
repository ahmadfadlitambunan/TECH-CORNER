<?php include('../../_config/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECH CORNER | Kategori : Komputer</title>
    <!-- Icon CDN untuk Modal dan Header -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Bar Icon -->
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
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

<body class="body">
    <!-- Header -->
    <div class="header">
        <div class="container mb-3 mt-2">
            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <a href="../assets/index.html"><img src="../assets/img/logo.png" width="100"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form class="search">
                    <div class="search__wrapper">
                      <input type="text" name="" placeholder="Cari..." class="search__field">
                      <button type="submit" class="fa fa-search search__icon"></button>
                    </div>
                </form>
          
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="forum.html"><i class="fa fa-users" aria-hidden="true"></i>
                                Forum<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buat.html"><i class="fa fa-pencil" aria-hidden="true"></i>
                                Tulis Thread
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            Kategori
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="komputer.html">Komputer</a>
                                <a class="dropdown-item" href="laptop.html">Laptop</a>
                                <a class="dropdown-item" href="gadget.html">Gadget</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="forum.html">Semua</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                &nbsp; &nbsp; &nbsp;  
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Masuk
                            </a>
                        </li>
                        <div style="border: 1px #706c6c solid; height: 40px; width: 0px;"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Daftar
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>