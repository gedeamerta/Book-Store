<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div style="left: 25%;" class="card card-body mt-5 w-50">
                <h1 class="card-title text-center">Package</h1>
                <form action="<?= baseurl; ?>/dashboard/user_premium" enctype="multipart/form-data" class="needs-validation" method="post" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= $data['user_single']['username'] ?>" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please input your username !
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= $data['user_single']['email'] ?>" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please input your fullname !
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="no_telp">Number Phone</label>
                            <input type="tel" name="no_telp" class="form-control" id="no_telp" value="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="08x-xxx-xxx-xxx" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please input your number phone !
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="no_telp">Package Type</label>
                            <select name="package_id" class="form-control" id="">
                                <?php foreach ($data['package'] as $p) : ?>
                                    <option class="custom-select" value="<?= $p['id'] ?>" required><?= $p['type_package']; ?> Rp. <?= number_format($p['price'], 2, ",", "."); ?></option>
                                <?php endforeach; ?>
                            </select>
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
                    <button class="btn btn-info" name="register" type="submit">Order Now</button>
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
    </div>
</div>