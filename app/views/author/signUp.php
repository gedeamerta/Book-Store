<div class="container-sm">
<div class="card card-body mt-5">
<h1 class="card-title text-center">Register</h1>
<form action="<?= baseurl; ?>/author/signUp" enctype="multipart/form-data" class="needs-validation" method="post" novalidate>
    <p class="text-muted text-center mt-2">
        <?php if (isset($_SESSION['flash-fail-login-author'])) 
        {
            echo '<p style="color: red; font-style: italic; text-align: center; margin:0;">' . $_SESSION['flash-fail-login-author']['pesan'] . ' </p>';
            unset($_SESSION['flash-fail-login-author']);
        } else {
            echo 'Please Register to Login';
        } ?>
    </p>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please input your username !
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname" class="form-control" id="fullname" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please input your fullname !
            </div>
        </div>
        <div class="col-lg mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please input your email !
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please input your password !
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="password">Re-type Password</label>
            <input type="password" class="form-control" id="password" name="password2" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please input your password !
            </div>

            <input type="hidden" name="id_book" id="id_book">
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image" required>
            <div class="invalid-feedback">
                Please insert an image !
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
    <button class="btn btn-info" name="register" type="submit">Register</button>
</form>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</div>
</div>