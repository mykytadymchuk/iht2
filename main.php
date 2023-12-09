<?php
    if(!isset($_COOKIE['username'])) {
        header('Location: loginPage.php');
    }
    else {
        $username = $_COOKIE['username'];
    }

    $spendingsDirectory = 'spendings/'.$username;
    $spendingsFiles = glob($spendingsDirectory.'/*.txt');
    rsort($spendingsFiles);
    $spendingsCount = count($spendingsFiles);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калукулятор витрат</title>
    <link rel="stylesheet" href="stylesMain.css">
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
        <form action=spendingsAdd.php method=post>
             <input type=submit value=+ id=spendingsAddButton>
        </form>
    </div>
    <?php
        if ($spendingsCount===0) {
            echo "<h3 id=spendingsNone> У вас немає жодної витрати!</h3>";
        }
        foreach ($spendingsFiles as $spendingsFiles) {
            $fileDate = date("d.m.Y H:i:s", filemtime($spendingsFiles));
            $content = file_get_contents($spendingsFiles);
            $breakPosition = strpos($content, "\n");
            $spendingName = substr($content, 0, $breakPosition);
            $spendingCost = substr($content, $breakPosition+1);
            $sum += $spendingCost;
            echo "<div id=spendings>";
                echo "<div id=spendingHeader>";
                    echo "<h3 id=spendingName>$spendingName</h3>";
                    echo "<h4 id=fileDate>$fileDate</h4>";
                echo "</div>";
                echo "-$spendingCost грн"; 
            echo "</div>";
        }
        echo "<div id=spendingsSum>";
            if (!$sum) {
                echo "Сума: -0 грн";
            }
            else {
                echo "Сума: -$sum грн";
            }
        echo "</div>";
    ?>
    <div id="logoutBlock">
        <a href="logoutProcess.php">Вийти</a>
    </div>
</body>
</html>