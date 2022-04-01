<?php
    require_once '../functions.php';

    session_start();
    //kalo belum login tidak akan bisa masuk
    if(!isset($_SESSION["login"])){
        header('location: ../welcome/welcome.php');
        exit;
    }

    $datas = getAll();
    if(isset($_POST['update'])){
        if($_FILES['foto']['error']===4){
            //karena bisa aja dia gmau ganti fotonya
            $_FILES['foto']['error']=100;
            $_FILES['foto']['name']=$_POST['fotolama'];
        }
        $_POST['password1']= $datas[0]['password'];
        $_POST['password2']= $datas[0]['password'];
        $_POST['update'] = '1';
        if(validate($_POST)){
            if(update($_POST)){
                echo "<script>
                    alert('Update berhasil');
                    document.location.href = '../profile/profile.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('Update gagal');
                </script>";
            }
        }
        else{
            printError();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Page</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="header">
        <div class="logo">
            Aplikasi Pengelola Keuangan
        </div>
        <div class="menu">

        </div>
    </div>
    <div class="content">
        <div class="title">
            <h2>Edit Profil</h2>
        </div>
        <a href="../profile/profile.php">Back to profile</a>
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fotolama" value=<?= $datas[0]["foto"]?>>
        <div class="profile-container">
            <div class="row-container">
                <div class="text-container">
                    <div class="text">Nama Depan</div>
                    <div class="value">
                        <input type="text" name="nama_depan" id="nama_depan" value=
                        <?= $datas[0]["nama_depan"]?>>
                    </div>
                </div>  
                <div class="text-container">
                    <div class="text">Nama Tengah</div>
                    <div class="value">
                        <input type="text" name="nama_tengah" id="nama_tengah" value=
                        <?= $datas[0]["nama_tengah"]?>>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Nama Belakang</div>
                    <div class="value">
                        <input type="text" name="nama_belakang" id="nama_belakang" value=
                        <?= $datas[0]["nama_belakang"]?>>
                    </div>
                </div>
            </div>

            <div class="row-container">
                <div class="text-container">
                    <div class="text">Tempat Lahir</div>
                    <div class="value">
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value=
                        <?= $datas[0]["tempat_lahir"]?>>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Tgl Lahir</div>
                    <div class="value">
                        <input type="date" name="tgl_lahir" id="tgl_lahir" value=
                        <?= $datas[0]["tgl_lahir"]?>>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">NIK</div>
                    <div class="value">
                        <input type="text" name="nik" id="nik" value=
                        <?= $datas[0]["nik"]?>>
                    </div>
                </div>
            </div>

            <div class="row-container">
                <div class="text-container">
                    <div class="text">Warga Negara</div>
                    <div class="value">
                        <input type="text" name="warga_negara" id="warga_negara" value=
                        <?= $datas[0]["warga_negara"]?>>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Email</div>
                    <div class="value">
                        <input type="text" name="email" id="email" value=
                        <?= $datas[0]["email"]?>>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">No HP</div>
                    <div class="value">
                        <input type="text" name="hp" id="hp" value=
                        <?= $datas[0]["hp"]?>>
                    </div>
                </div>
            </div>

            <div class="row-container">
                <div class="text-container">
                    <div class="text">Alamat</div>
                    <div class="value">
                        <textarea name="alamat" id="alamat" cols="25" rows="2"
                         ><?= $datas[0]["alamat"]?></textarea>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Kode Pos</div>
                    <div class="value">
                        <input type="text" name="kode_pos" id="kode_pos" value=
                        <?= $datas[0]["kode_pos"]?>>
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">Foto Profil</div>
                    <div class="value">
                        <input type="file" name="foto" id="foto">
                    </div>
                </div>
            </div>
            <div class="row-container">
                <button type="submit" name="update">Update</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>