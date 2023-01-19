<?php
session_start();
$host = "mysql:host=localhost;dbname=bm";
$root = "root";
$pass = "";

try {
    $db = new PDO($host, $root, $pass);
}
catch(PDOException $e) {
    switch($e->getCode()){
        case 1049:
            $mess = "Unknown database";
            break;
        case 1045:
            $mess = "Unknown user";
            break;
        case 2002:
            $mess = "Unknown host";
            break;
        default:
            $mess = "different error: ".$e->getMessage();
            break;
    }

    if($mess){
        $_SESSION['type'] = 'Database connection error:';
        $_SESSION['mess'] = $mess;
        header('Location: error.php');
    }
    //die();
}