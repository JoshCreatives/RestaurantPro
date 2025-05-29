<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$stmt = $pdo->prepare("INSERT INTO menu_items (name, price) VALUES (?, ?)");
$stmt->execute([$data['name'], $data['price']]);
echo json_encode(['status' => 'added']);
?>