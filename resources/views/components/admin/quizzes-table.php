<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Is Showed</th>
            <th scope="col">
                <div class="d-flex align-items-center flex-column-reverse">
                    Actions
                    <?= view('components.admin.create-quiz') ?>
                </div>
            </th>
            <th>
                Created At
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