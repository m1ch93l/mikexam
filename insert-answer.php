<?php 
include 'includes/session.php';
include 'includes/conn.php';

if (isset($_POST['submit'])) {
    $participant = $_SESSION['participant'];
    $question_id = $_POST['question_id'];
    $answer = $_POST['answer'];
    $sql = "SELECT * FROM answer WHERE participant_id = '$participant' AND question_id = '$quesion_id'";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
        header('location: home');
    } else {
        
        $sql = "INSERT INTO answer (participant_id, question_id, answer) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $participant, $question_id, $answer);
        if ($stmt->execute()) {
            // Redirect to avoid resubmission
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
