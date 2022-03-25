<?php
    require_once '../functions.php';
    session_start();
    if(isset($_SESSION['uSession'])){
        echo"<script>
                alert('Anda sudah mendaftarkan akun, silahkan login');
                document.location.href='../welcome/welcome.php';
             </script>";
    }
    if(isset($_POST["register"])){
        if(validate($_POST)){
             $_SESSION["uSession"] = $_POST["username"];
             $_SESSION["pSession"] = $_POST["password1"];
             $_SESSION["nameFile"] = $_FILES["foto"]["name"];
             saveToSession($_POST);
             echo"<script>
                alert('Registrasi Berhasil');
                document.location.href='../welcome/welcome.php';
             </script>";
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
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="title">
        Register
    </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row-container">
                <div class="input-container">
                    <label for="nama_depan">Nama Depan</label>
                    <input type="text" name="nama_depan" id="nama_depan" >
                </div>
                <div class="input-container">
                    <label for="nama_tengah">Nama Tengah</label>
                    <input type="text" name="nama_tengah" id="nama_tengah" >
                </div>
                <div class="input-container">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" name="nama_belakang" id="nama_belakang" >
                </div>
            </div>
            
            <div class="row-container">
                <div class="input-container">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" >
                </div>
                <div class="input-container">
                    <label for="tgl_lahir">Tgl Lahir</label>
                    <input type="text" name="tgl_lahir" id="tgl_lahir"  value="dd-mm-yyyy">
                </div>
                <div class="input-container">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" >
                </div>
            </div>


            <div class="row-container">
                <div class="input-container">
                    <label for="warga_negara">Warga Negara</label>
                    <input type="text" name="warga_negara" id="warga_negara" >
                </div>
                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" >
                </div>
                <div class="input-container">
                    <label for="hp">No HP</label>
                    <input type="text" name="hp" id="hp" >
                </div>
            </div>

            
            <div class="row-container">
                <div class="input-container">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="25" rows="2" ></textarea>
                </div>
                <div class="input-container">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="text" name="kode_pos" id="kode_pos" >
                </div>
                <div class="input-container">
                    <label for="foto">Foto Profile</label>
                    <input type="file" name="foto" id="foto" >
                </div>
            </div>


            <div class="row-container">
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" >
                </div>
                <div class="input-container">
                    <label for="password1">Password 1</label>
                    <input type="password" name="password1" id="password1" >
                </div>
                <div class="input-container">
                    <label for="password2">Password 2</label>
                    <input type="password" name="password2" id="password2" >
                </div>
            </div>

            <div class="btn-container">
                <div class="btn">
                    
                </div>
                <div class="btn">
                    <a href="../welcome/welcome.php">Kembali</a>
                    <button type="submit" name="register">Register</button>
                </div>
            </div>
            
        </form>
</body>
</html>