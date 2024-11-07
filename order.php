<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    $sql = "SELECT * FROM menu_items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if ($item) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$item_id])) {
            $_SESSION['cart'][$item_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$item_id] = array(
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $quantity
            );
        }

        echo "Item added to cart successfully.";
    } else {
        echo "Item not found.";
    }

    $stmt->close();
}

$conn->close();
?>
<br><a href="index.php">Return to Menu</a>
<br><a href="cart.php">View Cart</a>