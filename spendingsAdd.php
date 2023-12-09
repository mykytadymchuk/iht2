<?php
    if(!isset($_COOKIE['username'])) {
        header('Location: loginPage.php');
    }
    else {
        $username = $_COOKIE['username'];
    }
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add spendings</title>
    <link rel="stylesheet" href="stylesAddSpendings.css">
</head>
<body>
    <header>
        <h1 id="calcTitle" class="headerElement">Калькултор витрат</h1>
        <h2 id="usernameBlock" class="headerElement">
            <?php
                echo("Вітаю, $username!");
            ?>
        </h2>
    </header>
    <div id=spendingsAddBlock>
        <form action=spendingsAddProcess.php method=post>
            <div id="spendingNameBlock">
                <label for="spendingName">Назва витрати</label><br>
                <input type="text" name="spendingName" id="spendingName" required autofocus> <br>
            </div>
            <div id="spendingCostBlock">
                <label for="spendingCost">Вартість, грн</label><br>
                <input type="number" name="spendingCost" id="spendingCost" min="0" required step="0.1">
            </div>
            <input type=submit value=Додати id=spendingsAddButton>
        </form>
    </div>
    <div id="cancelBlock">
        <a href="main.php">Скасувати</a>
    </div>
    </body>
</html>