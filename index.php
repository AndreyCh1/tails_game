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
                $levelUnlocker = 0;
                if (isset($_POST["levelUnlocker"])) {
                    $levelUnlocker = $_POST["levelUnlocker"];
                    echo ("<input type='hidden' name='levelUnlocker' value='$levelUnlocker'>");
                    if ($levelUnlocker == 1) {
                        echo ("<p><input type='radio' id='easy' name='difficultyLevel' value='easy'><label for='easy'>Легкий</label></p>");
                        echo ("<p><input type='radio' id='medium' name='difficultyLevel' value='medium'><label for='medium'>Средний</label></p>");
                        echo ("<p><input class='disabled_radio' type='radio' id='hard' name='difficultyLevel' value='hard' disabled><label for='hard'>Сложно</label></p>");
                    } else if ($levelUnlocker == 2) {
                        echo ("<p><input type='radio' id='easy' name='difficultyLevel' value='easy'><label for='easy'>Легкий</label></p>");
                        echo ("<p><input type='radio' id='medium' name='difficultyLevel' value='medium'><label for='medium'>Средний</label></p>");
                        echo ("<p><input type='radio' id='hard' name='difficultyLevel' value='hard'><label for='hard'>Сложно</label></p>");
                    }
                } else {
                    echo ("<p><input type='radio' id='easy' name='difficultyLevel' value='easy'><label for='easy'>Легкий</label></p>");
                    echo ("<p><input class='disabled_radio' type='radio' id='medium' name='difficultyLevel' value='medium' disabled><label for='medium'>Средний</label></p>");
                    echo ("<p><input class='disabled_radio' type='radio' id='hard' name='difficultyLevel' value='hard' disabled><label for='hard'>Сложно</label></p>");
                }
                var_dump($_POST);
            ?>
            <input type="submit" value="Подтвердить">
        </form>
    </div>
</body>

</html>