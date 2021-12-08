<?php 

include('layout/header.php'); 

session_start();

if(isset($_POST["resend"])){
    if(!empty(trim($_POST["email"]))){
        $email = trim(mysqli_real_escape_string($conn, $_POST["email"]));

        $checkemail_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($conn, $checkemail_query);

        if(mysqli_num_rows($checkemail_query_run) > 0){
            $row = mysqli_fetch_assoc($checkemail_query_run);
            if($row['verified'] == 0){
                $vkey = $row['vkey'];
                $to = $email;
                $subject = "Email Verification";
                $message = "
                    <h2>You Have Registered to TECH CORNER</h2>
                    <h5>Verify your email address to Login with the given link below</h5>
                    <br><br>
                    <a href='http://localhost/project/auth/verify.php?vkey=$vkey'>Verify Now</a>
                    ";
                $headers = "From: techcornerPW@gmail.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "X-Priority: 1\r\n";

                mail($to, $subject, $message, $headers);
                $_SESSION["regStat"] = "success";
                header('Location: send-email.php');
                exit();

            } else {
                // email telah terverifikasi
                $error3 = true;
            }

        } else {
            // email tidak terdaftar
            $error2 = true;
        }

    } else {
        // tidak ada email yang dimasukkan
        $error1 = true;
    }
}



?>
    <!-- main content -->
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
                            		<h3 class="text-gray-900">Resend Email Verification</h3>
                            	</div>
                            	<hr>
                            	<form class="user" action="" method="POST">

                                    <?php if(isset($error3)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading">Verified</h4>
                                        <p>Your account already verified. You may now login to TECH CORNER</p>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small fa fa-fw fa-arrow-left" href="Login.php">login</a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                   

                                    <?php if(isset($error2)) : ?>
                        		    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Failed</h4>
                                        <p>Email has not been registered. Please register your account.!</p>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="register.php">Create an account!</a>
                                        </div>
                                    </div>
                                    <?php endif; ?>


                            		<div class="text-center">
                                		<p>Enter your email!</p>
                            		</div>
                            		<div class="form-group">
                                    	<input type="email" class="form-control form-control-user" name="email" id="email"
                                        placeholder="Email Address" required>
                                	</div>

                                    <!-- jika tidak ada email diberikan -->
                                    <?php if(isset($error1)) : ?>
                                    <div class="text-center">
                                        <p class="text-danger">
                                            Please enter your email address!
                                        </p>
                                    </div>
                                    <?php endif; ?>

                                	<button class="btn btn-success btn-user btn-block" name="resend">Resend</button>
                                	<hr>
                                	<div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                	
                                </form>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content -->

<?php include('layout/footer.php'); ?>

