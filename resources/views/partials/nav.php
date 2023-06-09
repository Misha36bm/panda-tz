<div class="container-fluid border-bottom pt-2">
    <div class="container">
        <header class="row d-flex justify-content-between">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="https://pandateam.net.ua/images/panda_logo-100x100.png" width="40" alt="">
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <?php
                if (auth()->isUserLogin()) {
                    echo '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ' . auth()->getUser()->username . '
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/personal-area">Personal Area</a></li>
                            <li><a class="dropdown-item" href="/logout">Log out</a></li>
                        </ul>
                    </div>
                    ';
                } else {
                    echo '<a href="/login" class="btn btn-outline-primary me-2">Login</a>
                    <a href="/registration" class="btn btn-primary">Sign-up</a>';
                }
                ?>
            </div>
        </header>
    </div>
</div>