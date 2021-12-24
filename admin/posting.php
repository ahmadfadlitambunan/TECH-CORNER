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
                    <form method="GET" onsubmit="return confirm ('Download Pdf Daftar Posting?')" action="pdf.php?pdf=2">

                            <button type='submit' name='btnpost'class='btn btn-outline-success'>Report</button>
                            </form>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <?php

                    //tampilkan data
                    $query = "SELECT * FROM posting"; 
                    $result= mysqli_query($conn, $query);
                    ?>
                    <div class="table-responsive">
                        <table class = 'table table-bordered' id="adminTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Thread Starter</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Posting</th>
                                    <th>Tanggal Ubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                    foreach ($result as $data) {
                    ?>
                               <tr>
                                    <td><?= $data['id_thread']; ?></td>

                                    <?php 
                                        $resUname = mysqli_query($conn, "SELECT username FROM users WHERE id_user = ".$data['user_id']." LIMIT 1;" );
                                        $dataUname = mysqli_fetch_assoc($resUname);
                                    ?>
                                    <td><?= $dataUname['username']; ?></t>


                                    <td><a href="../forum/view.php?thread=<?= $data['id_thread']; ?>"><?= $data['judul']; ?></a></td>
                                    <td><?= $data['kategori']; ?></td>
                                    <td><?= date('d M Y g:i a', strtotime($data['tanggal_posting'])); ?></td>
                                    <td><?= $data['diubah']; ?></td>

                                    <td >
                                        <div class="text-center">
                                        <form method="POST" onsubmit="return confirm ('Anda Yakin Mau Menghapus Data?')">
                                                <input hidden name='id' type='number' value=<?=$data['id_thread'] ?>>
                                                <button type='submit' name='btndel' class='btn btn-danger'><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                    <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    

                <?php
                    if (isset($_POST['btndel'])) {

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
        </div>
    </div>
</div>
    

<?php
include ("layout/footer.php");
?>