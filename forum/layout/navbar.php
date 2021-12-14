<body class="body">
    <!-- Header -->
    <div class="header">
        <div class="container mb-3 mt-2">
            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <a href="index.php"><img src="assets/img/logo.png" width="100"></a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-3">
                        <li class="nav-item active">
                            <a class="nav-link" href="all.php"><i class="fa fa-users" aria-hidden="true"></i>
                                Forum<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fa fa-users" aria-hidden="true"></i>
                                Carikom<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <?php if(isset($_SESSION["level"])) { ?>
                            <?php if($_SESSION["level"] == "admin") { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../admin/index.php"><i class="fa fa-users" aria-hidden="true"></i>
                                Admin<span class="sr-only">(current)</span>
                            </a>
                        </li>
                            <?php }?>
                        <?php } ?>

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form method="GET" action="action.php" class="search">
                                <div class="search__wrapper">
                                <input type="text" name="keywords" id="search" placeholder="Cari thread..." class="search__field">
                                <button type="submit" name="search" class="fa fa-search search__icon"></button>
                                </div>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buat.php"><i class="fa fa-pencil" aria-hidden="true"></i>
                                Tulis Thread
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            Kategori
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="kategori/komputer.php">Komputer</a>
                                <a class="dropdown-item" href="kategori/laptop.php">Laptop</a>
                                <a class="dropdown-item" href="kategori/gadget.php">Gadget</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="all.php">Semua</a>
                            </div>
                        </li>
                        <?php if(isset($_SESSION["login"])) { ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img width="50px" style="border-radius: 50%;" src="assets/img/logo.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
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
                                <a class="dropdown-item" href="../auth/user.php?aksi=logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        <?php
                            } else { 
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../auth/login.php">
                                Masuk
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>