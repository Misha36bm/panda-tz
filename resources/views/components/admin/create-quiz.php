<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createQuizModal">
    Create Quiz
</button>

<!-- Modal -->
<div class="modal fade" id="createQuizModal" tabindex="-1" aria-labelledby="createQuizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createQuizModalLabel">Create Quiz</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/create-quiz" method="post" id="create-quiz">
                    <div class="input-group mb-4">
                        <span class="input-group-text">Title</span>
                        <input type="text" name="quiz-title" value="" class="form-control">
                    </div>

                    <div class="form-check mb-3 d-flex align-items-baseline">
                        <input class="form-check-input" type="radio" required name="option[answer-index]" value="">

                        <label class="form-check-label w-100 ms-4" for="option">
                            <div class="input-group mb-4">
                                <span class="input-group-text">Option</span>
                                <input required type="text" name="option[text][]" value="" class="form-control">
                            </div>
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary">Add option</button>
                <button type="submit" class="btn btn-primary" form="create-quiz">Save changes</button>
            </div>
        </div>
    </div>
</div>