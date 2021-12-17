<?php 

include('layout/header.php');
session_start();


?>


<body class="bg-gradient-success">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-3">
                                    <div class="text-center">
                                        <a href="../forum/index.php"><img src="assets/img/logo.png" width="150px"></a>
                                        <hr>
                                        <?php if(isset($_GET["for"])) {
                                            if($_GET["for"] == "tulis") { 
                                                $_SESSION["for"] = "tulis";
                                                ?>
                                                <h1 class="h5 text-gray-900 mb-4">Silahkan Login Untuk Menulis Thread Baru</h1>
                                            <?php } ?>
                                            <?php if($_GET["for"] == 'komen') {
                                                $_SESSION["for"] = 'komen' ?>
                                                <h1 class="h5 text-gray-900 mb-4">Silahkan Login Untuk Berkomentar</h1>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                        <?php } ?>

                                    </div>
                                    <form class="user" method="POST" action="user.php?aksi=login">

                                        <?php if(isset($_SESSION["error1"])) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Gagal</h4>
                                                <p>Akun Anda belum diverifikasi. Harap verifikasi akun Anda!</p>
                                                <hr>
                                                <div class="text-center">
                                                    <a class="small" href="resend-email.php">Tidak menerima Verifikasi Email? Kirim Ulang Email</a>
                                                </div>
                                            </div>
                                            <?php unset($_SESSION["error1"]); ?>
                                        <?php endif; ?>


                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                            placeholder="Masukkan Alamat E-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="pass" placeholder="Masukkan Password">
                                        </div>

                                        <?php if(isset($_SESSION["error2"])) : ?>
                                            <div class="text-center">
                                                <p class="text-danger">
                                                    Anda memasukkan Email/Password yang salah. Isi data dengan benar!
                                                </p>
                                            </div>
                                            <?php unset($_SESSION["error2"]); ?>
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ingat saya</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-success btn-user btn-block" type="submit" name="login">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Buat akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include('layout/footer.php'); ?>