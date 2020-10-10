<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Author Books List </h1>
    <p class="mb-4">See how many books that you write it</p>

    <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category List
        </button>
        <div class="dropdown-menu">
            <?php foreach ($data['category'] as $category) : ?>
                <a class="dropdown-item" href="<?= baseurl; ?>/author/category/<?= $category['slug_category']; ?>"><?= $category['name_category'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- List Books Start -->
        <?php foreach ($data['new_book_data'] as $c_d) : ?>
            <div class="col-lg-6">
                <div class="card position-relative mt-3 <?= $c_d['status'] == 1 ? 'border-success' : (($c_d['status'] == 0) ? 'border-danger' : '') ?>">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary float-left">Your Books</h6>
                    </div>
                    <div class="card-body">
                        <img src="<?= baseurl . '/assets/img/' . $c_d['image']; ?>" alt="" width="100%">
                        <h2 class="card-title mt-2"><?= $c_d['judul_buku']; ?></h2>
                        <h6 class="mt-2">Category : <?= $c_d['category'] ?></h6>
                        <p><?= $c_d['sipnosis']; ?></p>
                        <p><i class="far fa-eye"></i> <?= $c_d['total_watcher']; ?></p>
                        <footer class="blockquote-footer"><?= $c_d['fullname']; ?></footer>
                        <button type="button" onclick="window.location.href='<?= baseurl; ?>/author/bookDelete/<?= $c_d['slug'] ?>'" class="btn btn-danger mt-3">Request Delete</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- List Books End -->
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