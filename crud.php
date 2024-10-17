<?php

session_start();
require_once 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // for registration of participant
    if (isset($_POST['register'])) {
        $participant = $_POST['participant'];
        $password    = $_POST['password'];
        $name        = $_POST['name'];

        $sql  = "INSERT INTO participant (participant_id, password, fullname) VALUES (:participant, :password, :name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':participant', $participant);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name', $name);

        if ($stmt->execute()) {
            header('location: index');
        } else {
            $_SESSION['error'] = 'Registration failed';
        }

    } else {
        $_SESSION['error'] = 'Input voter credentials first';
    }

    // for login of participant
    if (isset($_POST['login'])) {
        $participant = $_POST['participant'];
        $password    = $_POST['password'];

        $sql  = "SELECT * FROM participant WHERE participant_id = :participant";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':participant', $participant);
        $stmt->execute();

        if ($stmt->rowCount() < 1) {
            $_SESSION['error'] = 'Cannot find account with the username';
        } else {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['password'] == $password) {
                $_SESSION['participant'] = $row['id'];
                $_SESSION['fullname']    = $row['fullname'];
                header('location: home');
            } else {
                $_SESSION['error'] = 'Incorrect password';
            }
        }

        $sql  = "SELECT * FROM admin WHERE username = :participant";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':participant', $participant);
        $stmt->execute();

        if ($stmt->rowCount() < 1) {
            $_SESSION['error'] = 'Cannot find account with the username';
        } else {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin'] = $row['id'];
                header('location: admin/home');
            } else {
                $_SESSION['error'] = 'Incorrect password';
            }
        }

    } else {
        $_SESSION['error'] = 'Input voter credentials first';
    }

    // insert answer from participant
    if (isset($_POST['insert-answer'])) {
        $participant = $_SESSION['participant'];
        $quesion_id  = $_POST['question_id'];
        $answer      = $_POST['answer'];
        $sql         = "SELECT * FROM answer WHERE participant_id = :participant AND question_id = :quesion_id";
        $stmt        = $conn->prepare($sql);
        $stmt->bindParam(':participant', $participant);
        $stmt->bindParam(':quesion_id', $quesion_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header('location: home');
        } else {

            $sql  = "INSERT INTO answer (participant_id, question_id, answer) VALUES (:participant, :quesion_id, :answer)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':participant', $participant);
            $stmt->bindParam(':quesion_id', $quesion_id);
            $stmt->bindParam(':answer', $answer);

            if ($stmt->execute()) {
                header('location: home');
            } else {
                echo "Error: " . $sql . "<br>" . $stmt->errorInfo()[2];
            }
        }
    }


}

