<?php
require_once 'dbconfig/db.php';
//Whe displaying data using a join query always 
//update or delete from the table with the foreign keys of the other tables used with it[parent table] in a join
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_product'){
   $id = $_POST['id'];
    
   $delete_query = "DELETE FROM products WHERE id = :id;";
   $stmt = $pdo->prepare($delete_query);
   $stmt->bindParam(":id",$id);
   $stmt->execute();
   $pdo = null;
   $stmt = null;
}