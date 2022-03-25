<?php
require_once '../functions.php';

session_start();

if(!isset($_SESSION["login"])){
    header('location: ../welcome/welcome.php');
    exit;
}

deleteFile($_SESSION["nameFile"]);

session_destroy();
echo "<script>
    alert('Anda berhasil logout');
    document.location.href='../welcome/welcome.php';
</script>";
