<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Author Books List </h1>
    <p class="mb-4">See how many books that you write it</p>

    <!-- Content Row -->
    <div class="row">

        <!-- List Books Start -->
        <div class="col-lg-6">
            <div class="card position-relative mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Your Books</h6>
                </div>
                <div class="card-body">
                    <img src="<?= baseurl . '/assets/img/' . $data['del_book']['image']; ?>" alt="">
                    <h2 class="card-title mt-2"><?= $data['del_book']['judul_buku']; ?></h2>
                    <p><?= $data['del_book']['sipnosis']; ?></p>
                    <footer class="blockquote-footer"><?= $data['del_book']['fullname']; ?></footer>
                    <button type="button" data-toggle="modal" data-target="#modalDeleteBook" class="btn btn-danger mt-3">Send Request Delete</button>
                </div>
            </div>
        </div>
        <!-- List Books End -->
    </div>

    <!-- modal delete start-->
    <div class="modal fade" id="modalDeleteBook" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">This request will be sent to admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are u sure want to send delete request<strong> <?= $data['del_book']['judul_buku'] ?></strong></h5>
                    <form action="<?= baseurl; ?>/author/request" method="post">
                        <input type="hidden" name="id_book" value="<?= $data['del_book']['id'] ?>">
                        <input type="hidden" name="id_author">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" name="delete_book" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal delete end -->

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