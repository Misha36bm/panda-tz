<div class="form-check mb-3 d-flex align-items-baseline">
    <input class="form-check-input" type="radio" name="option[is-answer]" value="<?=$iteration?>" <?php if ($option->is_correct) { echo 'checked'; } ?>>

    <label class="form-check-label w-100 ms-4" for="option">
        <div class="input-group mb-4">
            <span class="input-group-text">Option</span>
            <input type="text" name="option[text][]" value="<?= $option->option_text ?>" class="form-control">
        </div>
    </label>
</div>