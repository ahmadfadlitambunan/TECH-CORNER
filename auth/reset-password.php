<?php 

include('layout/header.php'); 

?>

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
                            		<h5 class="text-gray-900">Ubah Password</h5>
                            	</div>
                            	<hr>
                            	<?php if(isset($_SESSION["changeStat"])) { ?>
                            		<?php if($_SESSION["changeStat"] == "not exist") : ?>
                            		<div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Error</h4>
                                        <hr>
                                        <p>Token tidak ada</p>
                                    </div>
	                                <?php endif; ?>

	                                <?php if($_SESSION["changeStat"] == "invalid") : ?>
                            		<div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Error</h4>
                                        <hr>
                                        <p>Token tidak valid</p>
                                    </div>
	                                <?php endif; ?>

	                                <?php if($_SESSION["changeStat"] == "required") : ?>
                            		<div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Error</h4>
                                        <hr>
                                        <p>Password dan password konfirmasi tidak cocok</p>
                                    </div>
	                                <?php endif; ?>

	                                <?php if($_SESSION["changeStat"] == "error") : ?>
                            		<div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Error</h4>
                                        <hr>
                                        <p>Tidak dapat mengubah password Anda. Ada yang salah</p>
                                    </div>
	                                <?php endif; ?>

	                                <?php if($_SESSION["changeStat"] == "success") : ?>
                            		<div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading">Berhasil</h4>
                                        <hr>
                                        <p>Password dari akun Anda telah berhasil diubah. Silakan login dengan password baru Anda!</p>
                                        <hr>
                                        <div class="text-center">
	                                        <a class="small" href="login.php">Login</a>
	                                    </div>
                                    </div>
	                                <?php endif; ?>


                            	<?php 
                            		unset($_SESSION["changeStat"]);
                            		} else { 
                            	?>
                            	<div class="text-center">
                            		<p>Masukkan Password Baru Anda</p>
                            	</div>
	                            <?php } ?>
                            	<form class="user" id="form-reset" action="user.php?aksi=change-password" method="POST">
                            		<input type="hidden" name="change-token" value="<?php if(isset($_GET["vkey"])){echo $_GET["vkey"]; } ?>">
                            		<input type="hidden" name="email" value="<?php if(isset($_GET["email"])){echo $_GET["email"]; } ?>">
                                	<div class="form-group">
                                    	<input type="password" class="form-control form-control-user" name="pass1" id="pass1"
                                        placeholder="Password Baru">
                                        <div id="pass1-validation"></div>
                                	</div>
                                	<div class="form-group">
                                    	<input type="password" class="form-control form-control-user" name="pass2" id="pass2"
                                        placeholder="Konfirmasi Password">
                                        <div id="pass2-validation"></div>
                                	</div>
                                	<button class="btn btn-success btn-user btn-block" name="change">Reset</button>
                                	<hr>
                                	<div class="text-center">
                                        <a class="small" href="register.php">Buat akun!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Sudah punya akun? Login!</a>
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

    <!-- Script validasi -->
    <!-- <script>
    	$(document).ready(function(){
    		$("#form-reset").submit(function(){
    			// validasi password 1
		        if($('#pass1').val().length < 8){
		            setError("#pass1", "Password must be at least 8 characters");
		            return false;
		        } else {
		            setSucces("#pass1");
		        }

		        // validasi password 2
		        if($('#pass2').val() != $('#pass1').val() || $('#pass2').val().legth < 8){
		            setError("#pass2", "Confirmation Password does not match");
		            return false;
		        } else {
		            setSucces("#pass2");
		        }
    		})

    		$('#pass1').blur(function(){
        		event.preventDefault();
	            if($('#pass1').val().length < 8){
	                setError("#pass1", "Password must be at least 8 characters");
	            } else {
	                setSucces("#pass1")
	             }
	       });
       

	       $('#pass2').blur(function(){
	        	event.preventDefault();
	            if($('#pass2').val() != $('#pass1').val() || $('#pass2').val().legth < 8){
		            setError("#pass2", "Confirmation Password does not match");
	            } else {
	                setSucces("#pass2");
	            }
	       });


    		function setError(id, message){
		      $(id).removeClass('is-valid');
		      $(id).addClass('is-invalid');
		      $(id+'-validation').removeClass('valid-feedback');
		      $(id+'-validation').addClass('invalid-feedback');
		      $(id+'-validation').html(message);
		      return false;
		    } 

		    function setSucces(id){
		      $(id).removeClass('is-invalid');
		      $(id).addClass('is-valid');
		      $(id+'-validation').removeClass('invalid-feedback');
		      $(id+'-validation').html("");
		      return true;     
		    }
    	})


    </script> -->


<?php include('layout/header.php') ?>