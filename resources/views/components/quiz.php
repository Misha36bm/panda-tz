<h4 class="mb-3"><?= $title ?></h4>
<div class="my-3">
    <?php
    foreach ($options as $option) {
        $isChecked = $option->is_correct == 1;
        echo "<div class=\"form-check\">
                <input id=\"credit\" name=\"paymentMethod\" type=\"radio\" class=\"form-check-input\" checked=\"$isChecked\">
                <label class=\"form-check-label\" for=\"credit\">$option->option_text</label>
            </div>";
    }
    ?>
</div>