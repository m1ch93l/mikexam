<form hx-post="crud.php?action=update">
    <label class="form-label">Question</label>
    <div class="input-group input-group-sm">
        <input type="hidden" name="id" value="<?= $question['id'] ?>">
        <!-- this edit the question -->
        <textarea rows="4" class="form-control" name="question"><?= $question['question'] ?></textarea>
    </div>
    <label class="form-label mt-2">Correct Answer</label><br>
    <!-- this edit the correct letter/answer -->
    <input type="text" class="form-control text-uppercase" name="correct_answer" value="<?= $question['correct_answer'] ?>">
    <button class="btn btn-sm btn-dark mt-2" data-bs-dismiss="modal">Okay</button>
</form>