<?php

include '../includes/database.php';

$next  = $_GET['next'];
$sql   = "SELECT * FROM answer WHERE question_id = :next";
$stmt  = $conn->prepare($sql);
$stmt->bindParam(':next', $next);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('location: home');
} else {
    $sql = "UPDATE question SET is_active = 0 WHERE id = :next";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':next', $next);
    $stmt->execute();

    $sql = "UPDATE question SET is_active = 1 WHERE id = :next + 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':next', $next);
    if ($stmt->execute()) {
        header('location: home');
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}