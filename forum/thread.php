<?php

	include ('../_config/connect.php');

	session_start();

	// Buat post
	if($_GET["aksi"] == "buat") {
		$id_user = $_SESSION["id"];
		$judul = $_POST["judul"];
		$konten = $_POST["konten"];
		$kategori = $_POST["kategori"];

		$sql = "INSERT INTO posting (user_id, judul, konten, kategori) VALUES(
					'$id_user', '$judul', '$konten', '$kategori');";

		$result = mysqli_query($conn, $sql);

		if($result){

			// ambil id thread
			$get_id = "SELECT id_thread FROM posting WHERE user_id = '$id_user' AND judul = '$judul' AND konten = '$konten' AND  kategori = '$kategori' LIMIT 1;";

			$result_get_id = mysqli_query($conn, $get_id);

			$datu = mysqli_fetch_assoc($result_get_id);

			$_SESSION["thread_message"] = "Anda berhasil menambah thread. Terimakasih berpartisipasi di forum ini";
			header("Location: view.php?thread=".$datu['id_thread']);
		} else {
			echo("Error : " . mysqli_error($conn));
		}

	}

	// edit postingan
	if($_GET["aksi"] == "edit") {
		$id = $_GET["id"];
		$judul = $_POST["judul"];
		$konten = $_POST["konten"];
		$kategori = $_POST["kategori"];
		$date_edit = date("Y-m-d g:i a");

		// $query_edit = "UPDATE posting SET
		// 					judul = '$judul',
		// 					konten = '$konten',
		// 					kategori = '$kategori',
		// 					diubat_at = $date_edit
		// 				WHERE id_thread = '$id';";

		$query_edit = "UPDATE posting SET judul = '$judul', konten = '$konten', kategori = '$kategori', diubah = '$date_edit' WHERE id_thread = $id;";

		$result_query_edit = mysqli_query($conn, $query_edit);

		if($result_query_edit){
			header("Location: view.php?thread=".$id);
			exit;
		} else {
			echo mysqli_error($result_query_edit);
		}

	}

	if($_GET["aksi"] == "hapus"){
		$id = $_GET["id"];

		$query_delete = "DELETE FROM posting WHERE id_thread = $id ;";
		$result_query_delete = mysqli_query($conn, $query_delete);

		if($result_query_delete){
			$_SESSION["thread_message"] = "Thread anda berhasil dihapus";
			header("Location: index.php");
			exit;
		} else {
			echo mysqli_error($result_query_delete);
		}

	}









































?>