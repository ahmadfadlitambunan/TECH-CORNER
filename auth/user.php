<?php

include ('../_config/connect.php');
session_start();

// registrasi
if($_GET["aksi"] == 'register'){
    $email = trim(mysqli_real_escape_string($conn, $_POST["email"]));
    $uname = trim(mysqli_real_escape_string($conn, $_POST["uname"]));
    $pass1 = trim(mysqli_real_escape_string($conn, $_POST["pass1"]));
    $name  = trim(mysqli_real_escape_string($conn, $_POST["name"]));
    $level = "member";

    // hashing vkey
    $vkey = md5(time().$uname);

    // hashing password
    $pass1 = password_hash($pass1, PASSWORD_DEFAULT);


    // insert data
    $query = "INSERT INTO users (email, username, password, name, level, vkey) VALUES (
        '".$email."',
        '".$uname."',
        '".$pass1."',
        '".$name."',
        '".$level."',
        '".$vkey."'
    )";

    $result = mysqli_query($conn, $query);

    // echo mysqli_error($result); exit();


    if($result){
        // send email
        $to = $email;
        $subject = "Email Verification";
        $message = "
        <h2>You Have Registered to TECH CORNER</h2>
        <h5>Verify your email address to Login with the given link below</h5>
        <br><br>
        <a href='http://localhost/techcorner/auth/verify.php?vkey=$vkey'>Verify Now</a>
        ";
        $headers = "From: techcornerPW@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "X-Priority: 1\r\n";

        mail($to, $subject, $message, $headers);

        $_SESSION["regStat"] = "success";
        header('Location: send-email.php');
        exit();
        
    } else {
        $_SESSION["regStat"] = "failed";
        header('Location: send-email.php');
        exit();
    }


} 


// Login
if ($_GET["aksi"] == "login"){

    // ambil data dari inputan user
    $email = trim(mysqli_real_escape_string($conn, $_POST["email"]));
    $password = $_POST["pass"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email';");

    if ( mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if($row['verified'] == 1){
         if ( password_verify($password, $row["password"]) ) {
                // set session
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row['id_user'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["level"] = $row['level'];
            $_SESSION["email"] = $row['email'];

                // // cek apakah rememberme dipencet
                // if (isset($_POST["remember"])) {
                //     // set cookie
                //     // setcookie('key', hash('sha256', $row['username']), time() + 60);
                //     // setcookie('id', $row['id'], time() + 60);       
                // }
            if(isset($_SESSION["for"])) {
                header("Location: ../forum/buat.php");
                exit();
            }

            if($_SESSION["level"] = 'member' || $_SESSION["level"] == "moderator"){
                header("Location: ../forum/index.php");
                exit();
            } else {
                header("Location: ../admin/index.php");
                exit();
            }
        }  

    } else {
            // akun belum teverifikasi
        $_SESSION["error1"] = true;
        header("Location: login.php");
        exit();
    }

} 
        // akun tidak terdaftar
$_SESSION["error2"] = true;
header("Location: login.php");
exit();

}




// validasi email server side
if ($_GET['aksi'] == 'validasi-email') {

    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));

    $sql = "SELECT * from users where email = '$email'";
    $process = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($process);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "invalid"; 
        exit();
    } if($num == 0){
        echo "ok";
        exit();
    }else{
        echo "used";
        exit();
    }
}

// validasi usename server side
if ($_GET["aksi"] == 'validasi-uname') {

    $uname = trim(mysqli_real_escape_string($conn, $_POST["uname"]));

    $sql = "SELECT * from users where username = '$uname'";
    $process = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($process);

    if(strlen($uname) < 5  ){
        echo "less";
        exit();
    }

    if(strlen($uname) >= 20){
        echo "too much";
        exit();
    }

    if($num == 0){
        echo "ok";
        exit();
    }else{
        echo "used";
        exit();
    }
}


// logout
if($_GET["aksi"] == "logout"){

    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: ../forum/index.php");
    exit();

}

// reset-password
if($_GET["aksi"] == "reset-password"){

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $vkey = md5(rand());

    // check apakah email yang dimasukkan ada di dalam database
    $checkemail_query = "SELECT email,username FROM users WHERE email = '$email' LIMIT 1";
    $checkemail_query_run = mysqli_query($conn, $checkemail_query);

    if(mysqli_num_rows($checkemail_query_run) > 0){
        $row = mysqli_fetch_assoc($checkemail_query_run);
        $get_email = $row['email'];

        // update vkey
        $update_vkey_query = "UPDATE users SET vkey='$vkey' WHERE email = '$get_email' LIMIT 1";
        $update_vkey_query_run = mysqli_query($conn, $update_vkey_query);

        if($update_vkey_query_run){
            // send mail
            $to = $get_email;
            $subject = "Reset Password";
            $message = "
            <h2>Reset Password</h2>
            <h5>Here is your reset-password request. Click the link given below to reset your password</h5>
            <br><br>
            <a href='http://localhost/techcorner/auth/reset-password.php?vkey=$vkey&email=$get_email'>Reset Password</a>
            ";
            $headers = "From: techcornerPW@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "X-Priority: 1\r\n";

            mail($to, $subject, $message, $headers);

            $_SESSION['reset'] = "success";
            header("Location: send-email.php");
            exit();

        } else {
            $_SESSION["reset"] = "error";
            header("Location: forgot-password.php");
            exit();
        }

    } else {
        $_SESSION["reset"] = "not exist";
        header("Location: forgot-password.php");
        exit();
    }
}


//mengganti password
if ($_GET["aksi"] == "change-password"){

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);

    $token = mysqli_real_escape_string($conn, $_POST["change-token"]);


    if (!empty($token)) {

        // check token invalid or not
        $checktoken_query = "SELECT vkey FROM users WHERE vkey = '$token' LIMIT 1";
        $checktoken_query_run = mysqli_query($conn, $checktoken_query);

        if(mysqli_num_rows($checktoken_query_run) > 0){
            if(!empty($pass1) && !empty($pass2)){

                if($pass1 == $pass2){

                    $pass1 = password_hash($pass1, PASSWORD_DEFAULT);
                    // update new password
                    $update_pass_query = "UPDATE users SET password = '$pass1' WHERE vkey='$token' LIMIT 1";
                    $update_pass_query_run = mysqli_query($conn, $update_pass_query);

                    if($update_pass_query_run){
                        $_SESSION["changeStat"] = "success";
                        header("Location: reset-password.php?vkey=$token&email=$email");
                        exit();

                    // mysqli error
                    } else {
                        $_SESSION["changeStat"] = "error";
                        header("Location: reset-password.php?vkey=$token&email=$email");
                        exit();
                    }

                // password tidak sesuai
                } else {
                    $_SESSION["changeStat"] = "not match";
                    header("Location: reset-password.php?vkey=$token&email=$email");
                    exit();
                }
            } else {
                $_SESSION["changeStat"] = "mandatory";
                header("Location: reset-password.php?vkey=$token&email=$email");
                exit();
            }

        // token invalid
        } else {
            $_SESSION["changeStat"] = "invalid";
            header("Location: reset-password.php?vkey=$token&email=$email");
            exit();
        }

    // token tidak ada 
    } else {
        $_SESSION["changeStat"] = "not exist";
        header("Location: reset-password.php");
        exit();
    }

}





?>