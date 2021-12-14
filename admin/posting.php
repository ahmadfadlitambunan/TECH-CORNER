<?php
include ("layout/header.php");
?>
<?php  

date_default_timezone_set('Asia/Jakarta');

    // Koneksi ke database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'project';

    $conn = mysqli_connect($host , $user , $pass, $database);

    if($conn -> connect_error){
        die("Koneksi Gagal: " .$conn -> connect_error);
    }

    // // fungsi baseUrl
    // function base_url($url = null) {
    // 	$base_url = "http://localhost/project";
    // 	if($url != null) {
    // 		return $base_url."/".$url;
    // 	} else {
    // 		return $base_url;
    // 	}
    // }

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Akun</h1>
                        
                    </div>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php

                                    $query = "SELECT * FROM posting";
                                    $hasil = mysqli_query ($conn, $query);

                                    echo "<table class = 'table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>Username</th><th>Password</th><th>Nama</th><th>Email</th>";
                                    echo "</tr>";

                                    foreach ($hasil as $data) {
                                        echo "<tr>";
                                        echo "<td>$data[username]</td>";
                                        echo "<td>$data[password]</td>";
                                        echo "<td>$data[nama]</td>";
                                        echo "<td>$data[email]</td>";
                                        //tombol update
                                        echo "<td><form method='POST' action='ubah.php'>
                                        <input hidden type='text' name='id' value=".$data['id'].">
                                        <button type='submit' name='btnUpdate' class='btn btn-success'>Update</button></form></td>";

                                        //tombol delete
                                        echo "<td><form onsubmit=\"return confirm ('Anda Yakin Mau Menghapus Data?');\" method='POST'>";
                                        echo "<input hidden name='id' type='text' value=$data[id]>";
                                        echo "<button type='submit' name='btnHapus' class='btn btn-danger'>Delete</button></form></td>";

                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    ?>

                                    <?php
                                        if(isset($_POST['btnHapus'])){

                                    //inisiasi variabel untuk menampung isian id
                                    $id=$_POST['id'];

                                    if ($koneksi){
                                    $sql = "DELETE FROM posting WHERE id=$id";
                                    mysqli_query($koneksi,$sql);
                                    echo "<p class='alert alert-success text-center'><b>Data Akun Berhasil Dihapus.</b></p>";
                                    } elseif ($koneksi->connect_error){
                                            echo "<p class='alert alert-danger text-center><b>Data gagal dihapus. Terjadi kesalahan: ". $koneksi->connect_error. "</b></p>";
                                        }
                                      }     
                                     ?>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
