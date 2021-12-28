<?php
 include('../../_config/connect.php'); 
 session_start();

 if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$id' LIMIT 1;");
    $row = mysqli_fetch_assoc($result);

    // cek apakah kuki sesuai dengan sistem
    if($key === hash("sha256", $row['email'])){
        // set session
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row['id_user'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["level"] = $row['level'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["foto"] = $row['foto'];
    }
 }


?>

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
                <a href="../index.php"><img src="../assets/img/logo.png" width="100"></a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-3">
                        <?php if(isset($_SESSION["level"])) { ?>
                            <?php if($_SESSION["level"] == "admin") { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../../admin/index.php"><i class="fa fa-user" aria-hidden="true"></i>
                                Admin<span class="sr-only">(current)</span>
                            </a>
                        </li>
                            <?php }?>
                        <?php } ?>

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form class="search">
                                <div class="search__wrapper">
                                <input type="text" name="" placeholder="Cari..." class="search__field">
                                <button type="submit" class="fa fa-search search__icon"></button>
                                </div>
                            </form>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../all.php"><i class="fa fa-users" aria-hidden="true"></i>
                                Forum<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../buat.php"><i class="fa fa-pencil" aria-hidden="true"></i>
                                Tulis Thread
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            Kategori
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="komputer.php">Komputer</a>
                                <a class="dropdown-item" href="laptop.php">Laptop</a>
                                <a class="dropdown-item" href="gadget.php">Gadget</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../all.php">Semua</a>
                            </div>
                        </li>
                        <?php if(isset($_SESSION["login"])) { ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img width="50px" style="border-radius: 50%;" src="../../profile/assets/img/<?= $_SESSION["foto"]; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../../profile/profile.php?id=<?= $_SESSION["id"]; ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../auth/user.php?aksi=logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        <?php
                            } else { 
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../../auth/login.php">
                                Masuk
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>