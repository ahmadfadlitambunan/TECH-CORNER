<?php 
    include("layout/header.php");
    include("layout/navbar.php"); 

    if(isset($_GET["id"])){
        // cek apakah id get dengan sesi sama
        if($_GET["id"] == $_SESSION["id"]){
            $id_user = $_GET["id"];
        } else {
            echo("<script>location.href = '../forum/index.php';</script>");
            exit;
        }
    } else {
       echo("<script>location.href = '../forum/index.php';</script>");
        exit;
    }
?>

<div class="container align-self-center">
    <div class="main-content">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb forum">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="all.php">All</a></li>
                <li class="breadcrumb-item"><a href="#">fsafdas</a></li>
                <li class="breadcrumb-item active" aria-current="page">fasfas</li>
            </ol>
        </nav>
        <form action="" method="POST" id="form-ubah-pass">
            <input type="hidden" name="id_user" id="id_user" value="<?= $id_user; ?>">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Ubah Password<span><i class="fa fa-lock ml-2"></i></span></div>
                        <div class="card-body">
                            <!-- Form Group (password) -->
                            <div class="form-group">
                                <label class="small mb-1" for="password">Password Lama</label>
                                <input type="password" name="pass" id="password" class="form-control" placeholder="Masukkan Password Lama Anda!">
                                <div id="password-validation"></div>
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="form-group mb-3">
                                <label class="small mb-1" for="pass1">Password Baru</label>
                                <input class="form-control" id="pass1" type="password" placeholder="Masukkan Password Baru Anda!" name="pass1">
                                <div id="pass1-validation"></div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="pass2">Konfirmasi Password Baru</label>
                                <input class="form-control" id="pass2" type="password" placeholder="Masukkan Konfirmasi Password!" name="pass2">
                                <div id="pass2-validation"></div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" name="ubah-pass" class="btn btn-success" onclick="return confirm ('Anda Yakin Mau Mengubah Password?');">Ubah Password</button>
                                <a href="profile.php?id=<?= $id_user; ?>" class="btn btn-outline-success">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#password').blur(function(){
            event.preventDefault();
            var pass = $(this).val();
            var id_user = $('#id_user').val();
            $.ajax({
                type    : 'POST',
                url     : 'function.php?aksi=validasi-oldpass',
                data    : { pass : pass, id_user : id_user},
                success : function(data){
                    if(data == "match"){
                        setSucces("#password");
                    } else {
                        setError("#password", "Password yang anda masukkan salah");
                    }
                }
            });
        });

        $("#form-ubah-pass").submit(function(){
            if($('#password').val().length == 0){
                setError("#password", "Password lama harus diisi");
                return false;
            } else {
                setSucces("#password");
            }

            // validasi password 1
            if($('#pass1').val().length < 8){
                setError("#pass1", "Password baru minimal 8 karakter");
                return false;
            } else {
                setSucces("#pass1");
            }

        // validasi password 2
            if($('#pass2').val() != $('#pass1').val() || $('#pass2').val().legth < 8){
                setError("#pass2", "Konfirmasi password tidak cocok");
                return false;
            } else {
                setSucces("#pass2");
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
<?php 


include("function.php");
// men-check apakah tombol sumbit sudah ditekan atau belum
if (isset($_POST["ubah-pass"])){


    // cek apakah data berhasil diubah atau tidak
    if ( ubah_pass($_POST) > 0) {
        echo "
            <script>
                alert('Password Berhasil Diubah!');
                document.location.href='profile.php?id=$id_user';
            </script>
            ";
    } else {

        echo "
            <script>
                alert('Password Gagal Diubah!');
                document.location.href='profile.php?id=$id_user';
            </script>
            ";
    }
}


    include("layout/footer.php");

 ?>