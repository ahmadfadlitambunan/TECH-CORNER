<?php
include ("layout/header.php");
include ("../_config/connect.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Posting</h1>
                        
                    </div>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-10 col-lg-10">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php

                                    $query = "SELECT * FROM posting";
                                    $hasil = mysqli_query ($conn, $query);

                                    echo "<table class = 'table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>Judul</th><th>Konten</th><th>Kategori</th>";
                                    echo "</tr>";

                                    foreach ($hasil as $data) {
                                        echo "<tr>";
                                        echo "<td>$data[judul]</td>";
                                        echo "<td>$data[konten]</td>";
                                        echo "<td>$data[kategori]</td>";
                                       
                                       
                                        //tombol update
                                        echo "<td><form method='POST' action='ubah.php'>
                                        <input hidden type='text' name='id' value=$data[id_thread]>
                                        <button type='submit' name='btnUpdate' class='btn btn-success'>Update</button></form></td>";

                                        //tombol delete
                                        echo "<td><form onsubmit=\"return confirm ('Anda Yakin Mau Menghapus Data?');\" method='POST'>";
                                        echo "<input hidden type='text' name='id' value=$data[id_thread]>";
                                        echo "<button type='submit' name='btnHapus' class='btn btn-danger'>Delete</button></form></td>";

                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    ?>

                                    <?php
                                        if(isset($_POST['btnHapus'])){

                                    //inisiasi variabel untuk menampung isian id
                                    $id=$_POST['id'];

                                    if ($conn){
                                    $sql = "DELETE FROM posting WHERE id_thread=$id";
                                    mysqli_query($conn,$sql);
                                    echo "<p class='alert alert-success text-center'><b>Data Akun Berhasil Dihapus.</b></p>";
                                    } elseif ($conn->connect_error){
                                            echo "<p class='alert alert-danger text-center><b>Data gagal dihapus. Terjadi kesalahan: ". $conn->connect_error. "</b></p>";
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
            <nav aria-label="Page navigation example">
    <div class="mx-auto">
  <ul class="pagination"> 
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
  </div>
</nav>


<?php
include ("layout/footer.php");
?>