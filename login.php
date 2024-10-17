<?php
session_start();
include 'includes/database.php';

if (isset($_POST['login'])) {
    $participant    = $_POST['participant'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM participant WHERE participant_id = :participant";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':participant', $participant);
    $stmt->execute();

    if ($stmt->rowCount() < 1) {
        $_SESSION['error'] = 'Cannot find account with the username';
    } else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['password'] == $password) {
            $_SESSION['participant'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            header('location: home');
        } else {
            $_SESSION['error'] = 'Incorrect password';
        }
    }

    $sql   = "SELECT * FROM admin WHERE username = :participant";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':participant', $participant);
    $stmt->execute();

    if ($stmt->rowCount() < 1) {
        $_SESSION['error'] = 'Cannot find account with the username';
    } else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $row['id'];
            header('location: admin');
        } else {
            $_SESSION['error'] = 'Incorrect password';
        }
    }

} else {
    $_SESSION['error'] = 'Input voter credentials first';
}

header('location: index');