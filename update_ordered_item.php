<?php
require_once 'dbconfig/db.php';
$ordered_item = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
    if(isset($_POST['action']) && $_POST['action'] === 'edit_ordered_item'){
      $id = $_POST['id'];
      $fetch_query = "SELECT * FROM orderitems WHERE id =:id;";
      $stmt = $pdo->prepare($fetch_query );
      $stmt->bindParam(":id",$id);
      $stmt->execute();
      $ordered_item = $stmt->fetch(PDO::FETCH_ASSOC);

      if(empty($ordered_item)){
        echo "No such ordered_item";
      }

    }else if(isset($_POST['action']) && $_POST['action'] === 'update_ordered_item'){
       $id = $_POST['id'];
       $quantity = $_POST['quantity'];
       $p_a_t = $_POST['price_at_sale'];
       $update_query = "UPDATE orderitems SET quantity = :quantity,price_at_sale = :p_a_t WHERE id =:id;";
       $stmt = $pdo->prepare( $update_query);
       $stmt->bindParam(":id",$id);
       $stmt->bindParam(":quantity",$quantity);
       $stmt->bindParam(":p_a_t",$p_a_t);
       $stmt->execute();

       echo "Update was successfull";

       $stmt = null;
       $pdo = null;

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update ordered_item</title>
</head>
<body>
    <a href="show_ordereditems.php"><button type="button">Go back</button></a>
    <?php if(!empty($ordered_item)): ?>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input type="hidden" name="action" value="update_ordered_item">
            <input type="hidden" name="id" value="<?= htmlspecialchars($ordered_item['id']) ?>">
            <label for="quantity">Update Quantity</label> 
            <input type="number" name="quantity"><br> <br>
            <label for="priceatsale">Update Price</label> 
            <input type="number" name="price_at_sale"><br> <br>
            <button type="submit">Update</button>
        </form>
    <?php endif; ?>
</body>
</html>