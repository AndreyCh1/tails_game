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
                }
            ?>
            <p><button class="level" type='submit' name='difficultyLevel' value='easy'>Легкий</button></p>
            <p><button class="level" type='submit' <?php if ($levelUnlocker == 0) echo ("disabled")?> name='difficultyLevel' value='medium'>Средний</button></p>
            <p><button class="level" type='submit' <?php if ($levelUnlocker < 2) echo ("disabled")?> name='difficultyLevel' value='hard'>Сложно</button></p>
        </form>
    </div>
</body>

</html>