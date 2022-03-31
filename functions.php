<?php

$conn = mysqli_connect("localhost", "root", "", "sl_dbserver");

$errorMsg = "";
$namaFile;

function isEmpty($datas){
    //cek data dari post
    $currentKey;
    $emptyArr=[];
    $keys = array_keys($datas);
    for($i = 0; $i < count($datas)-1 ;$i++){
        $currentKey = $keys[$i];
        if($datas[$currentKey]===""){
            $emptyArr[]=$currentKey;
        }
    }

    //cek file
    if($_FILES["foto"]["error"]===4){
        $emptyArr[]="foto";
    }

    return $emptyArr;
}

function isValidEmail($email){
    return str_ends_with($email, "@gmail.com");
}

function checkNumericData($datas){
    global $errorMsg;
    if(!is_numeric($datas["nik"]) || strlen($datas["nik"])!=16){
        $errorMsg.="(NIK tidak valid) ";
    }
    if(!is_numeric($datas["hp"]) || strlen($datas["hp"])<12 || 
    strlen($datas["hp"])>13 || !str_starts_with($datas["hp"],"0")){
        $errorMsg.="(No HP tidak valid) ";
    }
    if(!is_numeric($datas["kode_pos"]) || strlen($datas["kode_pos"])!=5){
        $errorMsg.="(Kode Pos tidak valid) ";
    }
}

function isValidImage($image){
    global $errorMsg;
    $listEx = ["jpg", "jpeg", "png"];
    $image = explode(".",$image);
    $extension = strtolower(end($image));
    if(in_array($extension,$listEx)){
        return true;
    }
    return false;
}

function uploadFile(){
    $name = $_FILES["foto"]["name"];
    $tmp_name = $_FILES["foto"]["tmp_name"];
    move_uploaded_file($tmp_name,'../img/'.$name);
}

function validate($datas){
    global $errorMsg;

    $emptyList = isEmpty($datas);
    //harus keisi semua dulu
    if($emptyList){
        $errorMsg.="(";
        foreach($emptyList as $list){
            $errorMsg.="$list ";
        }
        $errorMsg.="belum diisi) ";
        return false;
    }

    //check validasi data yang sudah diisi
    checkNumericData($datas);
    if(!isValidEmail($datas["email"])){
        $errorMsg.= "(email tidak diakhiri dengan @gmail.com) ";
    }
    if(!isValidImage($_FILES["foto"]["name"])){
        $errorMsg.= "(file yang anda upload tidak berekstensi jpg, jpeg atau png) ";
    }
    //jika sudah benar semua, cek password
    if($errorMsg===""){
        if($datas["password1"]===$datas["password2"]){
            return true;
        }
        $errorMsg.="password tidak sama";
    }
    return false;
}

function printError(){
    global $errorMsg;
    echo "<script> alert('$errorMsg') </script>";
}

function register($datas){
    global $conn;
    $depan = $datas['nama_depan'];
    $tengah = $datas['nama_tengah'];
    $belakang = $datas['nama_belakang'];
    $tempat_lahir = $datas['tempat_lahir'];
    $tgl_lahir = $datas['tgl_lahir'];
    $nik = $datas['nik'];
    $warga = $datas['warga_negara'];
    $email = $datas['email'];
    $hp = $datas['hp'];
    $alamat = $datas['alamat'];
    $kode_pos = $datas['kode_pos'];
    $foto = $_FILES['foto']['name'];
    $username = $datas['username'];
    $password = $datas['password1'];

    //check username
    $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo"
            <script>
                alert('username sudah diambil');
            </script>
        ";
        return false;
    }

    //enkripsi pass

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user
                VALUES ('','$depan','$tengah','$belakang','$tempat_lahir','$tgl_lahir','$nik','$warga','$email'
                ,'$hp', '$alamat', '$kode_pos', '$foto', '$username', '$password')";

    mysqli_query($conn, $query);

    uploadFile();

    return mysqli_affected_rows($conn);
}

function login($datas){
    global $conn;
    global $errorMsg;

    $username = $datas['username'];
    $password = $datas['password'];

    $errorMsg.= ($username==='')?'username must be filled ':'';
    $errorMsg.= ($password==='')?'password must be filled':'';
    if($errorMsg)return false;

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
    $data = mysqli_fetch_assoc($result);
    if($data){
        if(password_verify($password, $data['password'])){
            return true;
        }
        $errorMsg.='password salah';
        return false;
    }
    $errorMsg.='username invalid';
    return false;
}

function getName(){
    global $conn;
    $username = $_SESSION['login'];
    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
    $data = mysqli_fetch_assoc($result);
    $arr = [];
    $arr['depan'] = $data['nama_depan'];
    $arr['tengah'] = $data['nama_tengah'];
    $arr['belakang'] = $data['nama_belakang'];

    return $arr;
}