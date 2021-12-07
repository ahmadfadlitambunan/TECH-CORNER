<?php  

date_default_timezone_set('Asia/Jakarta');

    // Koneksi ke database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'project';

    $conn = mysqli_connect($host , $user , $pass, $database);

    if($conn -> connect_error){
        die("Koneksi Gagal: " .$conn -> connect_error);
    }

    // // fungsi baseUrl
    // function base_url($url = null) {
    // 	$base_url = "http://localhost/project";
    // 	if($url != null) {
    // 		return $base_url."/".$url;
    // 	} else {
    // 		return $base_url;
    // 	}
    // }

?>