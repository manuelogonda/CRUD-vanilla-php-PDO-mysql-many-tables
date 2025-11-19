<?php
require_once 'dbconfig/db.php';
$product = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'edit_product') {
        $id = $_POST['id'];
        $fetch_query = "SELECT * FROM products WHERE id = :id;";
        $stmt = $pdo->prepare($fetch_query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            die("Product unavailable try again!");
        }
    } else if (isset($_POST['update']) && $_POST['update'] === 'update_product') {
        $id = $_POST['id'];
        $new_name = $_POST['new_name'];
        $new_description = $_POST['new_description'];

        if (empty($new_name) || empty($new_description)) {
            die("Fields cannot be empty!");
        }
        $update_query = "UPDATE products 
        SET name = :name, 
        description = :description
        WHERE id = :id;";
        $stmt = $pdo->prepare($update_query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $new_name);
        $stmt->bindParam(":description", $new_description);
        $stmt->execute();

        echo "<br>";
        echo "The update was successfull!";
        echo "<br>";
        $stmt = null;
        $pdo = null;
        die("");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
</head>

<body>
    <h1>Do the Update</h1>
    <?php if (!empty($product)): ?>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input type="hidden" name="update" value="update_product">
            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
            <label for="name">New Name</label>
            <input type="text" name="new_name"><br><br>
            <label for="description">New Description</label>
            <textarea name="new_description"></textarea>
            <button type="submit">Update</button>
        </form>
    <?php endif; ?>
</body>

</html>