<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $quiz->id ?>">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $quiz->id ?>" tabindex="-1" aria-labelledby="exampleModal<?= $quiz->id ?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModal<?= $quiz->id ?>Label"><?= $quiz->quiz_title ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                <form action="/edit-quiz/<?= $quiz->id ?>" class="text-start" method="post" id="editQuiz<?= $quiz->id ?>">
                    <div class="form-check text-start mb-3">
                        <input class="form-check-input" type="checkbox" value="" name="show-quiz" id="show-quiz" <?= $quiz->is_showed ? 'checked' : '' ?>>
                        <label class="form-check-label" for="show-quiz">
                            Show Quiz?
                        </label>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text">Title</span>
                        <input type="text" name="quiz-title" value="<?= $quiz->quiz_title ?>" class="form-control">
                    </div>

                    <?php
                    foreach ($quiz->options as $index => $option) {
                        echo view('components.admin.quiz-option', [
                            'option' => $option,
                            'iteration' => $index
                        ]);
                    }
                    ?>
                </form>


            </div>
            <div class="modal-footer">
                <button type="submit" form="editQuiz<?= $quiz->id ?>" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>