<?php 
    include('layout/header.php');
    include('layout/navbar.php');

    if(!isset($_SESSION["login"])){
        echo("<script>location.href = '../auth/login.php?for=tulis';</script>");
    }


?>

<!-- Main Content -->
    <div class="container mb-3 mt-3 align-self-center">
        <div class="main-content">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tulis Thread</li>
                </ol>
            </nav>
            <form action="thread.php?aksi=buat" method="POST">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    	<div class="card-header">
                            <div class="d-flex align-items-center flex-shrink-0 me-3">
                                <div class="mx-3">
                                	<img width="50px" src="assets/img/icon.png" alt="">
                                </div>
                                <div class="d-flex flex-column fw-bold">
                                    <a class="text-dark mb-1" ><?=$_SESSION["username"]?></a>
                                    <div class="small text-muted"><?=$_SESSION["level"]?></div>
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
                                <label for="konten">Isi Thread</label>
                                <textarea class="form-control" name="konten" id="konten" required>Mulai menulis.!</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-md-4">
                    <div class="card">
                    	<div class="card-body">
                    		<label for="kategori">Pilih Kategori</label>
                        	<select class="custom-select" id="kategori" name="kategori">
								<option selected>-- Pilih Kategori --</option>
								<option value="komputer">Komputer & PC</option>
								<option value="laptop">Laptop / Notebook</option>
								<option value="gadget">Gadget</option>
							</select>
                            <button class="btn btn-success btn-block my-2" type="submit" name="posting">POST</button>		
	                    </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>
    <script src="assets\ckeditor5-build-classic\ckeditor.js"></script>
    <script src="assets\ckfinder\ckfinder.js"></script>

    <script>

    ClassicEditor
    .create( document.querySelector( '#konten' ), {
        ckfinder: {
            uploadUrl: 'http://localhost/techcorner/forum/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        },
        toolbar: {
        items: [
            'heading',
            '|',
            'alignment',                                               
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            'CKFinder',
            'uploadImage',
            'blockQuote',
            'undo',
            'redo'
        ]
    },
    } )
    .catch( error => {
        console.error( error );
    } );

    </script>


<?php include('layout/footer.php'); ?>
