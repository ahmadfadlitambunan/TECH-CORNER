<?php
require("../_config/connect.php");
require("funct/function.php");
session_start();

// cek ketersediaan kuki
    if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        $result_cookie = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$id' LIMIT 1;");
        $row = mysqli_fetch_assoc($result_cookie);

        // cek apakah kuki sesuai dengan sistem
        if($key === hash("sha256", $row['email'])){
            // set session
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row['id_user'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["level"] = $row['level'];
            $_SESSION["email"] = $row['email'];
        }
    }

if(isset($_GET['thread'])&& $_GET['thread'] !="")
{
    $id_thread=$_GET['thread'];
    $thread = query("SELECT * FROM posting WHERE id_thread='$id_thread'");
}


if(isset($_POST["post"])) {
    $user_id = $_SESSION["id"];
    $thread_id = $_GET["thread"];
    $parent = $_POST["parent"];
    $konten = $_POST["komentar"];

    $query = "INSERT INTO komentar (konten, id_user, thread_id, parent) VALUES (
        '$konten',
        '$user_id',
        '$thread_id',
        '$parent'
    )";

    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION["sukses"] = "Komentar berhasil ditambahkan";
    } else {
        echo mysqli_error($result);
    }

}

if(isset($_POST["balas"])) {
    $user_id = $_SESSION["id"];
    $thread_id = $_GET["thread"];
    $parent = $_POST["parent"];
    $konten = $_POST["komentar"];

    $query = "INSERT INTO komentar (konten, id_user, thread_id, parent) VALUES (
        '$konten',
        '$user_id',
        '$thread_id',
        '$parent'
    )";

    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION["sukses"] = "Komentar berhasil ditambahkan";
    } else {
        echo mysqli_error($result);
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECH CORNER  | Thread</title>
    <!-- Icon CDN untuk Modal dan Header -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/thread.css">
    <!-- Bar Icon -->
    <link rel="shortcut icon" href="asset/icon.png" type="image/x-icon">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- CDN Font Awesome -->
    <script src="https://use.fontawesome.com/57879be922.js"></script>   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<?php include('layout/navbar.php'); ?>

<?php if(isset($_SESSION["thread_message"])) : ?>
<div class="container align-self-center">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pesan :</strong> <?= $_SESSION["thread_message"]; ?> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php unset($_SESSION["thread_message"]); ?>
<?php endif; ?>

<!-- Main Content -->
<div class="container mb-3 mt-3 align-self-center">
    <div class="main-content">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="all.php">All</a></li>

              <?php foreach($thread as $data):?>
                <li class="breadcrumb-item"><a href="#"><?=$data['kategori']?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$data['judul']?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <?php
                                $uid = $data['user_id'];
                                $resu = mysqli_query($conn, "SELECT * FROM users WHERE id_user = $uid ");
                                $datu = mysqli_fetch_assoc($resu);
                            ?>
                            <div class="mx-3">
                                <img width="50px" src="assets/img/icon.png" alt="">
                            </div>
                            <div class="d-flex flex-column fw-bold">
                                <a class="text-dark mb-1"> <?php echo $datu['username']. " | " .date("d-M-Y g:i a", strtotime($data['tanggal_posting'])) ?> </a>
                                <div class="small text-muted"><b><?= $datu['level']; ?></b></div>
                            </div>
                            <?php if(isset($_SESSION["username"])) : ?>
                                <?php if($_SESSION["username"] == $datu['username']) : ?>
                            <div class="d-flex flex-column fw-bold ml-auto">
                                  <a href="#" class="text-success" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="buat.php?aksi=edit&id=<?= $data['id_thread']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a onclick="return confirm ('Anda Yakin Mau Menghapus Data?');" class="dropdown-item" href="thread.php?for=thread&aksi=hapus&id=<?= $data['id_thread']; ?>"><i class="fa fa-trash"></i> Hapus</a>
                                  </div>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        </div>
                        <hr>
                    <h1 class="card-title">
                        <b><?=$data['judul']?></b>
                    </h1>
                    <p>
                        <?=$data['konten']?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="col-6 col-md-4">
            <div class="card">
                <img src="https://i.pinimg.com/736x/41/81/0a/41810acd7e15633293a7c6c0309c11e5.jpg" class="card-img-top">
                <a class="btn btn-outline-success" href="buat.php" role="button">
                    <i>Tulis Thread</i>
                </a>
            </div>
        </div>
    </div>


    <!-- Komentar -->
    <div class="row mb-3 mt-3">
        <div class="col-md-8 bootstrap snippets">
            <?php if(isset($_SESSION["login"])) : ?>
                <div class="panel">
                    <div class="panel-body">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="mx-3">
                                <img width="50px" src="assets/img/icon.png" alt="">
                            </div>
                            <div class="d-flex flex-column fw-bold">
                                <a href="#" class="btn-link text-semibold media-heading box-inline"><?= $_SESSION["username"]; ?></a>
                                <div class="small text-muted"><?= $_SESSION['level']; ?></div>
                            </div>
                        </div>     
                        <br>
                        <div><p>Comments <i class="fa fa-comments-o"></i></p></div>
                        <!-- form komentar -->
                        <form method="POST" action="" id="form-komentar">
                            <input type="hidden" name="parent" value="0">
                            <textarea class="form-control" rows="2" name="komentar" id="komentar" placeholder="Bagaimana pendapatmu?"></textarea>
                            <div class="mar-top clearfix">
                                <button class="btn btn-sm btn-success pull-right" type="submit" name="post"><i class="fa fa-pencil fa-fw"></i>Post</button>
                                <a href="komentar.php?aksi=tambah&id_thread=<?= $_GET["thread"]; ?>&parent=0" class="btn btn-sm btn-outline-success pull-right mx-2"> Komentar lebih detail</a>
                            </form>
                                
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php 

            $thread_id = $_GET["thread"];
            $result1 = query("SELECT * FROM komentar WHERE thread_id = '$thread_id' AND parent = 0 ORDER BY created_at DESC;");

            foreach ($result1 as $komen) :
                ?>
                <div class="panel">
                    <div class="panel-body">
                        <!-- LOOPING KOMENTAR PARENT -->

                        <?php 
                        $id_user = $komen['id_user'];
                        $rows = query("SELECT * FROM users WHERE id_user = $id_user LIMIT 1");

                        foreach($rows as $row) :
                            ?>
                            <div class="media-block pad-all">
                                <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                                <div class="media-body">
                                    <div class="d-flex fw-bold mb-2">
                                        <div class="mr-auto">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline"><?= $row['username']; ?> | <?= date("d-M-Y g:i a", strtotime($komen['created_at'])); ?></a>
                                            <div class="small text-muted"><?= $row['level']; ?></div>
                                        </div>
                                        <?php if(isset($_SESSION["username"])) : ?>
                                            <?php if($_SESSION["username"] == $row['username']) : ?>
                                        <div class="ml-auto">
                                            <a href="#" class="text-success" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                            </a>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="komentar.php?aksi=edit&id_thread=<?= $_GET["thread"]; ?>&id_komentar=<?= $komen['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                                <a onclick="return confirm ('Anda Yakin Mau Menghapus Komentar?');" class="dropdown-item" href="thread.php?for=komen&aksi=hapus&id_komentar=<?= $komen['id']; ?>&id_thread=<?= $id_thread; ?>"><i class="fa fa-trash"></i> Hapus</a>
                                              </div>
                                        </div> 
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    

                                <?php endforeach; ?>
                                <div>
                                    <?= $komen['konten']; ?>
                                </div>
                                <div class="pad-ver">
                                    <div class="btn-group">
                                        <a class="btn" href=""><i class="fa fa-thumbs-up"></i></a>
                                        <a class="btn" href=""><i class="fa fa-thumbs-down"></i></a>
                                    </div>
                                    <a href="../auth/login.php?for=komen" class="btn btn-outline-success btn-sm"><i class="fa fa-share"></i>Balas</a>
                                </div>
                                <hr>
                                <?php if(isset($_SESSION["login"])) : ?>
                                    <!-- form balas -->
                                    <form method="POST" action="" id="form-balas">
                                        <input type="hidden" name="parent" value="<?= $komen['id']; ?>">
                                        <textarea class="form-control" rows="2" name="komentar" id="balas" placeholder="Balas komentar"></textarea>
                                        <div class="mar-top clearfix">
                                            <button class="btn btn-sm btn-success pull-right" type="submit" name="balas"><i class="fa fa-pencil fa-fw"></i>balas</button>
                                        </div>
                                    </form>
                                <?php endif; ?>


                                <?php 
                                $thread_id = $_GET["thread"];
                                $parent = $komen['id'];
                                $query2 = "SELECT * FROM komentar WHERE thread_id = '$thread_id' AND parent = $parent ORDER BY created_at DESC;";
                                $result2 = mysqli_query($conn, $query2);
                                ?>
                                <div class="mb-3" id="toggle-balasan">
                                    <span><?= mysqli_num_rows($result2); ?> Balasan</span> <i class="fa fa-angle-down"></i>
                                </div>


                                <?php foreach ($result2 as $balas) : ?>

                                    <!-- Balasan Komentar Parents (child) -->
                                    <?php
                                    $id_user = $balas['id_user'];
                                    $users = query("SELECT * FROM users WHERE id_user = $id_user");

                                    foreach($users as $user) :
                                        ?>
                                        <div class="media-block pad-all">
                                            <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar2.png"></a>
                                            <div class="media-body">
                                                <div class="d-flex fw-bold mb-2">
                                                    <div class="mr-auto">
                                                        <a href="#" class="btn-link text-semibold media-heading box-inline"><?= $user['username']; ?> | <?= date("d-M-Y g:i a", strtotime($komen['created_at'])); ?></a>
                                                        <div class="small text-muted"><?= $user['level']; ?></div>
                                                    </div>
                                                <?php if(isset($_SESSION["username"])) : ?>
                                                    <?php if($_SESSION["username"] == $user['username']) : ?>
                                                    <div class="ml-auto">
                                                        <a href="#" class="text-success" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="komentar.php?aksi=edit&id_thread=<?= $_GET["thread"]; ?>&id_komentar=<?= $balas['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                                        <a onclick="return confirm ('Anda Yakin Mau Menghapus Komentar?');" class="dropdown-item" href="thread.php?for=komen&aksi=hapus&id_komentar=<?= $balas['id']; ?>&id_thread=<?= $id_thread; ?>"><i class="fa fa-trash"></i> Hapus</a>
                                                      </div>
                                                    </div> 
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>

                                            <div>
                                                <?= $balas['konten']; ?>
                                            </div>
                                            
                                            <div class="pad-ver">
                                                <div class="btn-group">
                                                    <a class="btn" href=""><i class="fa fa-thumbs-up"></i></a>
                                                    <a class="btn" href=""><i class="fa fa-thumbs-down"></i></a>
                                                </div>
                                                <a href="../auth/login.php?for=komen" class="btn btn-outline-success btn-sm"><i class="fa fa-share"></i>Balas</a>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                <?php endforeach; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div> 
    <div>
        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/ffkt0kthki1a1tyctuzcwuihr3s2n0x7swxyqyf330f2ovr7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({        
        selector: 'textarea',        
        height: 175, 
        document_base_url: 'localhost/techcorner/forum/upload',
        file_browser_callback_types: 'file image media',
        file_picker_types: 'file image media',        
        forced_root_block : "",        
        force_br_newlines : true,        
        force_p_newlines : false,
        plugins: ['autolink lists link image charmap print preview hr anchor pagebreak','searchreplace wordcount visualblocks visualchars code fullscreen','insertdatetime media nonbreaking save table contextmenu directionality','emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'],
        toolbar1: 
        'bold italic underline |emoticons| link image ',
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