<?php include('layout/header.php'); ?>
<?php include('../funct/function.php'); ?>
<?php

//pagination
$jumlah_data_perhalaman = 2;


//cari jumlah data ada brp
$jumlahData = count(query("SELECT * FROM posting WHERE kategori ='komputer'"));
$jumlahpage = ceil($jumlahData / $jumlah_data_perhalaman);



$activepage = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awal = ($jumlah_data_perhalaman * $activepage) - $jumlah_data_perhalaman;

$list = query("SELECT * FROM posting WHERE kategori='komputer' ORDER BY tanggal_posting DESC LIMIT $awal,$jumlah_data_perhalaman")

?>


<!-- Card -->
<div class="container mb-3 mt-3 align-self-center">
    <div class="card-fitur text-center">
        <div class="row">
            <div class="col-6 col-md-4">
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
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="../view.php?thread=<?= $data['id_thread'] ?>" target="_self"><b><?= $data['judul'] ?></b></a>
                                        </h4><span class="media-date"><a><?= times(strtotime($data['tanggal_posting'])) ?></a>, by: <a><?= $user['username'] ?></a></span>
                                        <br><a href="../view.php?thread=<?= $data['id_thread'] ?>"><img class="media-object" src="../assets/img/pict1.png" width="300px" alt=""></a>
                                        <div class="widget_article_social">
                                            <!-- <span>
                                            <a href="#" target="_self"> <i class="fa fa-share-alt"></i>424</a> Shares &nbsp; &nbsp; &nbsp;
                                        </span> 
                                        <span>
                                            <a href="#" target="_self"><i class="fa fa-comments-o"></i>4</a> Comments
                                        </span> -->
                                        </div>
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
                                <a class="page-link" href="komputer.php?halaman=<?= $activepage - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            <?php endif; ?>
                        </li>
                        <?php for ($i = 1; $i <= $jumlahpage; $i++) : ?>
                            <?php if ($i === $activepage) : ?>
                                <li class="page-item  "><a class="page-link" href="komputer.php?halaman=<?= $i ?>"><?= $i ?></a></li>
                            <?php else : ?>
                                <li class="page-item "><a class="page-link" href="komputer.php?halaman=<?= $i ?>"><?= $i ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <li class="page-item">
                            <?php if ($activepage < $jumlahpage) : ?>
                                <a class="page-link" href="komputer.php?halaman=<?= $activepage + 1 ?>" aria-label="Next">
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

<?php include("layout/footer.php"); ?>