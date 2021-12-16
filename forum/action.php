<?php include('layout/header.php'); ?>
<link rel="stylesheet" href="assets/css/forum.css">
<?php include('layout/navbar.php'); ?>
<?php include('funct/function.php'); ?>
<?php $list = query("SELECT * FROM posting"); ?>

<div class="forum">
  <div class="container align-self-center">
    <div class="card mb-3 mt-3">
      <div class="card-header pl-0 pr-0">
        <div class="row no-gutters w-100 align-items-center">
          <div class="col ml-3">Topik</div>
        </div>
      </div>

      <?php
        $keywords = $_GET['keywords'];
        $query = "SELECT * FROM posting WHERE judul LIKE '%$keywords%' OR konten LIKE '%$keywords%'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
          while ($rows = $result->fetch_assoc()) {
      ?>

      <?php foreach ($res = users($rows['user_id']) as $user) : ?>
        <div class="card-body py-3">
            <div class="row no-gutters align-items-center">
                <div class="col"> <a href="view.php?thread=<?= $rows['id_thread']; ?>" class="text-big" data-abc="true"><?= $rows['judul']; ?></a>
                    <div class="text-muted small mt-1"> <?= $user['username'] ?>, <?= times(strtotime($rows['tanggal_posting'])) ?> ·&nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true"></a></div>
                </div>
            </div>
        </div>
        <hr class="m-0">
      <?php endforeach; ?>


      <?php } 
      } else {  ?>
        <div class="card-body py-3">
          <div class="row no-gutters align-items-center">
            <div class="col">
              <h6 class="media-heading">
                <a href="index.php">Topik yang Anda cari tidak tersedia!</a>
              </h6>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>

<?php include('layout/footer.php'); ?>