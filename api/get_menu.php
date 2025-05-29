<?php
include 'db.php';
$stmt = $pdo->query("SELECT * FROM menu_items");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>