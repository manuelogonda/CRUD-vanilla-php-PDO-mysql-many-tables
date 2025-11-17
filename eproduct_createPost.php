<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   $product_name = $_POST['name'];
   $product_price = $_POST['price'];
   $category_name = $_POST['category_name'];
   $supplier_name = $_POST['supplier_name'];

   $insert_query = "INSERT INTO ;";
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
    <form action="$_POST['PHP_SELF']" method="post">
        <input type="text" name="name">
        <input type="number" name="price">
        <input type="text" name="category_name" >
        <input type="text" name="supplier_name" >
        <button type="submit">Create Product</button>
    </form>
</body>
</html>