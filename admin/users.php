<?php
include ("layout/header.php");
include ("../_config/connect.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                        
                    </div>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-10">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Users</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php

                                    $query = "SELECT * FROM users";
                                    $hasil = mysqli_query ($conn, $query);

                                    echo "<table class = 'table table-bordered'>";
                                    echo "<tr>";
                                    echo "<tr><th>Username</th><th>Email</th><th>Name</th><th>Level</th><th>Verified</th><th>Created_at</th>";
                                    echo "</tr>";

                                    foreach ($hasil as $data) {
                                        echo "<tr>";
                                        echo "<td>$data[username]</td>";
                                        echo "<td>$data[email]</td>";
                                        echo "<td>$data[name]</td>";
                                        echo "<td>$data[level]</td>";
                                        echo "<td>$data[verified]</td>";
                                        echo "<td>$data[created_at]</td>";
                                        //tombol update
                                        echo "<td><form method='POST' action='users.php'>
                                        <input hidden type='text' name='username' value=" . $data['username'] .">
                                        <button type='submit' name='btnUpdate' class='btn btn-success'>Update<i class='fas fa-sync'></i></button></form></td>";

                                        //tombol delete
                                        echo "<td><form onsubmit=\"return confirm ('Anda Yakin Mau Menghapus Data?');\" method='POST'>";
                                        echo "<input hidden name='username' type='text' value=$data[username]>";
                                        echo "<button type='submit' name='btnHapus' class='btn btn-danger'>Delete<i class='fas fa-trash-alt'></i></button></form></td>";

                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    ?>
                                    <?php
                                        if(isset($_POST['btnHapus'])){

                                    //inisiasi variabel untuk menampung isian id
                                    $id=$_POST['id'];

                                    if ($conn){
                                    $sql = "DELETE FROM users WHERE username=$id";
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
