<?php include '../includes/database.php'; ?>
<div class="row">
    <div class="col-2"></div>
    <div class="col-md-8 col-sm-12">
        <div id="participant-list">
        <?php
            $sql = "SELECT participant.id
                AS participant_id, participant.fullname,
                COUNT(CASE WHEN a.answer = q.correct_answer THEN 1 END) AS total_correct
                FROM participant participant
                LEFT JOIN answer a ON participant.id = a.participant_id
                LEFT JOIN question q ON a.question_id = q.id
                GROUP BY participant.id, participant.fullname
                ORDER BY total_correct DESC";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="card mb-1 shadow">
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title text-capitalize"><?= htmlspecialchars($row['fullname']) ?></h5>
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
