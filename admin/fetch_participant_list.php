<?php include '../includes/conn.php'; ?>

<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

        <?php // fetch_participant_list.php
        $sql   = "SELECT * FROM participant ORDER BY id ASC";
        $query = $conn->query($sql);
        while ($participant = $query->fetch_assoc()) { ?>
            <div class="card mb-1">
                <div class="card-body">
                    <h5 class="card-title"><?= $participant['id'] . '. ' . $participant['fullname'] ?></h5>
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="col-2"></div>
</div>