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
        <h1>Игра "Орел или решка"</h1>
        <form method="post" action="game.php">
            <p>Выберите сложность:</p>
            <?php
                if (isset($_POST["reset"])) {
                    session_start();
                    session_destroy();
                }
                $levelUnlocker = 0;
                session_start();
                if (isset($_SESSION["levelUnlocker"])) {
                    $levelUnlocker = json_decode($_SESSION["levelUnlocker"]);
                    var_dump($_SESSION);
                }
                $_SESSION["levelUnlocker"] = json_encode($levelUnlocker);
            ?>
            <p><button class="level" type='submit' name='difficultyLevel' value='easy'>Легкий</button></p>
            <p><button class="level" type='submit' <?php if ($levelUnlocker == 0) echo ("disabled")?> name='difficultyLevel' value='medium'>Средний</button></p>
            <p><button class="level" type='submit' <?php if ($levelUnlocker < 2) echo ("disabled")?> name='difficultyLevel' value='hard'>Тяжелый</button></p>
            <?php
                if ($_POST) {
                    $_SESSION["difficultyLevel"] = json_encode($difficultyLevel);
                }
            ?>
        </form>
        <form method="post" action="index.php">
            <p><button class="" type='submit' name="reset" value="reset">Сброс</button></p>
        </form>
    </div>
</body>

</html>