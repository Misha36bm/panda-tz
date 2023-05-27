<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">
                Actions
                <?= view('components.admin.create-quiz') ?>
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