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
								<option selected value="all">-- Pilih Kategori --</option>
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
    <script src="https://cdn.tiny.cloud/1/ffkt0kthki1a1tyctuzcwuihr3s2n0x7swxyqyf330f2ovr7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
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


<?php include('layout/footer.php'); ?>
