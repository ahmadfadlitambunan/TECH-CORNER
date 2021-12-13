<?php include('layout/header.php'); ?>
<?php include('layout/navbar.php'); ?>

<!-- Main Content -->
    <div class="container mb-3 mt-3 align-self-center">
        <div class="main-content">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tulis Thread</li>
                </ol>
            </nav>
            <form action="" method="">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    	<div class="card-header">
                            <div class="d-flex align-items-center flex-shrink-0 me-3">
                                <div class="mx-3">
                                	<img width="50px" src="assets/img/icon.png" alt="">
                                </div>
                                <div class="d-flex flex-column fw-bold">
                                    <a class="text-dark mb-1" href="#!">Sid Rooney</a>
                                    <div class="small text-muted">Position</div>
                                </div>
                            </div>            
                    	</div>
                        <div class="card-body">
							<div class="form-group">
								<label for="judul">Judul Thread</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Tulis judul.!" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="thread">Isi Thread</label>
                                <textarea class="form-control" id="konten" name="konten" required>Mulai menulis.!</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-md-4">
                    <div class="card">
                    	<div class="card-body">
                    		<label for="kategori">Pilih Kategori</label>
                        	<select class="custom-select" id="kategori">
								<option selected>-- Pilih Kategori --</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
                            <button class="btn btn-success btn-block my-2" type="submit" name="post">POST</button>		
	                    </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>
    <script>
    	CKEDITOR.replace( 'konten' );
    </script>


<?php include('layout/footer.php'); ?>