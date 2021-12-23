<?php 
    include("layout/header.php");
    include("layout/navbar.php"); 

    if(isset($_GET["id"])){
        // cek apakah id get dengan sesi sama
        if($_GET["id"] == $_SESSION["id"]){
            $id_user = $_GET["id"];

            // ambil data berdasarkan id
            $query = "SELECT * FROM users WHERE id_user = '$id_user' LIMIT 1;";
            $result = mysqli_query($conn, $query);
            if ($result) {
                // fetch data
                foreach($result as $row) :
                    $name = $row['name'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $level = $row['level'];
                    $foto = $row['foto'];
                endforeach;
            } else {
                echo mysqli_error($conn);
                exit;
            }
        } else {
            header("Location: ../forum/index.php");
            exit;
        }
    } else {
        header("Location: ../forum/index.php");
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

        <form action="" method="POST" enctype="multipart/form-data" id="form-ubah">
            <input type="hidden" name="id_user" id="id_user" value="<?= $id_user; ?>">
            <input type="hidden" name='gambarLama' value="<?= $foto; ?>">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Foto Profile</div>
                        <div class="card-body">
                            <div class="text-center">
                            <!-- Profile picture image-->
                                <img class="rounded-circle mb-2" width="150px"> src="assets/img/<?= $foto; ?>" alt="">
                            </div>
                            <div class="input-group">
                                <div class="form-group">
                                    <label for="foto">Foto Profil Baru</label>
                                    <input type="file" name="gambar" id="foto" class="form-control-file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Edit Profil</div>
                        <div class="card-body">
                            <!-- Form Group (Email) -->
                            <div class="form-group">
                                <label class="small mb-1" for="email">Email (Email tidak dapat diubah)</label>
                                <input type="email" name="email" id="email" class="form-control" readonly value="<?= $email; ?>">
                            </div>
                            <!-- Form Group (username)-->
                            <div class="form-group mb-3">
                                <label class="small mb-1" for="uname">Username (Nama yang akan tampil di website forum)</label>
                                <input class="form-control" id="uname" type="text" placeholder="Enter your username" name="username" value="<?= $username; ?>">
                                <div id="uname-validation"></div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Nama Lengkap</label>
                                <input class="form-control" id="name" type="text" placeholder="Enter your username" name="name" value="<?= $name; ?>">
                                <div id="name-validation"></div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" name="ubah" class="btn btn-success">Simpan Perubahan</button>
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
        $('#uname').blur(function(){
            event.preventDefault();
            var uname = $(this).val();
            var id_user = $('#id_user').val();
            $.ajax({
                type    : 'POST',
                url     : 'function.php?aksi=validasi-uname',
                data    : { uname : uname, id_user : id_user},
                success : function(data){
                    if(data == "less"){
                        setError("#uname", "Username must be at least 5 characters");
                    } else if (data == "too much"){
                        setError("#uname", "Username cannot be more than 20 characters")
                    } else if(data == "ok"){
                        setSucces("#uname");
                    } else {
                        setError("#uname", "username has been used");
                    }
                }
            });
        });

        $('#form-ubah').submit(function(){
            if($('#uname').val().length < 5){
                setError("#uname", "Username setidaknya memiliki 5 karakter");
                return false;
            } else {
                setSucces("#uname");
            }

            if($('#uname').val().length >= 20){
                setError("#uname", "Username tidak boleh lebih dari 20 karakter");
                return false;
            } else {
            setSucces("#uname");
            }


            // validasi nama
            if($('#name').val().length == 0){
                setError("#name", "Name tidak boleh kosong");
                return false;
            } else {
                setSucces("#name");
            }
        });


        $('#name').blur(function(){
            event.preventDefault();
            if($('#name').val().length == 0){
                setError("#name", "Name tidak boleh kosong");
            } else {
                setSucces("#name");
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
if (isset($_POST["ubah"])){


    // cek apakah data berhasil diubah atau tidak
    if ( ubah_profile($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href='profile.php?id=$id_user';
            </script>
            ";
    } else {

        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href='profile.php?id=$id_user';
            </script>
            ";
    }
}


    include("layout/footer.php");

 ?>