<?php
session_start();

include "../_config/connect.php";

//dapatkan data user dari form register
$user = [
	'name' => $_POST['name'],
    'id_user' => $_POST['id_user'],
	'username' => $_POST['username'],
	'password' => $_POST['password'],
    'password_confirmation' => $_POST['password_confirmation']
];

//cek jika password tidak kosong, jika kosong jangan di update.
if($_POST['password'] !== ''){

    //validasi jika password & password_confirmation sama
    if($user['password'] !== $user['password_confirmation']){
        $_SESSION['error'] = 'Password yang anda masukkan tidak sama dengan password confirmation.';
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['username'] = $_POST['username'];
        header("Location: profile.php");
        return;
    }
}

//check apakah user dengan username tersebut ada di table users yang kecuali user tersebut.
$query = "SELECT * FROM USERS WHERE USERNAME = ? AND ID_USER != ? LIMIT 1";
$stmt = $conn->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('si', $user['username'], $user['id_user']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

//jika username sudah ada, maka return kembali ke halaman profile.
if($row !== null){
	$_SESSION['error'] = 'Username: '.$user['username'].' yang anda masukkan sudah ada di database.';
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['password'] = $_POST['password'];
	header("Location: profile.php");
	return;

}else{


	$stmt = $conn->stmt_init();

	//username unik. update data user di database.
	$query = "update users set name = ?, username = ? where id_user = ?";

	//jika password dirubah
    if($_POST['password'] !== ''){
	    $password = password_hash($user['password'],PASSWORD_DEFAULT);
        $query = "update users set name = ?, username = ? , password = ? where id_user = ?";
    }

	$stmt->prepare($query);

    //jika password dirubah
    if($_POST['password'] !== ''){
	    $stmt->bind_param('sssi', $user['name'],$user['username'],$password, $user['id_user']);
    }else{
	    $stmt->bind_param('ssi', $user['name'],$user['username'], $user['id_user']);
    }
	$result = $stmt->execute();
	$result = $stmt->affected_rows;
    if($result){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['username'] = $_POST['username'];
	    $_SESSION['message']  = 'Berhasil mengupdate data profile di sistem.';
        header("Location: index.php");
    }else{
        $_SESSION['error'] = 'Gagal update data profile.';
        header("Location: profile.php");
    }
}

?>
<div class="card-body">
    <form method="POST" class="my-login-validation" action="update.php"
<div class="form-group">
    <input type="number" name="id_user" value="<>php echo $_POST['id_user'];?>">
    <label for="username">Username</label>
    <input id="username"type="text" class="form-control" name="username" required
    <div class="invalid-feedback">
        Apa username Anda?
    </div>
</div>

<div class="form-group">
    <input type="number" name="id_user" value="<>php echo $_POST['id_user'];?>">
    <label for="username">Username</label>
    <input id="username"type="text" class="form-control" name="username" required autofocus
    <div class="invalid-feedback">
        Apa username Anda?
    </div>
</div>