<?php
require_once 'dbconfig/db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $Insert_query = "INSERT INTO users (username,email) VALUES(:name,:email);";
    $stmt = $pdo->prepare($Insert_query);
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
    <title>Create a user</title>
</head>
<body>
     <a href="show_ordereditems.php"><button type="button">Go Back</button></a>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="fullname">Fullname</label>
         <input type="text" name="name">
         <label for="email">E-mail</label>
         <input type="email" name="email">
         <button type="submit">Add User</button>
    </form>
</body>
</html>