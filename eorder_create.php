<?php
require_once 'dbconfig/db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $user_id = $_POST['user_id'];
  $amount = $_POST['amount'];
  $insert_query = "INSERT INTO orders (user_id,total_amount) VALUES(:id,:amount);";
   $stmt = $pdo->prepare($insert_query);
   $stmt->bindParam(":id",$user_id);
   $stmt->bindParam(":amount",$amount);
   $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New order</title>
</head>
<body>
    <a href="show_ordereditems.php"><button type="button">Go Back</button></a>
    <h1>Place a new order</h1>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="user_id">User Id:</label>
        <input type="number" name="user_id">
        <label for="amount">Amount</label>
        <input type="number" name="amount">
        <button type="submit">Order</button>
    </form>
</body>
</html>