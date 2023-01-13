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
            session_start();
            $win = 0;
            $submit = 0;
            if (isset($_SESSION["submit"])) {
                $submit = json_decode($_SESSION["submit"]);
                $win = json_decode($_SESSION["win"]);
            }
            if ($submit == 10) {
                $page = "results.php";
                // session_destroy($_SESSION["submit"]);
            } else {
                $page = "game.php";
            }
            if ($submit > 0) {
                echo ("<h4>Сыграно игр: $submit</h4>");
            }
            ?>
        <form method="post" action="<?= $page ?>">
            <?php
                $level = json_decode($_SESSION["difficultyLevel"]);
                $submit += 1;
                if (isset($_SESSION["choice"])) {
                    $choice = json_decode($_SESSION["choice"]);
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
                $_SESSION["submit"] = json_encode($submit);
                $_SESSION["win"] = json_encode($win);
                $_SESSION["page"] = json_encode($page);
                if ($submit == 11) {
                    echo ("<p><button type='submit'>Перейти к результатам</button></p>");
                } else {
                    echo ("
                    <p>Выберите сторону монетки:</p>
                    <p><button type='submit' name='choice' value='0'>Орел</button></p>
                    <p><button type='submit' name='choice' value='1'>Решка</button></p>
                    ");
                    $_SESSION["choice"] = json_encode($choice);
                }
                var_dump($_POST);
                ?>
        </form>
    </div>
</body>

</html>