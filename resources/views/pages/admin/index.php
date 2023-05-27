<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <h3 class="mb-3">Api key: </h3>
            <div class="input-group mb-3">
                <input type="password" class="form-control" value="<?= auth()->getUser()->api_key ?>" name="api-key" id="api-key">
                <span class="input-group-text">
                    <button type="button" class="btn btn-secondary" id="show-hide-api-key">
                        Show/Hide Key
                    </button>

                    <div class="mx-2"></div>

                    <button type="button" class="btn btn-secondary" id="copy-api-key">
                        Copy Key
                    </button>
                </span>
            </div>
        </div>
        <div class="col-12">
            <?= view('components.admin.quizzes-table', ['quizzes' => $quizzes]) ?>
        </div>
    </div>
</div>