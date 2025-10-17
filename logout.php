<?php include 'includes/database.php';
session_start();
session_destroy();

$qry  = "UPDATE participant SET check_status = 0 WHERE id = $_SESSION[participant]";
$stmt = $conn->prepare($qry);
$stmt->execute();

header('location: index');
?>