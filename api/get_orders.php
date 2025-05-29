<?php
include 'db.php';

try {
    $stmt = $pdo->query("
        SELECT 
            orders.id,
            orders.customer_name,
            orders.item_id,
            orders.quantity,
            orders.order_time,
            COALESCE(menu_items.name, CONCAT('Unknown Item (ID: ', orders.item_id, ')')) AS item_name
        FROM orders
        LEFT JOIN menu_items ON orders.item_id = menu_items.id
        ORDER BY orders.order_time DESC
    ");

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($data);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
}
?>
