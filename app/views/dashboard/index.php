<!-- container 1 start -->
<div class="container-mine">
    <div class="decor back-biru">
        <div class="uk-animation-slide-left">
            <h1 style="font-size: 50px;" class="mb-3">SELAMAT DATANG</h1>
            <h1 style="font-size: 38px;" class="h1-black">Mulai Perbanyak Minat Membaca</h1>
            <h1 class="h1-black mb-3">Baca , Pahami, Tingkatkan</h1>
        </div>
    </div>
    <div class="uk-animation" tabindex="0">
        <div class="uk-animation-scale-up">
            <img style="background-image: no-repeat; background-size: cover;" src="<?= baseurl; ?>/assets/img/background-index.png" alt="" srcset="">
        </div>
    </div>
</div>
<!-- container 1 end -->

<!-- container 2 start-->
<div class="container-fluid">
    <div class="text-up">
        <div class="row">
            <div class="col-md-6 pl-4">
                <h2>Buku Pilihan Terbaik Anda</h2>
            </div>

            <div class="col-md-6 pr-5">
                <button onclick="window.location.href='<?= baseurl; ?>/dashboard/book'" class="float-right" type="submit"> Lihat Semua </button>
            </div>
        </div>
    </div>

    <!-- card -->
    <div class="container-fluid">
        <div class="row">
            <?php if ($data['book_limit']) : ?>
                <?php foreach ($data['book_limit'] as $book) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card-deck">
                            <div class="card" uk-scrollspy="cls:uk-animation-slide-left; repeat: true" style="width:100%;">
                                <img src="<?= baseurl . '/assets/img/' . $book['image'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h2 class="card-title"><?= $book['judul_buku']  ?></h2>
                                    <p class="card-text mb-2">
                                        <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.5 1.61804L13.6064 8.10081L13.7186 8.4463H14.0819H20.8983L15.3837 12.4529L15.0898 12.6664L15.2021 13.0119L17.3085 19.4947L11.7939 15.4881L11.5 15.2746L11.2061 15.4881L5.69153 19.4947L7.79791 13.0119L7.91017 12.6664L7.61627 12.4529L2.10169 8.4463H8.91809H9.28136L9.39362 8.10081L11.5 1.61804Z" fill="#FFE601" stroke="#FFE601" />
                                        </svg>

                                        5.0 (20)</p>
                                    <footer class="blockquote-footer mb-3">Pengarang <cite title="Source Title"><?= $book['fullname'] ?></cite></footer>
                                    </blockquote>
                                    <a href="<?= baseurl; ?>/dashboard/bookData/<?= $book['id']; ?>" class="btn btn-info">Cek Lebih Lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- container 2 end -->

<!-- container 3 start -->
<div class="container-fluid-blue">
    <div class="row">
        <div class="col-md-3">
            <h2 class="font-weight-normal">Beli Paket Pembelian Buku</h2>
            <h1>di Buku Media</h1>
        </div>
        <div class="col-md-4">
            <div uk-scrollspy="cls:uk-animation-slide-top; repeat: true">
                <div class="card-body card rounded mb-5">
                    <h2 class="card-title mb-3 text-center">Standard Package</h2>
                    <h1 class="card-text text-center"><strong>40.000/bulan</strong></h1>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Merchandise Gratis dari Buku Media</li>
                        <li class="list-group-item">Gratis Membaca di toko Buku Media</li>
                    </ul>
                    <button class="btn btn-info mt-5 mb-5" type="submit">Buy Now
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z" />
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div uk-scrollspy="cls:uk-animation-slide-bottom; repeat: true">
                <div class="card card-body rounded mb-5">
                    <h2 class="card-title text-center">Platinum Package</h2>
                    <h1 class="card-text text-center"><strong>100.000/bulan</strong></h1>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Alat tulis Gratis dari Buku Media</li>
                        <li class="list-group-item">Beli 3 buku gratis 1 Buku dari Buku Media </li>
                        <li class="list-group-item">Merchandise Gratis dari Buku Media</li>
                        <li class="list-group-item">Gratis Membaca di toko Buku Media</li>
                    </ul>
                    <button class="btn btn-info mt-5 mb-5" type="submit">Buy Now <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z" />
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- container 3 end -->

<!-- container 4 -->
<div class="container-fluid-blue-dark">
    <div uk-slider="center: true">
        <div class="uk-position-relative uk-visible-toggle uk-light mb-5" tabindex="-1">
            <h1 class="text-center mt-3"><strong>KATA PELANGGAN KAMI</strong></h1>
            <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
                <li>
                    <div class="uk-panel col-md p-5 text-center">
                        <img class="profile-image-circle" src="<?= baseurl; ?>/assets/img/ayiks.jpg" alt="">
                        <div class="card-body">
                            <h1 class="text-light text-center font-weight-bold">Ary Pradnya</h1>
                            <footer class="blockquote-footer mb-3 text-light text-center">Founder <cite title="Source Title">Radio 19</cite></footer>
                            <h4 class="text-center text-light m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eius officia consequatur ab sequi aperiam, molestias non eum dignissimos, accusamus corporis necessitatibus rem minima doloremque nihil nesciunt voluptates expedita saepe.</h4>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-panel p-5 text-center">
                        <img class="profile-image-circle" src="<?= baseurl; ?>/assets/img/amertaPapan.jpg" alt="">
                        <div class="card-body">
                            <h1 class="card-title text-light font-weight-bold text-center">Gede Amerta</h1>
                            <footer class="blockquote-footer mb-3 text-center text-light">CEO <cite title="Source Title">Gymnastics CPC</cite></footer>
                            <h4 class="card-text text-center text-light m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eius officia consequatur ab sequi aperiam, molestias non eum dignissimos, accusamus corporis necessitatibus rem minima doloremque nihil nesciunt voluptates expedita saepe.</h4>

                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-panel p-5 text-center">
                        <img class="profile-image-circle" src="<?= baseurl; ?>/assets/img/dwipa.jpg" alt="">
                        <div class="card-body">
                            <h1 class="card-title text-light font-weight-bold text-center">Putu Dwipayana </h1>
                            <footer class="blockquote-footer mb-3 text-center text-light">Developer <cite title="Source Title">Gojek</cite></footer>
                            <h4 class="card-text text-center text-light m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eius officia consequatur ab sequi aperiam, molestias non eum dignissimos, accusamus corporis necessitatibus rem minima doloremque nihil nesciunt voluptates expedita saepe.</h4>

                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-panel p-5 text-center">
                        <img class="profile-image-circle" src="<?= baseurl; ?>/assets/img/wishnu.jpg" alt="">
                        <div class="card-body">
                            <h1 class="card-title text-light font-weight-bold text-center">Wishnu Ahmad</h1>
                            <footer class="blockquote-footer mb-3 text-center text-light">Manager <cite title="Source Title">PT Astra Motor</cite></footer>
                            <h4 class="card-text text-center text-light m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eius officia consequatur ab sequi aperiam, molestias non eum dignissimos, accusamus corporis necessitatibus rem minima doloremque nihil nesciunt voluptates expedita saepe.</h4>

                        </div>
                    </div>
                </li>
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
    </div>
</div>
<!-- container 4 end -->

<!-- Contact Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mt-5">
            <div uk-scrollspy="cls:uk-animation-slide-left-small; repeat: true">
                <img src="<?= baseurl; ?>/assets/img/background-contact.png" alt="">
            </div>
        </div>

        <div class="col-md-6 mt-5">
            <h1 class=" mr-5 back-biru-contact">Kontak Kami</h1>

            <form method="post">
                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" class="form-control" id="textInputId1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Contact End -->