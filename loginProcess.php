<?php
    error_reporting(0);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $filename = 'passwords/'.$username.'.txt';
            $fileOpened = fopen($filename, "r");
            if (!$fileOpened) {
                setcookie('error', 1); // Неправильний логін або пароль!
                header('Location: loginPage.php');
            }
            else {
                if (isset($_POST['password'])) {
                    $password = $_POST['password'];
                    $filePassword = fgets($fileOpened);
                    if ($filePassword === $password) {
                        setcookie('username', $username, time() + 3600);
                        header('Location: main.php');
                    }
                    else {
                        setcookie('error', 1); // Неправильний логін або пароль!
                        header('Location: loginPage.php');
                    }
                }
                fclose($fileOpened);
            }
        }
    }
?>