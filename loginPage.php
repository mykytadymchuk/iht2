<?php
    if(isset($_COOKIE['username'])) {
        header('Location: main.php');
    }

    if(isset($_COOKIE['error'])) {
        echo '<script type="text/javascript">';
        echo 'alert("Неправильний логін або пароль!");';
        echo '</script>';
        setcookie('error', '', time() - 3600);
    }
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login in</title>
    <link rel="stylesheet" href="stylesAuth.css">
</head>
<body>
    <h1 id="calcTitle">Калькулятор витрат</h1>
    <div id="mainBlock">
        <h2 id="pageTitle">Увійдіть в акаунт</h1>
        <form action="loginProcess.php" method="post">
            <div id="usernameBlock">
                <label for="username">Логін</label><br>
                <input type="text" name="username" id="username" required> <br>
            </div>
            <div id="passwordBlock">
                <label for="password">Пароль</label><br>
                <input type="password" name="password" id="password" required>
            </div>
            <div id="submitBlock">
                <input type="submit" value="Увійти" id="submit">
            </div>
        </form>
    </div>
    <div id="noAccount">
        <a href="signupPage.php">У мене немає акаунта</a> 
    </div>
</body>
</html>