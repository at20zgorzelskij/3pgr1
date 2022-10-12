<?php
require_once('db.php');

try {
    $stmt = $db->prepare('select * from car');
    $stmt->execute();

    $car_data = $stmt->fetchAll();

    $stmt = $db->prepare('select * from color');
    $stmt->execute();

    $color_data = $stmt->fetchAll();

    $stmt = $db->prepare('select * from extras');
    $stmt->execute();

    $extras_data = $stmt->fetchAll();

}
catch(PDOException $e) {
    echo $e->getMessage() . " " . $e->getCode();
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <title>Konfigurator</title>
</head>
<body>
    <main>
        <div id="banner">
            <img src="baner.jpg" alt="baner">
        </div>
        <div id="below-banner">
            <div id="options-bar">
                <hr>

                <h2>Model</h2>
                <select id="model">
                    <?php foreach($car_data as $row): ?>
                        <option value="<?= $row['price'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <h2>Kolor</h2>
                <select id="color">
                    <?php foreach($color_data as $row): ?>
                        <option value="<?= $row['price'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <hr>

                <h2>Felgi</h2>
                <input type="radio" name="felgi" id="stalowe" value="1200">
                <label for="stalowe">Stalowe</label>
                <br>
                <input type="radio" name="felgi" id="aluminiowe" value="800">
                <label for="aluminiowe">Aluminiowe</label>

                <hr>

                <h2>Doposażenie</h2>
                <div id='extras'>
                <?php foreach($extras_data as $row): ?>
                    <?= $row['name'] ?> <input id="<?= $row['id'] ?>" name='<?= $row['name'] ?>' type="checkbox" value="<?= $row['price'] ?>">
                   <br> 
                <?php endforeach; ?>
                </div>
                
                <hr>
            </div>
            <div id="main-bar">
                <h2>Twój samochód</h2>
                <img id="carimg"src="samochod.png" alt="samochod" width="500px">

                <h2>Wycena</h2>
                <div id="extras-to-add" class="to-right">
                    <div id="base_p"></div> <br>
                    <div id="color_p"></div> <br>
                    <div id="rims_p"></div>
                </div>

                <hr>
                <h2 id='sum' class="to-right">Razem: </h2>
                
            </div>
        </div>
        <div id="foot">
            <p>Praca użytkownika Jakub Zgorzelski </p>
        </div>
    </main>
</body>
</html>