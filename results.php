<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <h1>Вы сыграли 10 игр</h1>
        <form method="post" action="index.php">
            <div>
                <?php
                session_start();
                $win = json_decode($_SESSION["win"]);
                if (isset($_POST["levelUnlocker"])) {
                    $levelUnlocker = json_decode($_SESSION["levelUnlocker"]);
                    if ($levelUnlocker == 1) {
                        if ($win >= 5) {
                            $levelUnlocker = 2;
                            echo ("<h4>Вы победили! Разблокирована тяжелая сложность!</h4>");
                            $_SESSION["levelUnlocker"] = json_encode($levelUnlocker);
                        } else {
                            echo ("<h4>Вы проиграли!</h4>");
                        }
                    } else {
                        if ($win >= 5) {
                            echo ("<h4>Вы победили!</h4>");
                        } else {
                            echo ("<h4>Вы проиграли!</h4>");
                        }
                    }
                } else {
                    if ($win >= 5) {
                        $levelUnlocker = 1;
                        echo ("<h4>Вы победили! Разблокирована средняя сложность!</h4>");
                        $_SESSION["levelUnlocker"] = json_encode($levelUnlocker);
                    } else {
                        echo ("<h4>Вы проиграли!</h4>");
                    }
                }
                echo ("Побед: " . $win);
                var_dump($_SESSION);
                ?>
                <input class="home_button" type="submit" value="Вернуться на главную">
            </div>
        </form>
    </div>
</body>

</html>