<?php
require_once 'dbconfig/db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_ordered_item'){
    $id = $_POST['id'];
    $delete_query = "DELETE FROM orderitems WHERE id = :id;";
    $stmt = $pdo->prepare($delete_query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $stmt = null;
    $pdo = null;
    echo "<br>";
    echo "Deletion successfull";

}