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
    <a class="text-decoration-none text-dark ms-3" href="navigator">.</a>
    <main>
        <button class="btn btn-dark float-end me-5" id="toggleButton">View</button>
        <div class="container-md" id="participant-list">
            
        </div>
    </main>

    <script>
        let toggleState = true;
        document.getElementById("toggleButton").addEventListener("click", function() {
            const participantList = document.getElementById("participant-list");
            const url = toggleState ? 'fetch_participant_list.php' : 'fetch-no-name.php';
            fetch(url)
                .then(response => response.text())
                .then(data => participantList.innerHTML = data);
            toggleState = !toggleState;
        });
        setInterval(function() {
            const participantList = document.getElementById("participant-list");
            const url = toggleState ? 'fetch_participant_list.php' : 'fetch-no-name.php';
            fetch(url)
                .then(response => response.text())
                .then(data => participantList.innerHTML = data);
        }, 5000);
    </script>

    <!-- <script>
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

        setInterval(fetch_participant_list, 23000);
    </script> -->

</body>

</html>