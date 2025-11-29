<?php
$price = 3000;
$ethanol = ['85–95%', '70–85%', '80–90%', '80–90%'];
$perfume = "Chanel Bleu de Chanel";

switch ($perfume) { #SWITCH CASE
    case 'Chanel Bleu de Chanel':
        $ethanolMessage = "Chanel Bleu de Chanel has $ethanol[0] of ethanol";
        break;
    case 'Dior Sauvage':
        $ethanolMessage = "Dior Sauvage has $ethanol[1] of ethanol";
        break;
    case 'Creed Aventus':
        $ethanolMessage = "Creed Aventus has $ethanol[2] of ethanol";
        break;
    case 'Tom Ford Oud Wood':
        $ethanolMessage = "Tom Ford Oud Wood has $ethanol[3] of ethanol";
        break;
    default:
        $ethanolMessage = "Buy 3 Get 1 for Free";
}

$bottles = 5;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <title>FRAgraNce Shop</title>
        </head>
    <body>
        <h1>FRAgraNce Shop</h1>
        <h2>Ethanol (Alcohol) per Perfume</h2>
        <p>
            <?php 

            if (isset($ethanolMessage)) { #IF-ELSE
                echo $ethanolMessage;
            } else {
                echo "Information not available.";
            }
            ?>
        </p>

        <h2>Price of Selected Perfume</h2>
        <p>
            <?php 

            for ($i = 1; $i <= $bottles; $i++) { #FOR LOOP
                echo "$i bottle(s) of perfume cost PHP " . ($price * $i) . "<br>";
            }
            ?>
        </p>
    </body>
        <?php include 'includes/footer.php' ?>
</html>
