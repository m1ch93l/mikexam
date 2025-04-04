<?php
session_start();
include '../includes/database.php';

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
    <div class="container">
        <div class="row">

            <div class="col-8 text-center text-uppercase">
                <?php
                $sql  = "SELECT * FROM question WHERE is_active = 1 ORDER BY id ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($questions as $question) { ?>
                    <div style="position: absolute; left: 40%; top: 45%; transform: translate(-30%, -50%);">
                        <a href="next.php?next=<?= $question['id'] ?>"
                            class="btn btn-primary btn-lg mx-5 text-capitalize">next
                            #<?= $question['id'] + 1 ?></a>
                    </div>
                    <script>
                        setTimeout(function () {
                            var audio = new Audio('timesup.m4a');
                            audio.play();
                        }, 23000);
                    </script>
                <?php } ?>
            </div>

        </div>
    </div>
</body>