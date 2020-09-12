<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Forms Author</h1>
    <p class="mb-4">Write your books and update account</p>

    <!-- Content Row -->
    <div class="row">

        <!-- Form Book Start-->
        <div class="col-lg-6">

            <div class="card position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Book</h6>
                </div>
                <div class="card-body">
                    <?php Flasher::flashAuthor() ?>
                    <form class="forms-sample" enctype="multipart/form-data" action="<?= baseurl; ?>/author/addBooks" method="post">
                        <input type="hidden" name="id" id="">
                        <div class="form-group">
                            <label for="judul_buku">Judul Buku</label>
                            <input type="text" class="form-control" id="judul_buku" type="text" name="judul_buku" value="" placeholder="Judul Buku" required />
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover Buku</label>
                            <input type="file" class="form-control" name="image" placeholder="Gambar" accept="image/jpeg , image/png" />
                        </div>
                        <div class="form-group">
                            <label for="sipnosis">Sipnosis</label>
                            <textarea type="text" class="form-control" id="sipnosis" name="sipnosis" value="" placeholder="Cerita Singkat" cols="40" rows="10" required></textarea>
                        </div>
                        <input type="hidden" class="form-control" id="pengarang" name="fullname" value="" required />

                        <input type="hidden" name="id_author" id="">
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
                    <?php Flasher::flashAuthorPass() ?>
                    <form class="forms-sample" enctype="multipart/form-data" action="<?= baseurl; ?>/author/changesPass" method="post">
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required />
                        </div>
                        <div class="form-group">
                            <label for="password2">Re Type New Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" value="" placeholder="Password" required />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- end form update -->

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