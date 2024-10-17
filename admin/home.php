<?php
session_start();
include '../includes/database.php';

if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '') {
    header('location: index');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>mikexam</title>
    <!-- tab icon -->
    <link rel="shortcut icon" href="">
    <!-- bootstrap ui -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="../bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="bg-dark py-3 text-white text-center mb-2">
        mikexam
        <a href="logout" type="button"
            class="text-decoration-none text-white float-end h6 me-3 border p-1 text-capitalize">logout</a>
    </header>
    <main>
        <?php
        $sql       = "SELECT * FROM question WHERE is_active = 1 ORDER BY id ASC";
        $stmt      = $conn->prepare($sql);
        $stmt->execute();
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($questions as $question) { ?>
            <a href="next.php?next=<?= $question['id'] ?>" class="btn btn-primary btn-lg mx-5 text-capitalize">next
                #<?= $question['id'] + 1 ?></a>
            <script>
                setTimeout(function() {
                    var audio = new Audio('timesup.m4a');
                    audio.play();
                }, 20000);
            </script>
        <?php } ?>

        <div class="container-md" id="participant-list">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    
                </div>
                <div class="col-2"></div>
            </div>
        </div>
        </div>
    </main>

    <script>
        function fetch_participant_list() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("participant-list").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "fetch_participant_list.php", true);
            xhttp.send();
        }

        setInterval(fetch_participant_list, 1000);
    </script>

</body>

</html>