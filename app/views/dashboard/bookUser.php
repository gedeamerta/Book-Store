<div class="container">
    <div class="row">

<!-- Left Card Start  -->
<div class="col-md">
<?php foreach ($data['books_user'] as $book) : ?>
<div class="shadow mt-5">
    <div class="row">
        <div class="col-md">
            <img src="<?= baseurl . '/assets/img/' . $book['image'] ?>" alt="" srcset="">
        </div>
        <div class="col-md-7 m-3">
            <h2 class="card-title"><?= $book['judul_buku'] ?></h2>
            <p class="card-text mb-0">
                <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.5 1.61804L13.6064 8.10081L13.7186 8.4463H14.0819H20.8983L15.3837 12.4529L15.0898 12.6664L15.2021 13.0119L17.3085 19.4947L11.7939 15.4881L11.5 15.2746L11.2061 15.4881L5.69153 19.4947L7.79791 13.0119L7.91017 12.6664L7.61627 12.4529L2.10169 8.4463H8.91809H9.28136L9.39362 8.10081L11.5 1.61804Z" fill="#FFE601" stroke="#FFE601" />
                </svg>

                <?= $book['rating'] ?>
            </p>
            <footer class="blockquote-footer"><?= $book['fullname'] ?></footer>

            <h2 class="card-title mb-0">Sinopsis</h2>
            <p class="text-muted mt-2"><?= $book['sipnosis'] ?></p>
            <button class="btn btn-info" data-toggle="modal" data-target="#modalpdf">PDF BOOK</button>

            <!-- Modal Add books -->
            <div class="modal fade" id="modalpdf" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <iframe type="application/pdf" src="<?= baseurl . '/assets/pdf/' . $book['pdf'] ?>" width="100%" height="700"></iframe>
                    </div>
                </div>
            </div>
            <!-- End Modal Add Books -->

        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
<!--  End Left Card -->

    </div>
</div>