<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; }
        h1 { color: #333; }
        .menu-item { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
        .cart-link { float: right; }
    </style>
</head>
<body>
    <h1>Welcome to Our Food Ordering System</h1>
    <a href="cart.php" class="cart-link">View Cart</a>
    
    <?php
    require_once 'db_connection.php';
    
    $sql = "SELECT * FROM menu_items";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='menu-item'>";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>Price: $" . number_format($row['price'], 2) . "</p>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<form action='order.php' method='post'>";
            echo "<input type='hidden' name='item_id' value='" . $row['id'] . "'>";
            echo "<input type='number' name='quantity' value='1' min='1'>";
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "No menu items available at the moment.";
    }
    
    $conn->close();
    ?>
</body>
</html>