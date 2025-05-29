<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$orderId = $data['id'];

$stmt = $pdo->prepare("DELETE FROM orders WHERE id = ?");
$stmt->execute([$orderId]);

echo json_encode(['status' => 'deleted']);
?>
