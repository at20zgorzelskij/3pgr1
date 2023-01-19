<?php
    require_once('db.php');

    $query = $db->prepare("SELECT informacja, wart_min, wart_max FROM bmi");
    $query->execute();
    $result = $query->fetchAll();
    if(!$result){
        $_SESSION['type'] = '"Select" query error';
        $_SESSION['mess'] = '';
        header('Location: error.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Document</title>
</head>
<body>
<header>
        <div class="logo">
            <img src="wzor.png" alt="wzór BMI">
        </div>
        <div class="baner">
            <h1>Oblicz swoje BMI</h1>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Interpretacja BMI</th>
                    <th>Wartość minimalna</th>
                    <th>Wartość maksymalna</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $row): ?>
                    <tr>
                        <td><?= $row['informacja'] ?></td>
                        <td><?= $row['wart_min'] ?></td>
                        <td><?= $row['wart_max'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <div>
        <section class="lewy">
            <h2>Podaj wagę i wzrost</h2>
            <form action="bmi.php" method="post">
                <label for="waga">Waga:</label>
                <input type="number" name="waga" id="waga" min="1" required> <br>

                <label for="wzrost">Wzrost w cm:</label>
                <input type="number" name="wzrost" id="wzrost" min="1" required><br>

                <input type="submit" value="Oblicz i zapamiętaj wynik">
            </form>
            <?php
            if (!empty($_POST['waga']) && !empty($_POST['wzrost'])) {
                $waga = $_POST['waga'];
                $wzrost = $_POST['wzrost'];

                $bmi = $waga / ($wzrost * $wzrost) * 10000;
                echo "Twoja waga: $waga; Twój wzrost: $wzrost <br> BMI wynosi: $bmi";
                
                $bmi_id = 0;
                if ($bmi <= 18) 
                    $bmi_id = 1;
                if ($bmi > 19 and $bmi <= 25) 
                    $bmi_id = 2;
                if ($bmi > 26 and $bmi <= 30) 
                    $bmi_id = 3;
                if ($bmi > 31 and $bmi <= 100) 
                    $bmi_id = 4;

                $query = $db->prepare("INSERT INTO wynik (id, bmi_id, data_pomiaru, wynik) VALUES (NULL, :id, :data_pomiaru, :wynik)");
                $result = $query->execute([
                    ":id" => $bmi_id,
                    ":data_pomiaru" => date("Y-m-d"),
                    ":wynik" => $bmi
                ]);
                if(!$result){
                    $_SESSION['type'] = '"Insert" query error';
                    $_SESSION['mess'] = '';
                    header('Location: error.php');
                }
            }
            ?>
        </section>
        <section class="prawy">
            <img src="rys1.png" alt="ćwiczenia" height="400px">
        </section>
    </div>

    <footer>
        <p>Autor: Jakub Zgorzelski</p>
        <a href="kwerendy.txt">Zobacz kwerendy</a>
    </footer>
</body>
</html>