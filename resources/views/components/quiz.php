<h4 class="mb-3"><?= $title ?></h4>
<div class="my-3">
    <form action="/vote-quiz/<?= $quizId ?>" method="post">
        <?php
        foreach ($options as $option) {
            echo "<div class=\"form-check\">
                <input id=\"option_$option->id\" name=\"selected_option\" value=\"$option->id\" type=\"radio\" class=\"form-check-input\">
                <label class=\"form-check-label\" for=\"option_$option->id\">$option->option_text</label>
            </div>";
        }
        ?>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>