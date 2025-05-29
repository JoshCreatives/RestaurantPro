<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);

$orderId = $data['id'];
$newQuantity = $data['quantity'];

$stmt = $pdo->prepare("UPDATE orders SET quantity = ? WHERE id = ?");
$stmt->execute([$newQuantity, $orderId]);

echo json_encode(['status' => 'updated']);
?>
