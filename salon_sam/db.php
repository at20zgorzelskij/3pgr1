<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=salon_sam', 'root', '');
}
catch(PDOException $e) {
    echo $e->getMessage() . " " . $e->getCode();
    die();
}