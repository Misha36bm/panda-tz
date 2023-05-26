<div class="container">
    <div class="row">
        <form class="d-flex align-items-center flex-column" method="post" action="/registration">
            <img class="mb-4" src="https://pandateam.net.ua/images/panda_logo-100x100.png" alt="" width="100">
            <h1 class="h3 mb-3 fw-normal">Please enter data for registration</h1>

            <div class="form-floating w-75">
                <input required type="text" class="form-control" name="username" id="name" placeholder="Jhon Smith">
                <label for="name">Name</label>
            </div>
            <div class="form-floating w-75 mt-2">
                <input required type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating w-75 mt-2">
                <input required type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-75 mt-3 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </div>
</div>