<?php
include("layout/header.php");
include("../_config/connect.php");
include("../forum/funct/function.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="POST" class="form-reg" novalidate="" action="edituser.php">
                            <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $query = "SELECT *FROM users WHERE id_user = $id";
                                    $result = mysqli_query($conn, $query);
                                    foreach ($result as $data) :
                            ?>


                            <div class="form-group">
                                <input hidden type="number" name="id" id="u_id" value="<?= $data['id_user'] ?>">
                                <label for="uname">Username</label>
                                <input value="<?= $data['username'] ?>" id="uname" type="text" class="form-control" name="uname" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input value="<?= $data['email'] ?>" id="email" type="email" class="form-control" name="email" required data-eye>
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input value="<?= $data['name'] ?>" id="name" type="text" class="form-control" name="nama" required autofocus>

                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <input value="<?= $data['level'] ?>" id="level" type="text" class="form-control" name="level" required autofocus>
                            </div>

                            <?php endforeach; ?>
                            <?php } ?>
                        <div class="form-group mt-2 m-0">
                            <button name="btnUbah" type="submit" class="btn btn-primary btn-block">
                                Update
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['btnUbah'])) {

                            $id_ = $_POST['id'];
                            $username = $_POST['uname'];
                          
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $level = $_POST['level'];

                            if ($conn) {
                                $sql = "UPDATE users SET username='$username',name='$nama',email='$email',level='$level' WHERE id_user=$id_";
                                mysqli_query($conn, $sql);
                                echo "<p class='alert alert-success text-center'><b>Perubahan Akun Berhasil Disimpan. <a href='users.php' class='btn btn-primary'>Kembali</a></b></p>";
                            } else {
                                echo "<p class='alert alert-danger text-center><b>Terjadi kesalahan: $error</b></p>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>


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




</script>
<?php
include("layout/footer.php");
?>