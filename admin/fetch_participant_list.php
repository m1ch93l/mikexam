<?php include '../includes/database.php'; ?>
<div class="row">
    <div class="col-2"></div>
    <div class="col-md-8 col-sm-12">
        <div id="participant-list">
            <?php
            $sql  = "SELECT par.id, par.fullname, (SELECT COUNT(*) FROM (SELECT q.id as question_id, q.correct_answer, a.answer as answer, par2.id as part_id 
              FROM question q 
              LEFT JOIN answer a ON q.id = a.question_id 
              LEFT JOIN participant par2 ON a.participant_id = par2.id
              WHERE par2.id = par.id) as latest_result WHERE latest_result.answer = latest_result.correct_answer) as total_correct
              FROM participant par ORDER BY total_correct DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $query = $conn->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="card mb-1 shadow">
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title text-capitalize"><?= $row['fullname'] ?></h5>
                        <h5 class="me-3">Total correct answers: <?= $row['total_correct'] ?></h5>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-2"></div>
</div>

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

    setInterval(fetch_participant_list, 5000);
</script>
