<?php

require_once __DIR__ . "/../includes/database.php";

// Define CRUD functions
function createQuestion($conn)
{
    $sql  = "INSERT INTO question (question) VALUES (:question)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':question', $_POST['question']);
    $stmt->execute();
}
function readQuestion($conn)
{
    $sql  = "SELECT * FROM question";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    require_once __DIR__ . "/views/read-question.php";
    return $questions;
}
function editQuestion($conn)
{
    $sql  = "SELECT * FROM question WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    require_once __DIR__ . "/views/edit-question.php";
    return $question;
}
function updateQuestion($conn)
{
    $sql  = 'UPDATE question SET question = :question WHERE id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':question', $_POST['question']);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
}
function deleteQuestion($conn)
{
    $sql  = "DELETE FROM question WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
}

// Mapping actions to functions
$actions = [
    'create' => 'createQuestion',
    'read'   => 'readQuestion',
    'edit'   => 'editQuestion',
    'update' => 'updateQuestion',
    'delete' => 'deleteQuestion',
];

// Initialize $action as an empty string by default
$action = '';

// Check the request method and get the appropriate parameter
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// Optionally sanitize the action
$action = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');

// Checks if a function with that name exists
if (array_key_exists($action, $actions)) {
    $function = $actions[$action];
    if (function_exists($function)) {
        $function($conn);
    }
}