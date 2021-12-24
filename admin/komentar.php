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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Komentar</h6>
                    <form method="GET" onsubmit="return confirm ('Download Pdf Daftar Posting?')" action="pdf.php">

                            <button type='submit' name='btnkom'class='btn btn-outline-success'>Report</button>
                            </form>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <?php
                    //tampilkan data
                    $query = "SELECT * FROM komentar";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <div class="table-responsive">
                        <table id="adminTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Username</th>
                                    <th>Thread</th>
                                    <th>Id Parent Komentar</th>
                                    <th>Tanggal Komentar</th>
                                    <th>Diubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $data) : ?>
                                    <tr>
                                        <td><?= $data['id']; ?></td>

                                        <?php
                                        $resUname = mysqli_query($conn, "SELECT username FROM users WHERE id_user = " . $data['id_user'] . " LIMIT 1;");
                                        $dataUname = mysqli_fetch_assoc($resUname);
                                        ?>
                                        <td><?= $dataUname['username']; ?></td>

                                        <?php
                                        $resThread = mysqli_query($conn, "SELECT judul FROM posting WHERE id_thread = " . $data['thread_id'] . " LIMIT 1;");
                                        $dataThread = mysqli_fetch_assoc($resThread);
                                        ?>

                                        <?php if (isset($dataThread['judul'])) { ?>
                                            <td><a href="../forum/view.php?thread=<?= $data['thread_id']; ?>"><?= $dataThread['judul']; ?></a></td>
                                        <?php } else { ?>
                                            <td class="text-danger">Postingan Telah Dihapus</td>
                                        <?php } ?>

                                        <td><?= $data['parent']; ?></td>
                                        <td><?= date('d M Y g:i a', strtotime($data['created_at'])); ?></td>
                                        <td><?= $data['diubah']; ?></td>
                                        <td>
                                            <div class="text-center">
                                                <form method="POST" onsubmit="return confirm ('Anda Yakin Mau Menghapus Data?')">
                                                    <input hidden name='id' type='number' value=<?= $data['id'] ?>>
                                                    <button type='submit' name='btndel' class='btn btn-danger'><i class="fa fa-trash"></i></button>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    if (isset($_POST['btndel'])) {

                        // inisiasi variabel untuk menampung isian id
                        $id = $_POST['id'];

                        if ($conn) {
                            $sql = "DELETE FROM komentar WHERE id=$id";
                            mysqli_query($conn, $sql);
                            echo "<p class='alert alert-success text-center'><b>Data komentar Berhasil Dihapus.</b></p>";
                        } else if ($conn->connect_error) {
                            echo "<p class='alert alert-danger text-center'><b>Data Gagal Dihapus. Terjadi Kesalahan: " . $conn->connect_error . "</b></p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("layout/footer.php");
    ?>