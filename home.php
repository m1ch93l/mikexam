<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body>
    <header class="bg-dark py-3 text-white text-center">
        mikexam
        <a href="logout" type="button"
            class="text-decoration-none text-white float-end h6 me-3 border p-1 text-capitalize">logout</a>
    </header>
    <div class="container-md">
        <h5 class="text-center text-capitalize mb-1">Welcome, <?= $_SESSION['fullname'] ?></h5>
        <?php
        $sql  = "SELECT * FROM question WHERE is_active = 1 ORDER BY id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $answered = [];
        $sql      = "SELECT question_id FROM answer WHERE participant_id = :participant";
        $stmt     = $conn->prepare($sql);
        $stmt->bindParam(':participant', $_SESSION['participant']);
        $stmt->execute();
        $answered = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach ($questions as $question) {
            if (!in_array($question['id'], array_column($answered, 'question_id'))) { ?>
                <h4 class="text-center text-capitalize mb-2"><?= $question['id'] ?>. <?= $question['question'] ?></h4>

                <?php require_once 'picture.php'; ?>

                <form action="crud" method="post">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <input type="hidden" name="question_id" value="<?= $question['id'] ?>">
                        <div class="col">
                            <input type="radio" class="btn-check mx-auto mb-3 text-uppercase" value="a" id="btnradio1"
                                name="answer">
                            <label class="btn btn-primary btn-lg d-block mx-auto" for="btnradio1"
                                onclick="changeColor(this)">A</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check mx-auto mb-3 text-uppercase" value="b" id="btnradio2"
                                name="answer">
                            <label class="btn btn-success btn-lg d-block mx-auto" for="btnradio2"
                                onclick="changeColor(this)">B</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check mb-3 text-uppercase" value="c" id="btnradio3" name="answer">
                            <label class="btn btn-danger btn-lg d-block mx-auto d-block" for="btnradio3"
                                onclick="changeColor(this)">C</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check mb-3 text-uppercase" value="d" id="btnradio4" name="answer"
                                onclick="changeColor(this)">
                            <label class="btn btn-info btn-lg d-block mx-auto d-block" for="btnradio4"
                                onclick="changeColor(this)">D</label>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" name="insert-answer" class="btn btn-dark btn-lg">Submit</button>
                    </div>
                </form>
            <?php } else { ?>
                <h4 class="text-center text-capitalize mb-2"><?= $question['id'] ?>. <?= $question['question'] ?></h4>
                <p class="text-center">You have already answered this question</p>
            <?php } ?>
        <?php } ?>
    </div>
    <script>
        let clicked = false;
        function changeColor(element) {
            if (!clicked) {
                element.style.backgroundColor = "#F7DC6F";
                clicked = true;
                setTimeout(function () {
                    clicked = false;
                }, 500);
            }
        }
        let buttons = document.querySelectorAll(".btn");
        buttons.forEach(button => {
            button.addEventListener("click", function () {
                buttons.forEach(btn => {
                    if (btn != button) {
                        btn.style.backgroundColor = "";
                    }
                });
            });
        });
    </script>
</body>

</html>