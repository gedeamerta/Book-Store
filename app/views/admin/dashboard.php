<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">List Book </h1>
    <p class="mb-4">See how many books that you write it</p>

    <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Category List
        </button>
        <div class="dropdown-menu">
            <?php foreach ($data['category'] as $category) : ?>
            <a class="dropdown-item"
                href="<?= baseurl; ?>/admin/category/<?= $category['slug_category']; ?>"><?= $category['name_category'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- List Books Start -->
        <?php foreach ($data['book_author'] as $dataBook) : ?>
        <?php if($dataBook['status'] == 0 || $dataBook['status'] == 1): ?>
        <div class="col-lg-6">
            <div
                class="card position-relative mt-3 <?= $dataBook['status'] == 1 ? 'border-success' : (($dataBook['status'] == 0) ? 'border-danger' : '')?>">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Books</h6>
                    <footer class="float-right"><?= date("m-d-Y", strtotime($dataBook['tanggal'])) ?></footer>
                </div>
                <div class="card-body">
                    <img src="<?= baseurl . '/assets/img/' . $dataBook['image']; ?>" alt="" width="100%">
                    <h2 class="card-title mt-2"><?= $dataBook['judul_buku'] ?></h2>
                    <h6 class="mt-2">Category : <?= $dataBook['category'] ?></h6>
                    <p><?= $dataBook['sipnosis'] ?></p>
                    <footer class="blockquote-footer"><?= $dataBook['fullname'] ?></footer>
                    <?php if ($dataBook['status'] == 1) : ?>
                    <i class="mt-2 fas fa-check-circle"></i>
                    <?php else : ?>
                    <a href="<?= baseurl; ?>/admin/publish/<?= $dataBook['id_book'] ?>"
                        class="btn btn-primary mt-3">Publish</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
        <!-- List Books End -->
    </div>
</div>
<!-- container-fluid -->

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