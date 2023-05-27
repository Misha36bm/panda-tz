<tr>
    <td>
        <h3 class="text-primary"><?= $quiz->quiz_title ?></h3>
    </td>
    <td>
        <input type="checkbox" <?= $quiz->is_showed ? 'checked' : ''  ?> class="is-quiz-showed-status" data-quiz-id="<?= $quiz->id ?>">
    </td>
    <td>
        <?= $quiz->created_at ?>
    </td>
    <td>
        <div class="d-flex justify-content-center">
            <?= view('components.admin.quiz-edit-modal', ['quiz' => $quiz]) ?>

            <form class="ms-3" action="/delete-quiz/<?= $quiz->id ?>" method="post" onsubmit="return confirm('Delete quiz `<?= $quiz->quiz_title ?>` ?')">
                <button type="submit" class="btn btn-danger">
                    Delete Quiz
                </button>
            </form>
        </div>
    </td>
</tr>