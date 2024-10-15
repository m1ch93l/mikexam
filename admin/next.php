<?php

include '../includes/conn.php';

$next  = $_GET['next'];
$sql   = "SELECT * FROM answer WHERE question_id = '$quesion_id'";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
    header('location: home');
} else {
    $sql = "UPDATE question SET is_active = 0 WHERE id = '$next'";
    $conn->query($sql);
    $sql = "UPDATE question SET is_active = 1 WHERE id = '$next' + 1";
    if ($conn->query($sql) === TRUE) {

        header('location: home');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}