<?php
    require_once('db.php');

    $pos = $_POST['pos'] ?? null;

    $stmt = $db->prepare('select * from zawodnik, pozycja where zawodnik.pozycja_id = :pozycja AND zawodnik.pozycja_id = pozycja.id');
    $stmt->execute([
        ':pozycja' => $pos,
    ]);
    $roz = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="upper">
        <h1>Światowe rozgrywki piłkarskie</h1>
        <img src="obraz1.jpg" alt="obraz">
    </div>
    <div id="matches-bar">
        
    <div id="below">
        <h2>Reprezentacja Polski</h2>
        <div id="below-flex">
            <div>
                <p>Podaj pozycje zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy)</p>
                <form action="index.php" method="POST">
                    <input type="number" name="pos" id="pos" min="1" max="4">
                    <input type="submit">
                    <ul>
                    <?php foreach($roz as $row): ?>
                        <li><?=$row['imie']." ".$row['nazwisko']?></li>
                    <?php endforeach; ?>
                    </ul>
                </form>
            </div>
            <div>
                <img src="zad1.png" alt="zad1">
            </div>
        </div>
    </div>
    </div>
    
</body>
</html>