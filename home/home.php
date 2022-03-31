<?php
    session_start();
    require_once "../functions.php";
    //kalo belum login tidak akan bisa masuk
    if(!isset($_SESSION["login"])){
        header('location: ../welcome/welcome.php');
        exit;
    }
    $data = getName();
    $depan = $data['depan'];
    $tengah = $data['tengah'];
    $belakang = $data['belakang'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            Aplikasi Pengelola Keuangan
        </div>
        <div class="menu">
            <div class="main">
                <div class="home">
                    Home
                </div>
                <div class="profile">
                    <a href="../profile/profile.php">Profile</a>
                </div>
            </div>
            <div class="logout">
                <a href="../logout/logout.php" onclick="return confirm('Apakah anda ingin logout?');">Logout</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="greetings">
            Halo 
            <span class="name"><?="$depan $tengah $belakang"?></span>, 
            Selamat datang di Aplikasi Pengelola Keuangan
        </div>
    </div>
</body>
</html>