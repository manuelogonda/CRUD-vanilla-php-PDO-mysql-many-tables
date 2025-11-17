<?php
require_once 'dbconfig/db.php';
$products = [];
try {
  $products_category_supplier_join_query = "
    SELECT 
       p.id,
       p.name,
       p.price,
       c.category_name AS category_name,
       s.supplier_name AS supplier_name
FROM Products AS p 
 INNER JOIN categories AS c
 ON p.category_id = c.category_id
 INNER JOIN suppliers AS s
 ON p.supplier_id = s.supplier_id
 ORDER BY p.id
;";
  $stmt = $pdo->prepare($products_category_supplier_join_query);
  $stmt->execute();
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<br>";
  print_r($products);
} catch (PDOException $e) {
  die("Error fetching products:" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products_category_supplier</title>
</head>

<body>
  <h1>Product Inventory</h1>
  <a href="eproduct_createPost.php" ><button type="button">Create New Product</button></a>
  <?php if (empty($products)) : ?>
    <p>Product not found</p>
  <?php else: ?>
    <table>
      <thead>
        <th>id</th>
        <th>name</th>
        <th>price</th>
        <th>category_name</th>
        <th>supplier_name</th>
        <th>Actions</th>
      </thead>
      <?php foreach ($products as $product): ?>
        <tbody>
          <tr>
            <td><?= htmlspecialchars($product['id']); ?></td>
            <td><?= htmlspecialchars($product['name']); ?></td>
            <td><?= htmlspecialchars($product['price']); ?></td>
            <td><?= htmlspecialchars($product['category_name']); ?></td>
            <td><?= htmlspecialchars($product['supplier_id']); ?></td>
            <td>
              <form action="edelete.php" method="post">
                <input type="hidden" name="">
                <button type="submit">Delete</button>
              </form>
              <br>
              <form action="eupdate.php" method="post">
                <input type="hidden" name="">
                <button type="submit">Edit</button>
              </form>
            </td>
          </tr>
        </tbody>
      <?php endforeach; ?>
    </table>
  <?php endif ?>
</body>

</html>