<?php 

include('layout/header.php');
session_start();

if(isset($_GET["vkey"])){
    $vkey = $_GET["vkey"];

    $query = "SELECT vkey, verified FROM users WHERE vkey='$vkey' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if($row['verified'] == 0 ){
            $clicked_vkey = $row['vkey'];
            $update_query = "UPDATE users SET verified='1' WHERE vkey='$clicked_vkey' LIMIT 1";
            $run = mysqli_query($conn, $update_query);

            if($run){
// success
                $status = "success";

            } else {
                echo mysqli_error($run);
// error
                $status = "error1";
            }

        } else {
// already verified
            $status = "already";
        }

    } else {
// vkey does not exist
        $status = "error2";
    }

} else {
// novkeyy
    $status = "error3";
}






?>

<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    <a href="../forum/index.php"><img class="" src="assets/img/logo.png" width="150px"></a>
                                    <hr>
                                    <h5 class="text-gray-900">Verifikasi E-mail</h5>
                                </div>
                                <hr>

                                <?php if($status == "success") : ?>
                                    <!-- Success: Verifying -->
                                    <div>
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">BERHASIL</h4>
                                            <p>Akun Anda telah berhasil diverifikasi. Anda sekarang dapat login ke <a href="login.php">TECH CORNER</a></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($status == "already") : ?>
                                    <!-- Success: Already -->
                                    <div>
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Sudah Diverifikasi</h4>
                                            <p>Akun Anda telah berhasil diverifikasi. Anda sekarang dapat login ke  <a href="login.php">TECH CORNER</a></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($status == "error1" ) : ?>
                                    <!-- Error: something wrong -->
                                    <div>
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Error</h4>
                                            <p>Ada sesuatu yang salah. Kami tidak dapat memverifikasi akun Anda</p>
                                            <hr>
                                            <div class="text-center">
                                                <a class="small" href="resend-email.php">Ingin mengirim ulang e-mail?</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($status == "error2") : ?>
                                    <!-- Error: Vkey not exist -->
                                    <div>
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Error</h4>
                                            <p>Vkey tidak ada. Kami tidak dapat memverifikasi akun Anda</p>
                                            <hr>
                                            <div class="text-center">
                                                <a class="small" href="resend-email.php">Ingin mengirim ulang Email?</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($status == "error3") : ?>
                                    <!-- Error: not allowed -->
                                    <div>
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Error</h4>
                                            <p>Anda tidak diperbolehkan mengakses halaman ini</p>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="register.php">Buat akun!</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="login.php">Sudah punya akun? Login!</a>
                                        </div>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include('layout/footer.php'); ?>