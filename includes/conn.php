<?php
$conn = new mysqli('localhost', 'root', '', 'mikexam');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>