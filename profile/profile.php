<?php
    require_once '../functions.php';

    session_start();
    //kalo belum login tidak akan bisa masuk
    if(!isset($_SESSION["login"])){
        header('location: ../welcome/welcome.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="header">
        <div class="logo">
            Aplikasi Pengelola Keuangan
        </div>
        <div class="menu">
            <div class="main">
                <div class="home">
                    <a href="../home/home.php">Home</a>
                </div>
                <div class="profile">
                    Profile
                </div>
            </div>
            <div class="logout">
                <a href="../logout/logout.php" onclick="return confirm('Apakah anda ingin logout?');">Logout</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="title">
            <h2>Profil Pribadi</h2>
        </div>
        <div class="profile-container">
            <div class="row-container">
                <div class="text-container">
                    <div class="text">Nama Depan</div>
                    <div class="value">
                        <?= $_SESSION["nama_depan"]?>
                    </div>
                </div>  
                <div class="text-container">
                    <div class="text">Nama Tengah</div>
                    <div class="value">
                        <?= $_SESSION["nama_tengah"]?>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Nama Belakang</div>
                    <div class="value">
                        <?= $_SESSION["nama_belakang"]?>
                    </div>
                </div>
            </div>

            <div class="row-container">
                <div class="text-container">
                    <div class="text">Tempat Lahir</div>
                    <div class="value">
                        <?= $_SESSION["tempat_lahir"]?>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Tgl Lahir</div>
                    <div class="value">
                        <?= $_SESSION["tgl_lahir"]?>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">NIK</div>
                    <div class="value">
                        <?= $_SESSION["nik"]?>
                    </div>
                </div>
            </div>

            <div class="row-container">
                <div class="text-container">
                    <div class="text">Warga Negara</div>
                    <div class="value">
                        <?= $_SESSION["warga_negara"]?>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Email</div>
                    <div class="value">
                        <?= $_SESSION["email"]?>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">No HP</div>
                    <div class="value">
                        <?= $_SESSION["hp"]?>
                    </div>
                </div>
            </div>

            <div class="row-container">
                <div class="text-container">
                    <div class="text">Alamat</div>
                    <div class="value">
                        <?= $_SESSION["alamat"]?>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Kode Pos</div>
                    <div class="value">
                        <?= $_SESSION["kode_pos"]?>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Foto Profil</div>
                    <div class="value">
                        <img src="../img/<?= $_SESSION["nameFile"]?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>