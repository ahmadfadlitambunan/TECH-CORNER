<?php
include ("layout/header.php");
include ("../_config/connect.php");
include("../forum/funct/function.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Postingan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <?php
                    // memeriksa apakah ada nilai halaman yang dikirimkan
                    if (isset($_GET['halaman']) && $_GET['halaman'] != "") {
                        $halaman = $_GET['halaman'];
                    } else {
                        $halaman = 1;
                    }

                    //jumlah data yang  ditampilkan dalam 1 halaman
                    $limit = 10; 
                    if ($halaman > 1) {
                        $offset = ($halaman * $limit) - $limit;
                    } else $offset = 0;
                    $sebelum = $halaman - 1; 
                    $sesudah = $halaman + 1; 

                    $query = "SELECT * FROM posting";
                    $result = mysqli_query($conn, $query);
                    $jlh_data = mysqli_num_rows($result);      

                    //menghitung jumlah halaman
                    $jlh_halaman = ceil($jlh_data / $limit);    
                    $hal_akhir = $jlh_halaman;

                    //tampilkan data
                    $query2 = "SELECT * FROM posting LIMIT $offset,$limit"; 
                    $result2= mysqli_query($conn, $query2);
                        echo "<table class = 'table table-bordered'>";
                        echo "<tr>";
                        echo "<th>Id</th><th>Judul</th><th>Konten</th><th>Kategori</th><th>Tanggal Posting</th>";
                        echo "</tr>";
                    foreach ($result2 as $data) {
                        echo "<tr>";
                            echo "<td>$data[id_thread]</td>";
                            echo "<td>$data[judul]</td>";
                            echo "<td>$data[konten]</td>";
                            echo "<td>$data[kategori]</td>";
                            echo "<td>$data[tanggal_posting]</td>";

                             //tombol update
                             echo "<td><form method='POST' action='ubah.php'>
                             <input hidden type='text' name='id' value=$data[id_thread]>
                             <button type='submit' name='btnUpdate' class='btn btn-success'><i class='fa fa-wrench' aria-hidden='true'></i> Update</button></form></td>";

                             //tombol delete
                             echo "<td><form onsubmit=\"return confirm ('Anda Yakin Mau Menghapus Data?');\" method='POST'>";
                             echo "<input hidden type='text' name='id' value=$data[id_thread]>";
                             echo "<button type='submit' name='btnHapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i> Delete</button></form></td>";

                        echo "</tr>";
                    }
                    echo "</table>";
                ?>

                <?php
                    if (isset($_POST['btnHapus'])) {

                        // inisiasi variabel untuk menampung isian id
                        $id = $_POST['id'];

                        if ($conn) {
                            $sql = "DELETE FROM posting WHERE id_thread=$id";
                            mysqli_query($conn, $sql);
                            echo "<p class='alert alert-success text-center'><b>Data posting Berhasil Dihapus.</b></p>";
                        } else if ($conn-> connect_error) {
                            echo "<p class='alert alert-danger text-center'><b>Data Gagal Dihapus. Terjadi Kesalahan: ".$conn->connect_error."</b></p>";
                        }
                    }
                ?>
                </div>
                <div class="mx-auto">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <!-- Tombol sebelumnya -->
                            <?php 
                            if ($halaman <=1) {
                                echo "";
                            } else {
                            ?>

                            <li class="page-item"><a class="page-link" href="<?php echo "posting.php?halaman=1"; ?>">&lt;&lt;</a></li>
                            <li class="page-item"><a class="page-link" href="<?php echo "posting.php?halaman=$sebelum"; ?>">&lt;</a></li>

                            <?php } ?>

                            <!-- Nomor halaman -->
                            <?php 
                            for ($i = 1; $i<=$jlh_halaman; $i++) {
                                echo "<li class=page-item><a class=page-link href=posting.php?halaman=$i >$i</a></li>";
                            }
                            ?>
                            

                            <!-- Tombol selanjutnya -->
                            <?php 
                            if ($halaman >= $jlh_halaman) {
                                echo "";
                            } else {
                            ?>

                            <li class="page-item"><a class="page-link" href="<?php echo "posting.php?halaman=$sesudah"; ?>">&gt;</a></li>
                            <li class="page-item"><a class="page-link" href="<?php echo "posting.php?halaman=$hal_akhir"; ?>">&gt;&gt;</a></li>

                            <?php } ?>
                        </ul>
                    </nav>
            </div>
        </div>
    </div>
</div>

<?php
include ("layout/footer.php");
?>