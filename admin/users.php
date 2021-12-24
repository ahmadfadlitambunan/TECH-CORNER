<?php
include("layout/header.php");
include("../_config/connect.php");
include("../forum/funct/function.php");
?>
<?php


if (isset($_POST['btndel'])) {
    $userid = $_POST['id'];
    if ($conn) {
        $sql = "DELETE FROM users WHERE id_user ='$userid'";
        $check = mysqli_query($conn, $sql);
    }
?>

    <div class="container align-self-center">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Pesan : User berhasil di Hapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php }; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
                    <div>
                        <form method="POST" onsubmit="return confirm ('Download Pdf Daftar User?')" action="pdf.php">

                            <button type='submit' name='btndel' class='btn btn-outline-success'>Report</button>
                            </form>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    //tampilkan data
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <div class="table-responsive">
                        <table class='table table-bordered' id="adminTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Status Verifikasi</th>
                                    <th>Tanggal Buat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $data) : ?>
                                    <tr>
                                        <td><?= $data['id_user']; ?></td>
                                        <td><?= $data['username']; ?></td>
                                        <td><?= $data['email']; ?></td>
                                        <td><?= $data['name']; ?></td>
                                        <td>
                                            <?php
                                            switch ($data['level']) {
                                                case 'admin':
                                                    $badge = 'danger';
                                                    break;
                                                case 'moderator':
                                                    $badge = 'warning';
                                                    break;

                                                default:
                                                    $badge = 'success';
                                                    break;
                                            }
                                            ?>
                                            <div class="badge bg-<?= $badge; ?> text-white rounded-pill">
                                                <?= $data['level']; ?>
                                            </div>
                                        </td>
                                        <td><?= $data['verified']; ?></td>
                                        <td><?= date('d M Y g:i a', strtotime($data['created_at'])); ?></td>
                                        <td>
                                            <div class="text-center">
                                                <!-- tombol delete -->
                                                <form method="POST" onsubmit="return confirm ('Anda Yakin Mau Menghapus Data?')">
                                                    <!-- tombol update -->
                                                    <a href="edituser.php?id=<?= $data['id_user'] ?>" class="btn btn-success btn-sm ml-1"><i class="fa fa-edit"></i></a>
                                                    <input hidden name='id' type='number' value=<?= $data['id_user'] ?>>
                                                    <button type='submit' name='btndel' class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("layout/footer.php");
?>