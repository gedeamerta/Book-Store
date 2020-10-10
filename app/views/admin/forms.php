<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Forms Admin</h1>
    <p class="mb-4">Write your books and update account</p>

    <!-- Content Row -->
    <div class="row">

        <!-- Form Book Start-->
        <div class="col-lg-6">

            <div class="card position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Add Admin</h6>
                </div>
                <div class="card-body">
                    <?php Flasher::getNewAdminFlash() ?>
                    <form class="forms-sample" enctype="multipart/form-data" action="<?= baseurl; ?>/admin/addAdmin" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required />
                        </div>
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" />
                        </div>
                        <div class="form-group">
                            <label for="cover">Profile Picture</label>
                            <input type="file" class="form-control" name="image" placeholder="Gambar" id="cover" accept="image/jpeg , image/png" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- Form book end -->

        <!-- Update Account -->
        <div class="col-lg-6">

            <div class="card position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Changes Password</h6>
                </div>
                <div class="card-body">
                    <?php Flasher::getAdminUpdatePassFlash() ?>
                    <form class="forms-sample" enctype="multipart/form-data" action="<?= baseurl; ?>/admin/update" method="post">
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required />
                        </div>
                        <div class="form-group">
                            <label for="password2">Re Type New Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" value="" placeholder="Password" required />
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- end Update Account -->

        <!-- Add Category -->
        <div class="col-lg-6 mt-5">

            <div class="card position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Add Category</h6>
                </div>
                <div class="card-body">
                    <?php Flasher::getCategoryFlash() ?>
                    <form class="forms-sample" action="<?= baseurl; ?>/admin/addCategory" method="post">
                        <div class="form-group">
                            <label for="name_category">Category</label>
                            <input type="text" class="form-control" id="name_category" name="name_category" value="" placeholder="Category" required />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- end Category -->

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white mt-5">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= baseurl; ?>/author/setOut">Logout</a>
            </div>
        </div>
    </div>
</div>