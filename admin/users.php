<?php
include ("layout/header.php");
include ("../_config/connect.php");
include("../forum/funct/function.php");
?>

<?php

$jumlah_data_perhalaman = 2;

//cari jumlah data ada brp
$jumlahData = count(query("SELECT * FROM posting "));
$jumlahpage = ceil($jumlahData / $jumlah_data_perhalaman);

$activepage = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awal = ($jumlah_data_perhalaman * $activepage) - $jumlah_data_perhalaman;

$list = query("SELECT * FROM posting  LIMIT $awal,$jumlah_data_perhalaman")

?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
                    
                </div>


                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary"></h6>
                                
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <?php

                                $query = "SELECT * FROM users";
                                $hasil = mysqli_query ($conn, $query);

                                echo "<table class = 'table table-bordered'>";
                                echo "<tr>";
                                echo "<th>Id</th><th>Username</th><th>Email</th><th>Nama</th><th>Level</th>";
                                echo "</tr>";

                                foreach ($hasil as $data) {
                                    echo "<tr>";
                                    echo "<td>$data[id_user]</td>";
                                    echo "<td>$data[username]</td>";
                                    echo "<td>$data[email]</td>";
                                    echo "<td>$data[name]</td>";
                                    echo "<td>$data[level]</td>";
                                    
                                    //tombol update
                                    echo "<td><form method='POST' action='ubah.php'>
                                    <input hidden type='text' name='id' value=$data[id_user]>
                                    <button type='submit' name='btnUpdate' class='btn btn-success'>Update</button></form></td>";

                                    //tombol delete
                                    echo "<td><form onsubmit=\"return confirm ('Anda Yakin Mau Menghapus Data?');\" method='POST'>";
                                    echo "<input hidden type='text' name='id' value=$data[id_user]>";
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
                                $sql = "DELETE FROM users WHERE id_user=$id";
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
            
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <?php if ($activepage > 1) : ?>
                            <a class="page-link" href="index?halaman=<?= $activepage - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        <?php endif; ?>
                    </li>
                    <?php for ($i = 1; $i <= $jumlahpage; $i++) : ?>
                        <?php if ($i === $activepage) : ?>
                            <li class="page-item  "><a class="page-link" href="index.php?halaman=<?= $i ?>"><?= $i ?></a></li>
                        <?php else : ?>
                            <li class="page-item "><a class="page-link" href="index.php?halaman=<?= $i ?>"><?= $i ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <li class="page-item">
                        <?php if ($activepage < $jumlahpage) : ?>
                            <a class="page-link" href="index.php?halaman=<?= $activepage + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>


<?php
include ("layout/footer.php");
?>