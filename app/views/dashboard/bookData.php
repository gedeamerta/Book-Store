<div class="container">
<div class="row">

<!-- Left Card Start  -->
<div class="col-lg-8">
    <div class="shadow mt-5">
        <div class="row">
            <div class="col-md">
                <img src="<?= baseurl . '/assets/img/' . $data['book_single']['image'] ?>" alt="" srcset="">
            </div>
            
            <div class="col-md-7 m-3">
                <h1 class="card-title"><?= $data['book_single']['judul_buku'] ?></h1>
                <p class="card-text m-0">
                    <?php if($data['rate'] != 0) : ?>
                    <i class="fa fa-star"></i>
                    <?php 
                    $total = 0;
                    $i = 0; ?>
                    <?php foreach ($data['rate'] as $rate) : ?>
                    <?php 
                        $calc = $rate['rating'];
                        $total += $calc;
                        $i++;
                        ?>
                    <?php endforeach; ?>
                    <?php $avg = $total / $i; ?>
                    <?= number_format($avg,1) ?>
                    <?php endif; ?>
                </p>
                <p class="text-secondary m-0">Category : <?= $data['book_single']['category'] ?></p>

                <h2 class="h3 mt-3">Sinopsis</h2>
                <p class="text-muted mt-2 mb-2"><?= $data['book_single']['sipnosis'] ?></p>
                <footer class="blockquote-footer mb-2">Author : <i><?= $data['book_single']['fullname'] ?></i></footer>
                <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalAddBook">Tambah Favorit</button>

                <!-- Modal Add books -->
                <div class="modal fade" id="modalAddBook" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Add this Book</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>Apakah anda ingin menambahkan buku ini ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <a href="<?= baseurl; ?>/dashboard/addBooks/<?= $data['book_single']['id'] ?>" class="btn btn-info">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Add Books -->

            </div>
        </div>
    </div>
</div>
<!-- End Left Card -->

<!-- Right Card -->
<div class="col-lg-4">
    <form action="<?= baseurl; ?>/dashboard/search" method="post" class="form-inline mt-5">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3" type="text" placeholder="Search" aria-label="Search" name="keyword">
    </form>
    <!-- Gugel Maps Start -->
    <div class="shadow p-3 mt-3 mb-4">
        <p style="color: #999; margin-bottom: 2px; margin-left: 3px;">Google Maps</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.5143504265466!2d115.15277281436634!3d-8.64253219027644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd238904731e53b%3A0x750539b5dbc116c6!2sWarung%20Juanda!5e0!3m2!1sid!2sid!4v1597081772608!5m2!1sid!2sid" width="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Gugel Maps End -->

    <div class="row">
        <div class="col">
            <h1 class="mt-3 font-weight-bold">Another Book </h1>

            <?php foreach ($data['book_limit'] as $book) : ?>
                <div class="mt-3 shadow rounded">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style="width: auto;">
                                <img src="<?= baseurl . '/assets/img/' . $book['image'] ?>" class="card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="col-md m-3">
                            <h3 class="card-title"><?= $book['judul_buku'] ?></h2>
                                <footer class="blockquote-footer mb-3"><?= $book['fullname'] ?></footer>

                                <h3 class="card-title">Sipnosis</h2>
                                    <p class="text-muted"><?= substr($book['sipnosis'], 0, 35) . "..." ?></p>
                                    <a href="<?= baseurl; ?>/dashboard/bookData/<?= $book['id']; ?>" class="btn btn-info">Cek <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z" />
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>


        </div>
    </div>
</div>
<!--  End Right Card -->
</div>
</div>