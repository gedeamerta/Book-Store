<div class="container">
    <div class="row">

<!-- Left Card Start  -->
<div class="col-md">
<?php foreach ($data['books_user'] as $book) : ?>
    <?php if($book['status'] == 1): ?>
<div class="shadow mt-5">
    <div class="row">
        <div class="col-md">
            <img src="<?= baseurl . '/assets/img/' . $book['image'] ?>" alt="" srcset="">
        </div>
        <div class="col-md-7 m-3">
            <h2 class="card-title"><?= $book['judul_buku'] ?></h2>
            <footer class="blockquote-footer"><?= $book['fullname'] ?></footer>

            <h2 class="card-title mb-0">Sinopsis</h2>
            <p class="text-muted mt-2"><?= $book['sipnosis'] ?></p>
            <button class="btn btn-info d-inline" data-toggle="modal" data-target="#modalpdf">PDF BOOK</button>

            <form action="<?= baseurl; ?>/dashboard/rate/<?= $book['id_book']; ?>" method="post">
                <p class="mt-3 mb-2">Rate the book</p>
                <select name="rating" id="rate">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button class="btn btn-warning" type="submit">Rate </button>
            </form>

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
<?php else : ?>
    <div class="shadow mt-5">
    <div class="row">
        <div class="col-md-7 m-3">
            <h2 class="card-title"><?= $book['judul_buku'] ?></h2>
            <h3 class="text-muted">Sorry this book has been deleted from admin</h3>
            <a href="<?= baseurl; ?>/dashboard/clear_book/<?= $book['id_book']; ?>"class="btn btn-warning" type="submit">Clear </a>
            <!-- End Modal Add Books -->
            
        </div>
    </div>
</div>
    <?php endif; ?>
<?php endforeach; ?>
</div>
<!--  End Left Card -->

    </div>
</div>