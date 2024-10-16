<?php
include 'includes/session.php';
include 'includes/conn.php';

if (isset($_POST['submit'])) {
    $participant = $_SESSION['participant'];
    $quesion_id  = $_POST['question_id'];
    $answer      = $_POST['answer'];
    $sql         = "SELECT * FROM answer WHERE participant_id = '$participant' AND question_id = '$quesion_id'";
    $query       = $conn->query($sql);
    if ($query->num_rows > 0) {
        header('location: home');
    } else {

        $sql = "INSERT INTO answer (participant_id, question_id, answer) VALUES ('$participant', '$quesion_id', '$answer')";
        if ($conn->query($sql) === TRUE) {
            header('location: home');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
