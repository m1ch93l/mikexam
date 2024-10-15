<?php include '../includes/conn.php'; ?>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <?php
        $sql   = "SELECT par.id, par.fullname, (SELECT COUNT(*) FROM (SELECT q.id as question_id, q.correct_answer, a.answer as answer, par2.id as part_id 
          FROM question q 
          LEFT JOIN answer a ON q.id = a.question_id 
          LEFT JOIN participant par2 ON a.participant_id = par2.id
          WHERE par2.id = par.id) as latest_result WHERE latest_result.answer = latest_result.correct_answer) as total_correct
          FROM participant par";
        $query = $conn->query($sql);
        while ($row = $query->fetch_assoc()) { ?>
            <div class="card mb-1">
                <div class="card-body">
                    <h5 class="card-title"><?=$row['fullname'] ?> Total correct answers: <?= $row['total_correct'] ?></h5>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="col-2"></div>
</div>