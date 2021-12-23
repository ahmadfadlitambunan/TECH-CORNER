<?php include('layout/header.php'); ?>
<?php include('layout/navbar.php'); ?>
<?php include('funct/function.php'); ?>
<?php


$jumlah_data_perhalaman = 4;


//cari jumlah data ada brp
$jumlahData = count(query("SELECT * FROM posting "));
$jumlahpage = ceil($jumlahData / $jumlah_data_perhalaman);



$activepage = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awal = ($jumlah_data_perhalaman * $activepage) - $jumlah_data_perhalaman;

$list = query("SELECT * FROM posting ORDER BY tanggal_posting DESC LIMIT $awal,$jumlah_data_perhalaman ")
?>

<?php if(isset($_SESSION["thread_message"])) : ?>
<div class="container align-self-center">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pesan :</strong> <?= $_SESSION["thread_message"]; ?> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php unset($_SESSION["thread_message"]); ?>
<?php endif; ?>

<!-- Main Content -->
<div class="container align-self-center">
    <div class="main-content">
        <!-- Banner -->
        <div class="banner p-5">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <center>
                            <img width="400px" src="assets/img/pict5.png">
                            <div class="d-none d-md-block">
                                <h1>Tech Corner</h1>
                                <p>Tech Corner adalah ruang untukmu yang ingin menjelajahi dunia teknologi.
                                    <br>Di sini akan ada teman untuk saling belajar dan berbagi pengetahuan bersama.
                                </p>
                            </div>
                            </center>
                        </div>
                        <div class="carousel-item">
                            <center>
                            <img width="400px" src="assets/img/pict4.png">
                            <div class="d-none d-md-block">
                                <h1>Forum di Tech Corner</h1>
                                <p>Kamu bisa berdiskusi dengan banyak teman di Forum Tech Corner.
                                    <br>Ada 3 kategori yang akan dibahas, yaitu komputer & PC, laptop/notebook, dan gadget.
                                </p>
                            </div>
                            </center>
                        </div>
                        <div class="carousel-item">
                            <center>
                            <img width="400px" src="assets/img/pict3.png">
                            <div class="d-none d-md-block">
                                <h1>Tulis Thread di Tech Corner</h1>
                                <p>Bagikan pengetahuanmu tentang komputer & PC, laptop/notebook, ataupun gadget di sini.
                                    <br>Tulis dan lihat respon dari yang lain. Kamu juga bisa membalas komentar!
                                </p>
                            </div>
                            </center>
                        </div>
                    </div>
                    <br>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card -->
<div class="container mb-3 mt-3 align-self-center">
    <div class="card-fitur text-center">
        <div class="row">
            <div class="col-6 col-md-4 mb-3">
                <h2><i class="fa fa-comments-o" aria-hidden="true"></i>Obrolan Hangat</h2>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#">Canon launches photo centric 00214 Model supper shutter camera</a></li>
                        <li class="list-group-item"><a href="#">Canon launches photo centric 00214 Model supper shutter camera</a></li>
                        <li class="list-group-item"><a href="#">Canon launches photo centric 00214 Model supper shutter camera</a></li>
                        <li class="list-group-item"><a href="#">Canon launches photo centric 00214 Model supper shutter camera</a></li>
                        <li class="list-group-item"><a href="#">Canon launches photo centric 00214 Model supper shutter camera</a></li>
                    </ul>
                </div>
            </div>

            <!-- Thread -->
            <div class="col-md-8">
                <h2><i class="fa fa-fire" aria-hidden="true"></i>Hot Thread</h2>
                <?php foreach ($list as $data) : ?>
                    <?php foreach ($res = users($data['user_id']) as $user) : ?>
                        <div class="widget">
                            <div class="card media d-flex justify-content-center align-items-center">
                                <div class="card-body d-flex justify-content-center align-items-center  ">
                                    <div class="media-body ">
                                        <h4 class="media-heading justify-content-center">
                                            <a href="view.php?thread=<?= $data['id_thread'] ?>" target="_self"><b><?= $data['judul'] ?></b></a>
                                        </h4><span class="media-date"><a><?= times(strtotime($data['tanggal_posting'])) ?></a>, by: <a><?= $user['username'] ?></a></span>
                                        <br><a href="view.php?thread=<?= $data['id_thread'] ?>"><img class="media-object" src="assets/img/pict1.png" width="300px" alt=""></a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>

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

        </div>
    </div>
</div>
</div>

<?php include('layout/footer.php'); ?>