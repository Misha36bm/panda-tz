<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h3>Random 3 Quizes:</h3>
        </div>
        <?php
        foreach ($quizzes as $quiz) {
            if ($quiz->options->isNotEmpty()) {
                $view = view('components.quiz', [
                    'title' => $quiz->quiz_title,
                    'options' => $quiz->options,
                    'quizId' => $quiz->id
                ]);

                echo "<div class=\"col-4\">$view</div>";
            }
        }
        ?>
    </div>

</div>