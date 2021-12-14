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
			$_SESSION["postRes"] = "success";
			header("Location: index.php");
		} else {
			echo("Error : " . mysqli_error($conn));
		}

	}









































?>