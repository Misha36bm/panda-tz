<div class="container">
    <div class="row">
        <?php
        foreach ($quizzes as $quiz) {
            if ($quiz->options->isNotEmpty()) {
                $view = view('components.quiz', [
                    'title' => $quiz->quiz_title,
                    'options' => $quiz->options
                ]);

                echo "<div class=\"col-4\">$view</div>";
            }
        }
        ?>
    </div>

</div>