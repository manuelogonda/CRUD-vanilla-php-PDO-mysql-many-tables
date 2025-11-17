<?php
 require_once 'dbconfig/db.php';
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 $name = $_POST['supplier_name'];
 $email = $_POST['contact_email'];

 $insert_query = "INSERT INTO suppliers 
                 (supplier_name,contact_email) VALUES(:name,:email);";
      $stmt = $pdo->prepare($insert_query);  
      $stmt->bindParam(":name",$name);
      $stmt->bindParam(":email",$email);
      $stmt->execute();
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
 </head>
 <body>
    <form action="esupplier_create.php" method="POST">
        <label for="name">Supplier Name</label>
        <input type="text" name="supplier_name" > <br> <br>
        <label for="email">Contact Email</label>
        <input type="email" name="contact_email"> <br><br>
        <button type="submit">Add Supplier</button>
    </form>
 </body>
 </html>