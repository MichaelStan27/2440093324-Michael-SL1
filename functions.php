<?php
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

function isValidDate($date){
    if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$date)){
        $arrNum = explode("-",$date);
        $day = $arrNum[0];
        $month = $arrNum[1];
        $year = $arrNum[2];

        return checkdate($month,$day,$year);
    }
    return false;
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
    if(!isValidDate($datas["tgl_lahir"])){
        $errorMsg.="(tanggal lahir tidak valid) ";
    }
    if(!isValidEmail($datas["email"])){
        $errorMsg.= "(email tidak diakhiri dengan @gmail.com) ";
    }
    if(!isValidImage($_FILES["foto"]["name"])){
        $errorMsg.= "(file yang anda upload tidak berekstensi jpg, jpeg atau png) ";
    }
    //jika sudah benar semua, cek password
    if($errorMsg===""){
        if($datas["password1"]===$datas["password2"]){
            uploadFile();
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

function saveToSession($datas){
    $currentKey;
    $emptyArr=[];
    $keys = array_keys($datas);
    //-1 biar submit tidak dimasukkan
    for($i = 0; $i < count($datas)-1 ;$i++){
        $currentKey = $keys[$i];
        $_SESSION[$currentKey] = $datas[$currentKey];
    }
}

function deleteFile($file){
    $path = "../img/" . $file;
    unlink($path);
}