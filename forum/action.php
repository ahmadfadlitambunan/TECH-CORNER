<?php include('layout/header.php'); ?>
<?php include('layout/navbar.php'); ?>


<div class="container mb-3 mt-3 align-self-center">
  <div class="card-fitur text-center">

    <?php
      $keywords = $_GET['keywords'];
      $query = "SELECT * FROM posting WHERE judul LIKE '%$keywords%' OR konten LIKE '%$keywords%'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0) {
        while ($rows = $result->fetch_assoc()) {
      ?>
    <div class="card media">
      <div class="card-body">
        <div class="media-body">
          <h4 class="media-heading">
            <a href="view.php?thread=<?php echo $rows['id_thread']; ?>"><?php echo $rows['judul']; ?></a>
          </h4>
        </div>
      </div>
    </div>

    <?php } 
      } else {  ?>
      <div class="container align-self-center">
        <div class="col-lg-6 col-sm-12 text-center">
          <h4>Data tidak ditemukan!</h4>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<?php include('layout/footer.php'); ?>