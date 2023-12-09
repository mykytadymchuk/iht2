<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['spendingName']) && isset($_POST['spendingCost']) ) {
            $spendingName = $_POST['spendingName'];
            $spendingCost = $_POST['spendingCost'];
            $username = $_COOKIE['username'];
            $spendingsDirectory = 'spendings/'.$username;
            $spendingsFiles = glob($spendingsDirectory.'/*.txt');
            $spendingsCount = count($spendingsFiles)+1;
            $spendingsFileName = $spendingsDirectory.'/'.$spendingsCount.'.txt';
            $fileOpened = fopen($spendingsFileName, "w");
            fwrite($fileOpened, $spendingName."\n".$spendingCost);
            fclose($fileOpened);
            header('Location: main.php');
        }
    }
?>