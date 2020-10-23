<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Author Books Premium List </h1>
    <p class="mb-4">See how many books that you write it</p>

    <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category List
        </button>
        <div class="dropdown-menu">
        <?php foreach ($data['new_book_data'] as $booksAuthor) : ?>
            <?php if($booksAuthor['premium'] == 2): ?>
                <?php foreach ($data['category'] as $booksAuthor) : ?>
                    <a class="dropdown-item" href="<?= baseurl; ?>/author/category_premium/<?= $booksAuthor['slug_category']; ?>"><?= $booksAuthor['name_category'] ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- List Books Start -->
        <?php foreach ($data['new_book_data'] as $booksAuthor) : ?>
            <?php if($booksAuthor['premium'] == 2) : ?>
            <div class="col-lg-6">
                <div class="card position-relative mt-3 <?= $booksAuthor['status'] == 1 ? 'border-success' : (($booksAuthor['status'] == 0) ? 'border-danger' : '') ?>">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary float-left">Premium</h6>
                        <footer class="float-right"><?= date("m-d-Y", strtotime($booksAuthor['tanggal'])) ?></footer>
                    </div>
                    <div class="card-body">
                        <img src="<?= baseurl . '/assets/img/' . $booksAuthor['image']; ?>" alt="" width="100%">
                        <h2 class="card-title mt-2"><?= $booksAuthor['judul_buku']; ?></h2>
                        <h6 class="mt-2">Category : <?= $booksAuthor['category'] ?></h6>
                        <p><?= $booksAuthor['sipnosis']; ?></p>
                        <p><i class="far fa-eye"></i> <?= $booksAuthor['total_watcher']; ?></p>
                        <footer class="blockquote-footer"><?= $booksAuthor['fullname']; ?></footer>
                        <button type="button" onclick="window.location.href='<?= baseurl; ?>/author/bookDelete/<?= $booksAuthor['slug'] ?>'" class="btn btn-danger mt-3">Request Delete</button>
                    </div>
                </div>
            </div>
            <?php endif; ?>
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