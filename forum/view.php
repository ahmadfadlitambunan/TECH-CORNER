<?php
require("../_config/connect.php");
require("funct/function.php");
if(isset($_GET['thread'])&& $_GET['thread'] !="")
{
    $id_thread=$_GET['thread'];
}
$thread=query("SELECT * FROM posting WHERE id_thread='$id_thread'");
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
                            <h5 class="card-title">
                            <?=$data['judul']?>
                            </h5>
                            <img src="assets/img/pict1.png" width="200px" class="card-img-top">
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
            <div class="panel">
            <div class="panel-body">
                <textarea class="form-control" rows="2" placeholder="Bagaimana pendapatmu?"></textarea>
                <div class="mar-top clearfix">
                <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i>Share</button>
                <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a>
                </div>
            </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                <!-- Newsfeed Content -->
                <!--===================================================-->
                <div class="media-block">
                <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                <div class="media-body">
                    <div class="mar-btm">
                    <a href="#" class="btn-link text-semibold media-heading box-inline">Lisa D.</a>
                    </div>
                    <br>
                    <p>consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <div class="pad-ver">
                    <div class="btn-group">
                        <a class="btn" href="#"><i class="fa fa-thumbs-up"></i></a>
                        <a class="btn" href="#"><i class="fa fa-thumbs-down"></i></a>
                    </div>
                    <a class="btn" href="#">Komentar</a>
                    </div>
                    <hr>

                    <!-- Comments -->
                    <div>
                    <div class="media-block">
                        <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar2.png"></a>
                        <div class="media-body">
                        <div class="mar-btm">
                            <a href="#" class="btn-link text-semibold media-heading box-inline">Bobby Marz</a>
                        </div>
                        <br>
                        <p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                        <div class="pad-ver">
                            <div class="btn-group">
                                <a class="btn" href="#"><i class="fa fa-thumbs-up"></i></a>
                                <a class="btn" href="#"><i class="fa fa-thumbs-down"></i></a>
                            </div>
                            <a class="btn" href="#">Komentar</a>
                        </div>
                        <hr>
                        </div>
                    </div>

                    <div class="media-block">
                        <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png">
                        </a>
                        <div class="media-body">
                        <div class="mar-btm">
                            <a href="#" class="btn-link text-semibold media-heading box-inline">Lucy Moon</a>
                        </div>
                        <br>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate ?</p>
                        <div class="pad-ver">
                            <div class="btn-group">
                                <a class="btn" href="#"><i class="fa fa-thumbs-up"></i></a>
                                <a class="btn" href="#"><i class="fa fa-thumbs-down"></i></a>
                            </div>
                                <a class="btn" href="#">Komentar</a>
                        </div>
                        <hr>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!--===================================================-->
                <!-- End Newsfeed Content -->


                <!-- Newsfeed Content -->
                <!--===================================================-->
                <div class="media-block pad-all">
                <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                <div class="media-body">
                    <div class="mar-btm">
                    <a href="#" class="btn-link text-semibold media-heading box-inline">John Doe</a>
                    </div>
                    <br>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <img class="img-responsive thumbnail" src="https://via.placeholder.com/400x300" alt="Image">
                    <div class="pad-ver">
                        <div class="btn-group">
                            <a class="btn" href="#"><i class="fa fa-thumbs-up"></i></a>
                            <a class="btn" href="#"><i class="fa fa-thumbs-down"></i></a>
                        </div>
                        <a class="btn" href="#">Komentar</a>
                    </div>
                    <hr>

                    <!-- Comments -->
                    <div>
                    <div class="media-block pad-all">
                        <a class="media-left" href="#"><img class="img-circle img-sm mr-3" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar2.png"></a>
                        <div class="media-body">
                        <div class="mar-btm">
                            <a href="#" class="btn-link text-semibold media-heading box-inline">Maria Leanz</a>
                        </div>
                        <br>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate ?</p>
                        <div>
                            <div class="btn-group">
                                <a class="btn" href="#"><i class="fa fa-thumbs-up"></i></a>
                                <a class="btn" href="#"><i class="fa fa-thumbs-down"></i></a>
                            </div>
                            <a class="btn" href="#">Komentar</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!--===================================================-->
                <!-- End Newsfeed Content -->
            </div>
            </div>

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
        </div>
    </div>
    
<?php include('layout/footer.php'); ?>