<div>
    <?php
    include 'includes/session.php';
    $sql  = "UPDATE participant SET check_status = CASE WHEN check_status = 0 THEN 1 ELSE 0 END WHERE id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_GET['participant']);
    $stmt->execute();

    header('location: home.php');
    ?>

</div>