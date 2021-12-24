<?php 
include('layout/header.php');
include('layout/navbar.php');
require("funct/function.php");


    if(!isset($_SESSION["login"])){
        echo("<script>location.href = '../auth/login.php?for=tulis';</script>");
    }

    if(isset($_GET['id_thread'])&& $_GET['id_thread'] !="") {
        $id_thread = $_GET["id_thread"];
        $thread_res = mysqli_query($conn, "SELECT * FROM posting WHERE id_thread = '$id_thread';");
        $thread = mysqli_fetch_assoc($thread_res);
    }

    $komentar = null;

    if(isset($_GET["aksi"]) && isset($_GET["id_komentar"])) {
        if ($_GET['aksi'] == 'edit') {
            $id_komentar = $_GET["id_komentar"];
            $id_user = $_SESSION["id"];
            $check_id_user = $conn->query("SELECT id_user FROM komentar WHERE id = '$id_komentar'");

            $check_data = mysqli_fetch_assoc($check_id_user);

            if($check_data['id_user'] === $id_user){
                $data = $conn->query("SELECT * FROM komentar WHERE id = '$id_komentar' AND id_user = '$id_user' ");
                while ($list = $data->fetch_array(MYSQLI_ASSOC)) :
                    $komentar = $list['konten'];
                endwhile;
            } else {
                echo("<script>location.href = 'view.php?thread=".$id_thread."';</script>");
                exit;
            }
        }
    }


?>
<!-- Main Content -->
    <div class="container mb-3 mt-3 align-self-center">
        <div class="main-content">
            <div class="row">
                <div class="col-md-8">
                    <div class="my-3">
                        <h4><b>Komentar Thread</b></h4>
                        <a href="view.php?thread=<?= $thread['id_thread']; ?>" class="text-primary"><?= $thread['judul']; ?></a>
                    </div>

                    <?php if($_GET["aksi"] == 'edit') {?>
                    <form class="needs-validation" novalidate action="thread.php?for=komen&aksi=edit&id_komentar=<?= $id_komentar; ?>" method="POST">
                    <?php } else { ?>
                    <form class="needs-validation" novalidate action="thread.php?for=komen&aksi=tambah" method="POST">
                        <input type="hidden" name="parent" value="<?= $_GET["parent"]; ?>">
                    <?php } ?>
                        <input type="hidden" name="id_thread" value="<?= $id_thread; ?>">

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="komentar"><h5><b>Detail Komentar</b></h5></label>
                                    <textarea name="komentar" id="komentar" class="form-control" placeholder="Tulis komentar anda" required><?= $komentar; ?></textarea>
                                    <div class="invalid-feedback">
                                        Komentar belum diisi!!
                                    </div>
                                </div>

                            </div>
                            <div class="text-left mb-4 mx-3">
                                <a href="view.php?thread=<?= $_GET["id_thread"]; ?>" class="btn btn-outline-success mx-2">Cancel</a>
                                <button class="btn btn-success" type="submit">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                selector: '#komentar',        
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

<?php include('layout/footer.php') ?>