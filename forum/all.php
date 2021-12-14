<?php include('layout/header.php'); ?>
<?php include('layout/navbar.php'); ?>
<?php include('funct/function.php'); ?>
<?php
$list = query("SELECT * FROM posting ");

?>
<!-- Forum -->
<div class="forum">
    <div class="container align-self-center">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forum</li>
            </ol>
        </nav>

        <div class="d-flex flex-wrap justify-content-between">
            <div> <a href="buat.php"><button type="button" class="btn btn-shadow btn-wide btn-success"> <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span> Thread Baru </button></a> </div>
        </div>
        <div class="card mb-3 mt-3">
            <div class="card-header pl-0 pr-0">
                <div class="row no-gutters w-100 align-items-center">
                    <div class="col ml-3">Topik</div>
                    <div class="col-4 text-muted">
                        <div class="row no-gutters align-items-center">
                            <div class="col-4"></div>
                            <div class="col-8">Kategori</div>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($list as $data) : ?>

                <?php foreach ($res = users($data['user_id']) as $user) : ?>
                    <div class="card-body py-3">
                        <div class="row no-gutters align-items-center">
                            <div class="col"> <a href="view.php?thread=<?= $data['id_thread'] ?>" class="text-big" data-abc="true"><?= $data['judul'] ?></a>
                                <div class="text-muted small mt-1"> <?= $user['username'] ?>, <?= times(strtotime($data['tanggal_posting'])) ?> ·&nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true"></a></div>
                            </div>
                            <div class="d-none d-md-block col-4">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4"></div>
                                    <div class="media col-8 align-items-center">
                                        <p><?= $data['kategori'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0">
                <?php endforeach; ?>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>