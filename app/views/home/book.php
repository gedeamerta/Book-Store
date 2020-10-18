<div class="container">
    <div class="row">

        <!-- Left Card Start  -->
        <div class="col-lg-8">
            <?php if ($data['book']) : ?>
                <?php foreach ($data['book'] as $book) : ?>
                    <div class="shadow mt-5">
                        <div class="row">
                            <div class="col-md">
                                <img src="<?= baseurl . '/assets/img/' . $book['image'] ?>" alt="" srcset="">
                            </div>
                            <div class="col-md-7 m-3">
                                <h2 class="card-title"><?= $book['judul_buku'] ?></h2>
                                <footer class="blockquote-footer"><?= $book['fullname'] ?></footer>

                                <h2 class="card-title mb-0">Sinopsis</h2>
                                <p class="text-muted mt-2"><?= substr($book['sipnosis'], 0, 35) . "...";  ?></p>
                                <button class="btn btn-info" data-toggle="modal" data-target="#myModal2">Cek
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z" />
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </button>

                                <div class="modal fade" id="myModal2" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark font-weight-bold" id="exampleModalLabel">Anda Harus Masuk Terlebih Dahulu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= baseurl; ?>/home/login" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Username</label>
                                                        <input type="username" name="username" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" id="textInputId1" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" name="login-user" class="btn btn-info">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- End Left Card -->

        <!-- Right Card -->
        <div class="col-lg-4">
            <form action="<?= baseurl; ?>/home/search" method="post" class="form-inline mt-5">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search" name="keyword">
            </form>
            <!-- Gugel Maps Start -->
            <div class="shadow p-3 mt-3">
                <p style="color: #999; margin-bottom: 2px; margin-left: 3px;">Google Maps</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.5143504265466!2d115.15277281436634!3d-8.64253219027644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd238904731e53b%3A0x750539b5dbc116c6!2sWarung%20Juanda!5e0!3m2!1sid!2sid!4v1597081772608!5m2!1sid!2sid" width="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <!-- Gugel Maps End -->

            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-warning mt-3">BARU</button>

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
                                        <footer class="blockquote-footer mb-3">Ary Pradnya</footer>

                                        <h3 class="card-title">Sinopsis</h2>
                                            <p class="text-muted"><?= substr($book['sipnosis'], 0, 35) . "..." ?></p>
                                            <button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-info mb-3">Cek <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z" />
                                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z" />
                                                </svg>
                                            </button>
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