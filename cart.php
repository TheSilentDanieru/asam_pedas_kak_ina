<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Your Cart</h1>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<table>";
        echo "<tr><th>Item</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
            echo "<tr>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>$" . number_format($item['price'], 2) . "</td>";
            echo "<td>" . $item['quantity'] . "</td>";
            echo "<td>$" . number_format($subtotal, 2) . "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>$" . number_format($total, 2) . "</strong></td></tr>";
        echo "</table>";
        echo "<p><a href='#'>Proceed to Checkout</a></p>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
    <p><a href="index.php">Return to Menu</a></p>
</body>
</html>