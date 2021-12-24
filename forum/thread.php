<?php

	include ('../_config/connect.php');

	session_start();

	function upload(){
	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah gambar sudah dipilih
	if($error === 4) {
		echo "<script>
					alert('Masukkan gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek ekstensi gambar yang diupload
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "<script>
					alert('Yang anda pilih bukan gambar');
			  </script>";
		return false;
	}

	// cek ukuran file
	if( $ukuranFile > 1000000){
		echo "<script>
					alert('Ukuran file terlalu besar');
			  </script>";
		return false;
	}

	// jika lulus pengecekan
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'assets/thumbnail/'. $namaFileBaru);

	return $namaFileBaru;

}


if($_GET["for"] == "thread") {

	// Buat post
	if($_GET["aksi"] == "buat") {
		$id_user = $_SESSION["id"];
		$judul = $_POST["judul"];
		$konten = $_POST["konten"];
		$kategori = $_POST["kategori"];

		// cek apakah user upload gambar / tidak
		if($_FILES['gambar']['error'] === 4){
			$gambar = "pict1.png";
		} else {
			$gambar = upload();
			if(!$gambar){
				return false;
			}
		}


		$sql = "INSERT INTO posting (user_id, judul, konten, kategori, thumb) VALUES(
					'$id_user', '$judul', '$konten', '$kategori', '$gambar');";

		$result = mysqli_query($conn, $sql);

		if($result){

			// ambil id thread
			$get_id = "SELECT id_thread FROM posting WHERE user_id = '$id_user' AND judul = '$judul' AND konten = '$konten' AND  kategori = '$kategori' LIMIT 1;";

			$result_get_id = mysqli_query($conn, $get_id);

			$datu = mysqli_fetch_assoc($result_get_id);

			$_SESSION["thread_message"] = "Anda berhasil menambah thread. Terimakasih berpartisipasi di forum ini";
			header("Location: view.php?thread=".$datu['id_thread']);
			exit;
		} else {
			echo("Error : " . mysqli_error($conn));
			exit;
		}

	}

	// edit postingan
	if($_GET["aksi"] == "edit") {
		$id = $_GET["id"];
		$judul = $_POST["judul"];
		$konten = $_POST["konten"];
		$kategori = $_POST["kategori"];
		$date_edit = date("Y-m-d g:i a");

		// cek apakah user upload gambar / tidak
		if($_FILES['gambar']['error'] === 4){
			$gambar = $_POST["gambarLama"];
		} else {
			$gambar = upload();
		}


		$query_edit = "UPDATE posting SET judul = '$judul', konten = '$konten', kategori = '$kategori', diubah = '$date_edit', thumb = '$gambar' WHERE id_thread = $id;";

		$result_query_edit = mysqli_query($conn, $query_edit);

		if($result_query_edit){
			$_SESSION["thread_message"] = "Thread anda berhasil diedit";
			header("Location: view.php?thread=".$id);
			exit;
		} else {
			echo mysqli_error($result_query_edit);
			exit;
		}

	}

	if($_GET["aksi"] == "hapus"){
		$id = $_GET["id"];

		$query_delete = "DELETE FROM posting WHERE id_thread = $id ;";
		$result_query_delete = mysqli_query($conn, $query_delete);

		if($result_query_delete){
			$_SESSION["thread_message"] = "Thread berhasil dihapus";
			header("Location: index.php");
			exit;
		} else {
			echo mysqli_error($result_query_delete);
			exit;
		}

	}
}

if($_GET["for"] == "komen"){

	// tambah Komentar
	if($_GET["aksi"] == "tambah"){
		$id_user = $_SESSION["id"];
		$id_thread = $_POST["id_thread"];
		$parent = $_POST["parent"];
		$komentar = $_POST["komentar"];

		$query = "INSERT INTO komentar (konten, id_user, thread_id, parent) VALUES (
						'$komentar',
						'$id_user',
						'$id_thread',
						'$parent'
						);";

		$result = mysqli_query($conn, $query);

		if($result){
			$_SESSION["thread_message"] = "Komentar berhasil ditambahkan";
			header("Location: view.php?thread=".$id_thread);
			exit;
		} else {
			echo mysqli_error($result);
			exit;
		}

	}


	if($_GET["aksi"] == "edit"){
		$komentar = $_POST["komentar"];
		$id_komentar = $_GET["id_komentar"];
		$id_thread = $_POST["id_thread"];
		$date_edit = date("Y-m-d g:i a");

		$query = "UPDATE komentar SET konten = '$komentar', diubah = '$date_edit' WHERE id = '$id_komentar';";

		$result = mysqli_query($conn, $query);

		if($result){
			$_SESSION["thread_message"] = "Komentar berhasil diubah";
			header("Location: view.php?thread=".$id_thread);
			exit;
		} else {
			echo mysqli_error($result);
			exit;
		}

	}

	if($_GET["aksi"] == "hapus"){
		$id = $_GET["id_komentar"];

		$query = "DELETE FROM komentar WHERE id = '$id'";
		$result = mysqli_query($conn, $query);

		if($result){
			$_SESSION["thread_message"] = "Komentar berhasil dihapus";
			header("Location: view.php?thread=".$_GET["id_thread"]);
			exit;
		} else {
			echo mysqli_error($result);
			exit;
		}
	}


}









































?>