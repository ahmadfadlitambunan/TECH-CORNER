<?php 

include('layout/header.php');
session_start();

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
                            <?php if (isset($_SESSION["regStat"])) : ?>
                                <?php if($_SESSION["regStat"] == "success") : ?>
                            	<div class="text-center">
                            		<h3 class="text-gray-900">Registration Success</h3>
                            	</div>
                            	<hr>

                            	<div class="text-center">
                            		<img class="img-fluid px-1 px-sm-2 mt-1 mb-2 w-50 " src="https://image.freepik.com/free-vector/mail-sent-concept-illustration_114360-96.jpg">
                            	</div>
                            		<p class="text-center">Thanks for registering. We have sent Email Verification to your Email Address. Please verify your account.</p>
                            	<div class="text-center">
                                    <a class="small" href="resend-email.php">Did not receive any Email? Resend Email</a>
                                </div>
                                <?php endif; ?>

                               <?php if($_SESSION["regStat"] == "failed") : ?>         
                                <div class="text-center">
                                    <h3 class="text-gray-900">Registration Failed</h3>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <img class="img-fluid px-1 px-sm-2 mt-1 mb-2 w-50 " src="https://image.freepik.com/free-vector/no-data-concept-illustration_114360-626.jpg">
                                </div>
                                    <p class="text-center">We are so sorry. There is something wrong. We cannot finish your registration.</p>
                                <div class="text-center">
                                    <a class="small" href="register.php">Try to register again? Create an Account</a>
                                </div>
                                <?php endif; ?>

                            <?php unset($_SESSION["regStat"]); ?>
                            <?php endif; ?>

                            <?php if(isset($_SESSION["reset"])): ?>
                                <?php if($_SESSION["reset"] == "success") : ?>
                                <div class="text-center">
                                    <h3 class="text-gray-900">Reset Password</h3>
                                </div>
                                <hr>

                                <div class="text-center">
                                    <img class="img-fluid px-1 px-sm-2 mt-1 mb-2 w-50 " src="https://image.freepik.com/free-vector/mail-sent-concept-illustration_114360-96.jpg">
                                </div>
                                    <p class="text-center">We have sent E-mail for your reset-password request. Please check your E-mail inbox</p>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Did not receive any Email? Try again</a>
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
                                    <p class="text-center">We are so sorry. There is something wrong. We cannot finish your reset-password request</p>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Try again?</a>
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