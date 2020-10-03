    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-1 text-gray-800">List Book </h1>
        <p class="mb-4">See how many books that you write it</p>
            <!-- Content Row -->
            <div class="row">
                <!-- List Books Start -->
                <?php foreach ($data['req_del_book'] as $dataBook) : ?>
                    <div class="col-lg-6">
                        <div class="card position-relative mt-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Books</h6>
                            </div>
                            <div class="card-body">
                                <img src="<?= baseurl . '/assets/img/' . $dataBook['image']; ?>" alt="">
                                <h2 class="card-title mt-2"><?= $dataBook['judul_buku'] ?></h2>
                                <p><?= $dataBook['sipnosis'] ?></p>
                                <footer class="blockquote-footer"><?= $dataBook['fullname'] ?></footer>
                                <a href="<?= baseurl; ?>/admin/delete/<?= $dataBook['id_book'] ?>" class="btn btn-danger mt-3">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- List Books End -->
            </div>
        </div>
    <!-- container-fluid -->
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