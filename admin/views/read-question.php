<?php

foreach ($questions as $question) : ?>
    <tr>
        <td class="text-center"><?= $question['question'] ?? '' ?></td>
        <td class="text-center text-capitalize"><?= $question['correct_answer'] ?? '' ?></td>
        <td class="text-center"><!-- e-click para sa lumabas ang modal -->
            <button hx-get="crud.php?action=edit&id=<?= $question['id'] ?>" hx-target="#modalBody" hx-trigger="click"
                hx-swap="innerHTML" data-bs-toggle="modal" data-bs-target="#showEachCard" class="btn btn-sm btn-success">
                Edit
            </button>
            <button class="btn btn-sm btn-danger" hx-get="crud.php?action=delete&id=<?= $question['id'] ?>&inline=1">
                Delete
            </button>
        </td>
    </tr>
<?php endforeach;