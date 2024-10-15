<?php
session_start();
include 'includes/conn.php';

if (isset($_POST['register'])) {
    $participant = $_POST['participant'];
    $password    = $_POST['password'];
    $name    = $_POST['name'];

    $sql = "INSERT INTO participant (participant_id, password, fullname) VALUES ('$participant', '$password', '$name')";
    if ($conn->query($sql) === TRUE) {
        header('location: index');
    }

} else {
    $_SESSION['error'] = 'Input voter credentials first';
}

//header('location: index');