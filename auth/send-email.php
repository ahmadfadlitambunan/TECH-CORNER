<?php 

include('layout/header.php');

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
                                <div class="text-center"><a href="../forum/index.php"><img class="" src="assets/img/logo.png" width="150px"></a>
                            </div>
                            <?php if (isset($_SESSION["regStat"])) : ?>
                                <?php if($_SESSION["regStat"] == "success") : ?>
                            	<div class="text-center">
                            		<h3 class="text-gray-900">Registrasi berhasil</h3>
                            	</div>
                            	<hr>

                            	<div class="text-center">
                            		<img class="img-fluid px-1 px-sm-2 mt-1 mb-2 w-50 " src="https://image.freepik.com/free-vector/mail-sent-concept-illustration_114360-96.jpg">
                            	</div>
                            		<p class="text-center">Terima kasih telah mendaftar. Kami telah mengirimkan verifikasi e-mail ke alamat e-mail Anda. Harap verifikasi akun Anda.</p>
                            	<div class="text-center">
                                    <a class="small" href="resend-email.php">Tidak menerima e-mail apa pun? Kirim Ulang e-mail</a>
                                </div>
                                <?php endif; ?>

                               <?php if($_SESSION["regStat"] == "failed") : ?>         
                                <div class="text-center">
                                    <h3 class="text-gray-900">Registrasi gagal</h3>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <img class="img-fluid px-1 px-sm-2 mt-1 mb-2 w-50 " src="https://image.freepik.com/free-vector/no-data-concept-illustration_114360-626.jpg">
                                </div>
                                    <p class="text-center">Mohon maaf. Ada sesuatu yang salah. Kami tidak dapat menyelesaikan pendaftaran Anda.</p>
                                <div class="text-center">
                                    <a class="small" href="register.php">Coba daftar lagi? Buat sebuah akun</a>
                                </div>
                                <?php endif; ?>

                            <?php unset($_SESSION["regStat"]); ?>
                            <?php endif; ?>

                            <?php if(isset($_SESSION["reset"])): ?>
                                <?php if($_SESSION["reset"] == "success") : ?>
                                <div class="text-center">
                                    <h5 class="text-gray-900">Reset Password</h5>
                                </div>
                                <hr>

                                <div class="text-center">
                                    <img class="img-fluid px-1 px-sm-2 mt-1 mb-2 w-50 " src="https://image.freepik.com/free-vector/mail-sent-concept-illustration_114360-96.jpg">
                                </div>
                                    <p class="text-center">Kami telah mengirimkan e-mail untuk permintaan reset-password Anda. Silakan periksa kotak masuk e-mail Anda</p>
                                <div class="text-center">
                                    <a class="small" href="resend-email.php">Tidak menerima e-mail apa pun? Coba lagi</a>
                                </div>
                                <?php endif; ?>

                               <?php if($_SESSION["reset"] == "failed") : ?>         
                                <div class="text-center">
                                    <h3 class="text-gray-900">Reset Password</h3>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <img class="img-fluid px-1 px-sm-2 mt-1 mb-2 w-50 " src="https://image.freepik.com/free-vector/no-data-concept-illustration_114360-626.jpg">
                                </div>
                                    <p class="text-center">Mohon maaf. Ada sesuatu yang salah. Kami tidak dapat menyelesaikan permintaan reset-password Anda.</p>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Coba lagi?</a>
                                </div>
                                <?php endif; ?>
                            <?php 
                                unset($_SESSION["reset"]); 
                                endif;
                             ?>
                                    
                             </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php include('layout/footer.php') ?>