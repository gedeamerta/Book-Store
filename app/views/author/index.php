<div class="container">
        <div class="card mx-auto card-body" style="width: 23rem; margin-top: 8rem;">
            <h1 class="card-title text-center mb-0">Login</h1>
            <p class="text-muted text-center mt-2"><?php if (isset($_SESSION['flash-fail-login-author'])) {
                                                        echo '<p style="color: red; font-style: italic; text-align: center; margin:0;">' . $_SESSION['flash-fail-login-author']['pesan'] . ' </p>';
                                                        unset($_SESSION['flash-fail-login-author']);
                                                    } else {
                                                        echo 'Please Login to Start';
                                                    } ?></p>
            <form action="<?= baseurl ?>/author/index" method="post">
                <div class="form-group">
                    <label class="h6" for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                </div>
                <div class="form-group">
                    <label class="h6" for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button style="width: 100%;" type="submit" name="login" class="btn btn-info">Submit</button>
                <p class="text-muted h6">Don't have any account to Sign In ? <a href="<?= baseurl; ?>/author/signUp">Sign Up</a></p>
            </form>
        </div>
</div>