<?php
require_once 'dbconfig/db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   $product_name = $_POST['name'];
   $product_price = $_POST['price'];
   $product_decsription = $_POST['description'];
   $supplier_id = $_POST['supplier_id'];
   $category_id = $_POST['category_id'];

   $insert_query = "INSERT INTO products (name,price,description,category_id,supplier_id)
           VALUES(:productname,:price,:description,:categoryid,:supplierid);";
    $stmt = $pdo->prepare($insert_query);
    $stmt->bindParam(":productname",$product_name);
    $stmt->bindParam(":price",$product_price);
    $stmt->bindParam(":description",$product_decsription);
    $stmt->bindParam(":supplierid",$supplier_id);
    $stmt->bindParam(":categoryid",$category_id);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product Inventory</title>
</head>
<body>
    <form action="eproduct_create.php" method="POST">
        <label for="productname">Product Name</label>
        <input type="text" name="name"> <br><br>
        <label for="price">Price</label>
        <input type="number" name="price"> <br><br>
        <label for="description">Description</label>
        <textarea name="description"></textarea> <br><br>
        <label for="supplierid">Supplier ID</label>
        <input type="number" name="supplier_id"> <br><br>
        <label for="categoryid">Category ID</label>
        <input type="number" name="category_id"> <br><br>
        <button type="submit">Create Product</button>
    </form>
</body>
</html>