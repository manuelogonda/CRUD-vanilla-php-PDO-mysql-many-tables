<?php
require_once 'dbconfig/db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $order_id = $_POST['order_id'];
  $product_id = $_POST['product_id'];
  $quantity = $_POST['quantity'];
  $price_at_sale = $_POST['price_at_sale'];

  $insert_query = "INSERT INTO orderitems 
                  (order_id,product_id,quantity,price_at_sale) 
                  VALUES (:o_id,:p_id,:quantity,:priceatsale);";
    $stmt = $pdo->prepare($insert_query);
    $stmt->bindParam(":o_id",$order_id);
    $stmt->bindParam(":p_id",$product_id);
    $stmt->bindParam(":quantity",$quantity);
    $stmt->bindParam(":priceatsale",$price_at_sale);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an OrderItem</title>
</head>
<body>
     <a href="show_ordereditems.php"><button type="button">Go Back-></button></a>
    <h2>Create an OrderItem</h2>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <label for="order_id">Order Number:</label>
        <input type="number" name="order_id" > <br><br>
        <label for="product_id">Product Number:</label>
        <input type="number" name="product_id" > <br><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" > <br><br>
        <label for="price_at_sale">Price at sale:</label>
        <input type="number" name="price_at_sale" >
        <button type="submit">Order Item</button>
    </form>
</body>
</html>