<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=egzamin', 'root', '');
    }
    catch(PDOException $e) {
        echo $e->getMessage() . " " . $e->getCode();
        die();
    }
?>