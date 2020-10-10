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
                    <img src="<?= baseurl . '/assets/img/' . $book['image'] ?>" alt="" srcset="">
                </div>
                <div class="col-md-7 m-3">
                    <h1 class="card-title"><?= $book['judul_buku'] ?></h1>
                    <p class="card-text m-0">
                        <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.5 1.61804L13.6064 8.10081L13.7186 8.4463H14.0819H20.8983L15.3837 12.4529L15.0898 12.6664L15.2021 13.0119L17.3085 19.4947L11.7939 15.4881L11.5 15.2746L11.2061 15.4881L5.69153 19.4947L7.79791 13.0119L7.91017 12.6664L7.61627 12.4529L2.10169 8.4463H8.91809H9.28136L9.39362 8.10081L11.5 1.61804Z" fill="#FFE601" stroke="#FFE601" />
                        </svg>
                        <?= $book['rating'] ?>
                    </p>
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