<?php
    session_start();
    require_once '../functions.php';
        if(isset($_POST["login"])){
            if(login($_POST)){
                $_SESSION["login"] = $_POST['username'];
                echo "<script>
                alert('Login berhasil');
                document.location.href='../home/home.php';
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
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="title">
        Login
    </div>
    <div class="form-container">
        <form action="" method="post" id = "form">
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="btn-container">
                <div class="btn">
                    <button type="submit" name="login">Login</button>
                    <a href="../welcome/welcome.php">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>