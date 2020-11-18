<div class="container">
    <div class="row">

<!-- Left Card Start  -->
<div class="col-md">
    <form action="<?= baseurl; ?>/dashboard/search" method="post" class="form-inline mt-5">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-25" type="text" placeholder="Search" aria-label="Search" name="keyword">
    </form>
    <div class="btn-group mt-3">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category List
        </button>
        <div class="dropdown-menu">
            <?php foreach ($data['category'] as $category) : ?>
                <a class="dropdown-item" href="<?= baseurl; ?>/dashboard/category/<?= $category['slug']; ?>"><?= $category['name_category'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php foreach ($data['book_limit'] as $book) : ?>
        <div class="shadow mt-5">
            <div class="row">
                <div class="col-md">
                    <img class="img-fluid" src="<?= baseurl . '/assets/img/' . $book['image'] ?>" alt="Responsive image" srcset="">
                </div>
                <div class="col-md-7 m-3">
                    <h1 class="card-title"><?= $book['judul_buku'] ?></h1>
                    <p class="text-secondary m-0">Category : <?= $book['category'] ?></p>
                        
                        <h2 class="h3 mt-3">Sinopsis</h2>
                        <p class="text-muted mt-2 mb-2"><?= $book['sipnosis'] ?></p>
                        <footer class="blockquote-footer mb-2">Author : <i><?= $book['fullname'] ?></i></footer>
                        
                        <a href="<?= baseurl; ?>/dashboard/bookData/<?= $book['id']; ?>" class="btn btn-info">Cek
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z" />
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z" />
                            </svg>
                        </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!--  End Left Card -->
</div>
</div>