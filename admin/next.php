<?php

include '../includes/database.php';

$next = $_GET['next'];

$sql  = "UPDATE question SET is_active = 0 WHERE id = :next";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':next', $next);
$stmt->execute();

$sql  = "UPDATE question SET is_active = 1 WHERE id = :next + 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':next', $next);
if ($stmt->execute()) {
    header('location: navigator');
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}