<?php
require_once 'dbconfig/db.php';
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['category_name'];
    $insert_query = "INSERT INTO categories (category_name)
                      VALUES (:name);";
    $stmt = $pdo->prepare($insert_query);
    $stmt->bindParam(":name",$name);
    $stmt->execute();

 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add categories</title>
 </head>
 <body>
    <form action="ecategory_create.php" method="POST">
        <label for="category name">Category Name</label>
        <input type="text" name="category_name">
        <button type="submit">Add category</button>
    </form>
 </body>
 </html>