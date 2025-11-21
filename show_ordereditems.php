<?php
require_once 'dbconfig/db.php';
$ordered_Items = [];

$select_query = "
SELECT
    Oi.id AS Oder_item_id,
    Oi.quantity AS ordered_item_quantity,
    Oi.price_at_sale,
    o.id AS order_id,
    o.order_date,
    o.total_amount,
    p.id AS product_id,
    p.price AS product_price,
    p.name AS product_name
FROM  OrderItems Oi
INNER JOIN products p 
ON p.id = Oi.product_id
INNER JOIN orders o 
ON o.id = Oi.order_id;";

$stmt = $pdo->prepare($select_query);
$stmt->execute();
$ordered_Items = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt= null;
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordered Items Catalogue</title>
</head>
<body>
    <br>
    <a href="euser_create.php"><button >Save your slot</button></a>
    <br><br>
    <a href="eproduct_create.php"><button >Add a product</button></a>
    <br><br>
    <a href="eorder_create.php"><button >Place an Order</button></a>
    <br><br>
    <a href="eitem_create.php"><button >Add Item to order list</button></a>
    <?php if(empty($ordered_Items)): ?>
        <p>No such Ordered Item</p>
    <?php else: ?>
        <h2>Ordered Items Catalogue</h2>
        <table>
            <tr>
                <thead>
                    <th>Oder_item_id</th>
                    <th>ordered_item_quantity</th>
                    <th>price_at_sale</th>
                    <th>order_id</th>
                    <th>order_date</th>
                    <th>total_amount</th>
                    <th>product_id</th>
                    <th>product_price</th>
                    <th>product_name</th>
                    <th>Actions</th>
                </thead>
            </tr>
            <tbody>
                <?php foreach($ordered_Items as $ordered_Item): ?>
                <tr>
                    <td><?= htmlspecialchars($ordered_Item['Oder_item_id']) ?></td>
                    <td><?= htmlspecialchars($ordered_Item['ordered_item_quantity']) ?></td>
                    <td><?= htmlspecialchars($ordered_Item['price_at_sale']) ?></td>
                    <td><?= htmlspecialchars($ordered_Item['order_id']) ?></td>
                    <td><?= htmlspecialchars($ordered_Item['order_date']) ?></td>
                    <td><?= htmlspecialchars($ordered_Item['total_amount']) ?></td>
                    <td><?= htmlspecialchars($ordered_Item['product_id']) ?></td>
                    <td><?= htmlspecialchars($ordered_Item['product_price']) ?></td>
                    <td><?= htmlspecialchars($ordered_Item['product_name']) ?></td>
                    <td>
                        <form action="delete_ordered_item.php" method="POST" onsubmit="return confirm('Be sure to delete this ordered item')">
                           <input type="hidden" name="action" value="delete_ordered_item">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($ordered_Item['Oder_item_id']) ?>">
                            <button type="submit">Delete Item</button>
                        </form>

                        <form action="update_ordered_item" method="POST">
                            <input type="hidden" name="action" value="edit_ordered_item">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($ordered_Item['Oder_item_id']) ?>">
                            <button type="submit">Edit Item</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
</body>
</html>