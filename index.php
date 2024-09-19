<?php //echo password_hash("amasco2023", PASSWORD_BCRYPT);
session_start();
if (isset($_SESSION['admin'])) {
    header('location: admin/home');
}

if (isset($_SESSION['participant'])) {
    header('location: home');
}
?>

<body>
    
</body>
</html>