 <?php 

 include('layout/header.php'); 
 ?>

 <body>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-3">
                            <div class="text-center">
                                <a href="../forum/index.php"><img src="assets/img/logo.png" width="150px"></a>
                                <hr>
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                            </div>
                            <form class="user" id="form-reg" novalidate action="user.php?aksi=register" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Alamat E-mail" required>
                                    <div id="email-validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="uname" id="uname" placeholder="Username" required>
                                    <div id="uname-validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Nama" required>  
                                    <div id="name-validation"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="pass1" id="pass1" placeholder="Password" required>
                                        <div id="pass1-validation" ></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="pass2" placeholder="Ulangi Password" required>
                                        <div id="pass2-validation"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-user btn-success btn-block" name="register">Register</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Sudah punya akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>


       $(document).ready(function(){
        $('#email').blur(function(){
          event.preventDefault();
          var email = $(this).val();
          $.ajax({
            type    : 'POST',
            url     : 'user.php?aksi=validasi-email',
            data    : 'email='+email,
            success : function(data){
              if (data == "invalid"){
                  setError("#email", "Email is not valid");
              } else if(data == "ok"){
                  setSucces("#email");
              } else {
                  setError("#email", "Email has been used")
              }
          }
      });
      });


        $('#uname').blur(function(){
          event.preventDefault();
          var uname = $(this).val();
          $.ajax({
            type    : 'POST',
            url     : 'user.php?aksi=validasi-uname',
            data    : 'uname='+uname,
            success : function(data){
              if(data == "less"){
                setError("#uname", "Username must be at least 5 characters");
            } else if (data == "too much"){
                setError("#uname", "Username cannot be more than 20 characters")
            } else if(data == "ok"){
              setSucces("#uname");
          } else {
              setError("#uname", "username has been used")
          }
      }
  });
      });




        $('#form-reg').submit(function(){

       // validasi email
        if($('#email').val().length == 0){
            setError("#email", "Email cannot be blank");
                return false;
            } else {
                setSucces("#email");
        }


        // validasi username
        if($('#uname').val().length < 5){
            setError("#uname", "Username must be at least 5 characters");
            return false;
        }   else {
            setSucces("#uname");
        }

        if($('#uname').val().length >= 20){
            setError("#uname", "Username cannot be more than 20 characters");
            return false;
        }   else {
            setSucces("#uname");
        }


       // validasi nama
       if($('#name').val().length == 0){
        setError("#name", "Name cannot be blank");
        return false;
    } else {
        setSucces("#name");
    }


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

    });




        $('#name').blur(function(){
            event.preventDefault();
            if($('#name').val().length == 0){
                setError("#name", "Name cannot be blank");
            } else {
                setSucces("#name");
            }
        });


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


  });

</script>	

<!-- END SCRIPT -->



<?php include('layout/footer.php'); ?>