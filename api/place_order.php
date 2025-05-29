<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);

$customerName = $data['customer_name'];
$itemId = $data['item_id'];  // Now expecting item_id directly from the frontend
$quantity = $data['quantity'];

// Validate item ID exists in menu_items
$stmt = $pdo->prepare("SELECT name FROM menu_items WHERE id = ?");
$stmt->execute([$itemId]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    echo json_encode(['error' => 'Invalid item ID.']);
    http_response_code(400);
    exit;
}

// Insert order
$stmt = $pdo->prepare("INSERT INTO orders (customer_name, item_id, quantity, order_time) VALUES (?, ?, ?, NOW())");
$stmt->execute([$customerName, $itemId, $quantity]);

echo json_encode(['status' => 'success']);
?>
