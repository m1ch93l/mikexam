<?php

include '../includes/database.php';

$query = "UPDATE question SET is_active = CASE WHEN id = 1 THEN 1 ELSE 0 END";
$stmt  = $conn->prepare($query);
$stmt->execute();

header("Location: navigator");

?>