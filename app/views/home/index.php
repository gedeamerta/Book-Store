<?php Flasher::failLogin(); ?>
<?php Flasher::failRegister(); ?>

<?php Flasher::successLogin(); ?>
<!-- container 1 start -->
<div class="container-mine">
    <div class="decor back-biru">
        <div uk-scrollspy="cls:uk-animation-slide-left-small; repeat: true">
            <h1 class="mb-2 mt-2">Mulai Perbanyak Minat Membaca</h1>
            <h1 class="h1-black mb-3">Baca , Pahami, Tingkatkan</h1>
            <h3>Daftar Gratis !</h3>
        </div>
        <button class="btn btn-info" style="font-size: 20px;" type="button" data-toggle="modal" data-target="#register">Daftar
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z" />
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z" />
            </svg></button>
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
            <div class="col-md-6 p-2">
                <h2>Buku Pilihan Terbaik</h2>
            </div>

            <div class="col-md-6">
                <button onclick="window.location.href='<?= baseurl; ?>/home/book'" class="float-right" type="submit"> Lihat Semua </button>
            </div>
        </div>
    </div>

    <!-- card -->
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($data['book_limit'] as $book) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card-deck">
                        <div class="card" uk-scrollspy="cls:uk-animation-slide-left; repeat: true" style="width:100%;">
                            <img src="<?= baseurl . '/assets/img/' . $book['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h2 class="card-title"><?= $book['judul_buku']  ?></h2>
                                <footer class="blockquote-footer mb-3">Pengarang <cite title="Source Title"><?= $book['fullname'] ?></cite></footer>
                                </blockquote>
                                <a href="<?= baseurl; ?>/home/book" class="btn btn-info">Cek Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
                        <li class="list-group-item">Premium Account dalam 2 minggu</li>
                    </ul>
                    <button data-toggle="modal" data-target="#loginModal" class="btn btn-info mt-5 mb-5" type="submit">Beli Sekarang
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
                    <h1 class="card-text text-center"><strong>115.000/bulan</strong></h1>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Alat tulis Gratis dari Buku Media</li>
                        <li class="list-group-item">Dapat 3 buku gratis</li>
                        <li class="list-group-item">Merchandise Gratis dari Buku Media</li>
                        <li class="list-group-item">Gratis Membaca di toko Buku Media</li>
                        <li class="list-group-item">Premium Account dalam 2 bulan</li>
                    </ul>
                    <button class="btn btn-info mt-5 mb-5" data-toggle="modal" data-target="#loginModal" type="submit">Beli Sekarang
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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