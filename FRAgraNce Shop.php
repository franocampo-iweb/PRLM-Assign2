<?php
declare(strict_types=1);

$price = 9500;
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

$products = [
    'Chanel Bleu de Chanel' => ['price' => 9500, 'stock' => 15],
    'Dior Sauvage' => ['price' => 4000, 'stock' => 8],
    'Creed Aventus' => ['price' => 15000, 'stock' => 5],
    'Tom Ford Oud Wood' => ['price' => 16000, 'stock' => 12],
    'Yves Saint Laurent Libre' => ['price' => 4000, 'stock' => 20],
    'Jo Malone London' => ['price' => 5000, 'stock' => 7],
    'Giorgio Armani Acqua di Giò' => ['price' => 3000, 'stock' => 9]
];

$tax_rate = 12; 

function get_reorder_message(int $stock): string {
    return ($stock < 10) ? 'Yes' : 'No';
}
function get_total_value(float $price, int $quantity): float {
    return $price * $quantity;
}
function get_tax_due(float $price, int $quantity, int $tax = 0): float {
    $total = $price * $quantity;
    return $total * ($tax / 100);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <title>FRAgraNce Shop</title>
    <link rel="stylesheet" href="styles.css?v=1">
    <style>
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: rgba(0,0,0,0.6);
            color: rgb(255, 166, 0);
            font-size: 1.2em;
        }
        th, td {
            border: 1px solid rgb(255, 166, 0);
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: rgba(0,0,0,0.8);
        }
    </style>
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
            echo "$i bottle(s) of perfume cost PHP " . number_format($price * $i, 2) . "<br>";
        }
        ?>
    </p>

    <h2>Stock Levels & Pricing</h2>
    <table>
        <tr>
            <th>Product</th>
            <th>Stock</th>
            <th>Re-order</th>
            <th>Total Value (PHP)</th>
            <th>Tax Due (PHP)</th>
        </tr>
        
        <?php foreach ($products as $product_name => $data):  #FOREACH LOOP ?>
            <tr>
                <td><?= htmlspecialchars($product_name) ?></td>
                <td><?= $data['stock'] ?></td>
                <td><?= get_reorder_message($data ['stock']) ?></td>
                <td><?= number_format(get_total_value($data['price'], $data['stock']), 2) ?></td>
                <td><?= number_format(get_tax_due($data['price'], $data['stock'], $tax_rate), 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php include 'includes/footer.php' ?>
</body>
</html>
