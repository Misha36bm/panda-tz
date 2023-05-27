<table class="table text-center" id="quizzes-table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Is Showed</th>
            <th scope="col">Created At</th>
            <th>
                <div class="d-flex align-items-center flex-column-reverse">
                    Actions
                    <?= view('components.admin.create-quiz') ?>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!$quizzes->isEmpty()) {
            foreach ($quizzes as $quiz) {
                echo view('components.admin.quiz-row', ['quiz' => $quiz]);
            }
        }
        ?>
    </tbody>
</table>