<?php
    error_reporting(0);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $filename = 'passwords/'.$username.'.txt';
            $fileOpened = fopen($filename, "r");
            if ($fileOpened) {
                fclose($fileOpened);
                setcookie('error', 1); // Користувач з таким логіном вже існує!
                header('Location: signupPage.php');
            }
            else {
                if (isset($_POST['password'])) {
                    $password = $_POST['password'];
                    $fileOpened = fopen($filename, "w");
                    fwrite($fileOpened, $password);
                    setcookie('username', $username, time() + 3600);
                    mkdir('spendings/'.$username, 0777, true);
                    header('Location: main.php');
                }
                fclose($fileOpened);
            }
        }
    }
?>