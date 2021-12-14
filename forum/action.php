<?php include('layout/header.php'); ?>
<?php include('layout/navbar.php'); ?>
<<<<<<< HEAD

=======
>>>>>>> 1ae7d0b720a65c24644f4e3c54a2111e3b86e217

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

      <div class="card-body py-3">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <h6 class="media-heading">
              <a href="view.php?thread=<?php echo $rows['id_thread']; ?>"><?php echo $rows['judul']; ?></a>
            </h6>
            <div class="text-muted small mt-1"><?php echo $rows['konten']; ?></div>
          </div>
        </div>
      </div>
      <hr class="m-0">

      <?php } 
      } else {  ?>
        <div class="card-body py-3">
          <div class="row no-gutters align-items-center">
            <div class="col">
              <h6 class="media-heading">Topik yang Anda cari tidak tersedia!</h6>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>

<?php include('layout/footer.php'); ?>