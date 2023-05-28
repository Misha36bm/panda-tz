<div class="container">
    <div class="row">
        <div class="col-12 my-5 d-flex flex-column align-items-center justify-content-center">
            <h3>BE FIRST QUIZ MAKER!!!</h3>

            <?php
            if (!auth()->isUserLogin()) {
                echo '<div>
                          <a href="/login" class="btn btn-outline-primary me-3">Sign in</a>
                          <a href="/registration" class="btn btn-primary">Sign up</a>
                      </div>';
            } else {
                echo '<a href="/personal-area" class="btn btn-outline-primary me-3">Let`s GO</a>';
            }
            ?>
        </div>
    </div>
</div>