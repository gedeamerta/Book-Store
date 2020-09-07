<div class="container">
    <div class="row mt-5">
        <div class="card" style="width: 18rem;"uk-scrollspy="cls:uk-animation-slide-top; repeat: true">
            <div class="card-body">
                <h1 class="card-title text-center">Login</h1>
                <form action="<?= baseurl ?>/admin/index" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>