<form hx-post="crud.php?action=update">
    <div class="input-group input-group-sm">
        <input type="hidden" name="id" value="<?= $question['id'] ?>">
        <textarea rows="4" class="form-control" name="question"><?= $question['question'] ?></textarea>
    </div>
    <button class="btn btn-sm btn-dark mt-2" data-bs-dismiss="modal">Okay</button>
</form>