<?php include('layout/header.php'); ?>
<?php include('layout/navbar.php'); ?>
<?php include('config.php'); ?>

<div class="container mb-3 mt-3 align-self-center">
  <div class="card-fitur text-center">

    <?php
      $search = $_GET['search'];
      $query = "SELECT * FROM posting WHERE judul LIKE '%$search' OR konten LIKE '%$search'";
      $db = new Database();
      $post = $db->select($query);
      if($post) {
        while ($result = $post->fetch_assoc()) {
    ?>

    <div class="card media">
      <div class="card-body">
        <div class="media-body">
          <h4 class="media-heading">
            <a href="post.php?id_thread=<?php echo $result['id_thread']; ?>"><?php echo $result['judul']; ?></a>
          </h4>
          <?php echo $result['konten']; ?>
        </div>
      </div>
    </div>

    <?php } } else {  ?>
      <div class="container align-self-center">
        <div class="col-lg-6 col-sm-12 text-center">
          <h4>Data tidak ditemukan!</h4>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<?php include('layout/footer.php'); ?>