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
                $win = $_POST["win"];
                if (isset($_POST["levelUnlocker"])) {
                    $levelUnlocker = $_POST["levelUnlocker"];
                    echo ("<input type='hidden' name='levelUnlocker' value='$levelUnlocker'>");
                    if ($levelUnlocker == 1) {
                        if ($win >= 5) {
                            $levelUnlocker = 2;
                            echo ("<p><h4>Вы победили!</h4></p>");
                            echo ("<input type='hidden' name='levelUnlocker' value='$levelUnlocker'>");
                        } else {
                            echo ("<p><h4>Вы проиграли!</h4></p>");
                        }
                    } else {
                        if ($win >= 5) {
                            echo ("<p><h4>Вы победили!</h4></p>");
                        } else {
                            echo ("<p><h4>Вы проиграли!</h4></p>");
                        }
                    }
                } else {
                    if ($win >= 5) {
                        $levelUnlocker = 1;
                        echo ("<p><h4>Вы победили!</h4></p>");
                        echo ("<input type='hidden' name='levelUnlocker' value='$levelUnlocker'>");
                    } else {
                        echo ("<p><h4>Вы проиграли!</h4></p>");
                    }
                }
                echo ("Побед: " . $win);
                var_dump($_POST);
                ?>
                <input class="home_button" type="submit" value="Вернуться на главную">
            </div>
        </form>
    </div>
</body>

</html>