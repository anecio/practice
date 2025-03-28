<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu = [
        "Cappuccino" => 2.00,
        "Espresso" => 2.25,
        "Latte" => 1.75,
        "Iced Cappuccino" => 2.50,
        "Iced Latte" => 2.50
    ];
    
    $item = $_POST['item'];
    $quantity = intval($_POST['quantity']);
    $orderType = $_POST['order_type'];
    
    $price = $menu[$item];
    $totalAmount = $price * $quantity;
    
    if ($orderType == "Take out") {
        $tax = $totalAmount * 0.12;
        $totalAmount += $tax;
    }
    
    echo "<h2>Order Summary</h2>";
    echo "Item: $item<br>";
    echo "Quantity: $quantity<br>";
    echo "Order Type: $orderType<br>";
    echo "Total Amount: $" . number_format($totalAmount, 2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Item Order</title>
</head>
<body>
    <h2>Place Your Order</h2>
    <form method="post">
        <label for="item">Select Item:</label>
        <select name="item" required>
            <option value="Cappuccino">Cappuccino - $2.00</option>
            <option value="Espresso">Espresso - $2.25</option>
            <option value="Latte">Latte - $1.75</option>
            <option value="Iced Cappuccino">Iced Cappuccino - $2.50</option>
            <option value="Iced Latte">Iced Latte - $2.50</option>
        </select>
        <br><br>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" min="1" required>
        <br><br>
        
        <label>Order Type:</label>
        <input type="radio" name="order_type" value="Dine in" required> Dine In
        <input type="radio" name="order_type" value="Take out" required> Take Out
        <br><br>
        
        <input type="submit" value="Submit Order">
    </form>
</body>
</html>
