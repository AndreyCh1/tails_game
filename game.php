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
        <?php
            $win = 0;
            $submit = 0;
            if (isset($_POST["submit"])) {
                $submit = $_POST["submit"];
                $win = $_POST["win"];
            }
            if ($submit == 10) {
                $page = "results.php";
            } else {
                $page = "game.php";
            }
            echo ("<h4>Игра номер $submit</h4>");
            ?>
        <form method="post" action="<?= $page ?>">
            <?php
                $submit += 1;
                $level = $_POST["difficultyLevel"];
                if (isset($_POST["choice"])) {
                    $choice = $_POST["choice"];
                    $coin = rand(0,1);
                    if ($coin == $choice) {
                        if ($level == "hard") {
                            $coin = rand(0,1);
                            if ($coin == $choice) {
                                $coin = rand(0,1);
                                if ($coin == $choice) {
                                    echo "Победа!";
                                    $win += 1;
                                } else {
                                    echo "Поражение :(";
                                }
                            } else {
                                echo "Поражение :(";
                            }
                        } else if ($level == "medium") {
                            $coin = rand(0,1);
                            if ($coin == $choice) {
                                echo "Победа!";
                                $win += 1;
                            } else {
                                echo "Поражение :(";
                            }
                        }
                        else {
                            echo "Победа!";
                            $win += 1;
                        }
                    } else {
                        if ($level == "easy") {
                            $coin = rand(0,1);
                            if ($coin == $choice) {
                                echo "Победа!";
                                $win += 1;
                            } else {
                                echo "Поражение :(";
                            }
                        } else {
                            echo "Поражение :(";
                        }
                    }
                }
                if (isset($_POST["levelUnlocker"])) {
                    $levelUnlocker = $_POST["levelUnlocker"];
                    echo ("<input type='hidden' name='levelUnlocker' value='$levelUnlocker'>");
                }
                echo ("<input type='hidden' name='submit' value='$submit'>");
                echo ("<input type='hidden' name='win' value='$win'>");
                echo ("<input type='hidden' name='difficultyLevel' value='$level'>");
                echo ("<input type='hidden' name='page' value='$page'>");
                if ($submit == 11) {
                    echo ("<p><button type='submit'>Перейти к результатам</button></p>");
                } else {
                    echo ("
                    <p>Выберите сторону монетки:</p>
                    <p><button type='submit' name='choice' value='0'>Орел</button></p>
                    <p><button type='submit' name='choice' value='1'>Решка</button></p>
                    ");
                }
                ?>
        </form>
    </div>
</body>

</html>