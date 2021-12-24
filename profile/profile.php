<?php 
	include("layout/header.php");
	include("layout/navbar.php");

	if(isset($_GET["id"])){
		// cek apakah id get dengan sesi sama
		if($_GET["id"] == $_SESSION["id"]){
			$id_user = $_GET["id"];

			// ambil data berdasarkan id
			$query = "SELECT * FROM users WHERE id_user = '$id_user' LIMIT 1;";
			$result = mysqli_query($conn, $query);
			if ($result) {
				// fetch data
				foreach($result as $row) :
					$name = $row['name'];
					$username = $row['username'];
					$email = $row['email'];
					$level = $row['level'];
					$foto = $row['foto'];
				endforeach;
			} else {
				echo mysqli_error($conn);
				exit;
			}
		} else {
			echo("<script>location.href = '../forum/index.php';</script>");
			exit;
		}
	} else {
		echo("<script>location.href = '../forum/index.php';</script>");
		exit;
	}


?>

<div class="container align-self-center">
    <div class="main-content">

    	<!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb forum">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="all.php">All</a></li>

              
                <li class="breadcrumb-item"><a href="#">fsafdas</a></li>
                <li class="breadcrumb-item active" aria-current="page">fasfas</li>
            </ol>
        </nav>

    	<div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                    	<div class="text-center">
                        <!-- Profile picture image-->
	                        <img class="rounded-circle mb-2" width="150px" src="assets/img/<?= $foto; ?>" alt="">
	                        <div class="profile-label">
		                        <h4><?= $name; ?></h4>
		                        <h6><?= $username; ?></h6>
	                        	<span class="badge badge-danger badge-pill"><?= $level ?></span>
	                        </div>
	                    </div>
                        <hr>
                        <div class="text-muted small forum">
                        	<ul style="list-style: none;">
	                        	<li><a href="update-profile.php?id=<?= $id_user; ?>" class="text-big">Edit Profil<span><i class="fa fa-cog mx-2"></i></span></a></li>
	                        	<li><a href="ubah-password.php?id=<?= $id_user; ?>" class="text-big">Ubah Password<span><i class="fa fa-lock mx-2"></i></span></a></li>
                        	</ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (Email) -->
                            <div class="form-group">
                                <label class="small mb-1" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control-plaintext" readonly value="<?= $email; ?>">
                            </div>
                            <!-- Form Group (username)-->
                            <div class="form-group mb-3">
                                <label class="small mb-1" for="uname">Username (Nama yang akan tampil di website forum)</label>
                                <input class="form-control-plaintext" id="uname" type="text" placeholder="Enter your username" name="username" value="<?= $username; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Nama Lengkap</label>
                                <input class="form-control-plaintext" id="name" type="text" placeholder="Enter your username" name="name" value="<?= $name; ?>" readonly>
                            </div>
                            <div class="mt-3">
                                <a href="update-profile.php?id=<?= $id_user; ?>" class="btn btn-success">Edit Profile</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>