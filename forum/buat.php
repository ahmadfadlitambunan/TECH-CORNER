<?php 
    include('layout/header.php');
    include('layout/navbar.php');

    if(!isset($_SESSION["login"])){
        echo("<script>location.href = '../auth/login.php?for=tulis';</script>");
    }

    $judul = null;
    $konten = null;
    $kategori = null;


    if(isset($_GET["aksi"]) && isset($_GET["id"])) {
        if ($_GET['aksi'] == 'edit') {
            $id = $_GET['id'];
            $id_user = $_SESSION["id"];
            $check_id_user = $conn->query("SELECT user_id From posting WHERE id_thread = $id");

            $check_data = mysqli_fetch_assoc($check_id_user);

            if($check_data['user_id'] === $id_user){
                $data = $conn->query("SELECT * FROM posting WHERE id_thread = '$id' AND user_id = '$id_user' ");
                while ($list = $data->fetch_array(MYSQLI_ASSOC)) :
                    $judul = $list['judul'];
                    $konten = $list['konten'];
                    $kategori = $list['kategori'];
                    $thumb = $list['thumb'];
                endwhile;
            } else {
                echo("<script>location.href = 'view.php?thread=".$id."';</script>");
                exit;
            }
        }
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

            <?php if(isset($_GET["aksi"])) { ?>
            <?php if($_GET["aksi"] == 'edit') :?>
            <form action="thread.php?for=thread&aksi=edit&id=<?= $id; ?>" method="POST" novalidate class="needs-validation" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $thumb; ?>">
            <?php endif;?>
            <?php } else { ?>
            <form action="thread.php?for=thread&aksi=buat" method="POST" novalidate class="needs-validation" enctype="multipart/form-data">
            <?php } ?>

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
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Tulis judul.!" value="<?= $judul; ?>" required>
                                <div class="invalid-feedback">
                                    Judul belum diisi!
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                
                                <?php if(isset($_GET["aksi"]) && $_GET["aksi"] == "edit") :?>
                                    <div>
                                        <p>Tumbhnail</p>
                                        <img src="assets/thumbnail/<?= $thumb; ?>" width="400px">
                                    </div>
                                <?php endif; ?>
                                <label for="thumb">Ubah thumbnail</label>
                                <input type="file" class="form-control-file" name="gambar" id="thumb" placeholder="Upload thumbnail anda!">
                                <div class="invalid-feedback">
                                    Thumbnail belum diupload!
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="konten">Isi Thread</label>
                                <textarea class="form-control" name="konten" id="konten" placeholder="mulai menulis!" required><?= $konten; ?></textarea>
                                <div class="invalid-feedback">
                                    Konten belum diisi!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-md-4">
                    <div class="card">
                    	<div class="card-body">
                    		<label for="kategori">Pilih Kategori</label>
                        	<select class="custom-select" id="kategori" name="kategori">
                                <?php if(isset($kategori)) { ?>
								<option selected value="<?= $kategori; ?>"><?= $kategori; ?></option>
                                <?php } else { ?>
                                <option selected value="Tidak Berkategori">--- Pilih Kategori ---</option>
                                <?php } ?>
								<option value="Komputer & PC">Komputer & PC</option>
								<option value="Laptop / Notebook">Laptop / Notebook</option>
								<option value="Gadget">Gadget</option>
							</select>
                            <button class="btn btn-success btn-block mt-2" type="submit">POST</button>		
	                    </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/ffkt0kthki1a1tyctuzcwuihr3s2n0x7swxyqyf330f2ovr7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    var forms = document.getElementsByClassName('needs-validation');
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

            tinymce.init({        
                selector: '#konten',        
                height: 400, 
                document_base_url: 'localhost/techcorner/forum/upload',
                file_browser_callback_types: 'file image media',
                file_picker_types: 'file image media',        
                forced_root_block : "",        
                force_br_newlines : true,        
                force_p_newlines : false,
                plugins: ['autolink lists link image charmap print preview hr anchor pagebreak','searchreplace wordcount visualblocks visualchars code fullscreen','insertdatetime media nonbreaking save table contextmenu directionality','emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'],
                toolbar1: 
                'undo redo | insert | styleselect table | bold italic | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media ',        
                toolbar2: 'print preview | forecolor backcolor emoticons | fontselect | fontsizeselect | codesample code fullscreen',
                templates: [          
                { title: 'Test template 1', content: '' },          
                { title: 'Test template 2', content: '' }        
                ],   

                images_upload_handler: function (blobInfo, success, failure) {
                    var xhr, formData;

                    xhr = new XMLHttpRequest();            
                    xhr.withCredentials = false;            
                    xhr.open('POST', 'upload.php');
                    xhr.onload = function() {              
                        var json;              

                        if (xhr.status != 200) {                
                            failure('HTTP Error: ' + xhr.status);                
                            return;              
                        }              

                        console.log(xhr.response);
                        success(xhr.response);            
                    };
                    formData = new FormData();            
                    formData.append('file', blobInfo.blob(), blobInfo.filename()); 
                    xhr.send(formData);       
                }      

            });
        </script>
    </body>


<?php include('layout/footer.php'); ?>
