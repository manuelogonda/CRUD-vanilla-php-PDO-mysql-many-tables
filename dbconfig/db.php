<?php 
$dbname = "ecommerce_db";
$username = "root";
$password = "";
$host = "localhost";

try{
$pdo = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo "Connected proceed to the next logic!";
}catch(PDOException $e){
    echo "Connection Failed!" . $e->getMessage();
}