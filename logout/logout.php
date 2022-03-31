<?php
session_start();
require_once '../functions.php';

if(!isset($_SESSION["login"])){
    header('location: ../welcome/welcome.php');
    exit;
}

session_destroy();
echo "<script>
    alert('Anda berhasil logout');
    document.location.href='../welcome/welcome.php';
</script>";
