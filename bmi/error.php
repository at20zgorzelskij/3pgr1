<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="errorStyle.css">
    <title>Document</title>
    <script src="script.js" defer></script>
    <script>
        console.log('<?= $_SESSION['mess'] ?>');
    </script>
</head>
<body>
    <main>
        <div id="message">
            <h1><?= $_SESSION['type'] ?></h1>
            <h2><?= $_SESSION['mess'] ?></h2>
            <div id="switch">
                <div id="dot"></div>
            </div>
        </div>
        <img src="error.png" alt="error">
    </main>
</body>
</html>