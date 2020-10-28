<?php 
class Author extends Controller
{
    public function index()
    {  
        if (!isset($_POST['login-author'])) {
            $data['set_active'] = ''; //set active class navbar

            // validating Actor Admin, Authpr
            $data['validate'] = 'Author_Validate';

            $data['judul'] = 'Author';
            $this->view('templates/header', $data);
            $this->view('author/index', $data);
        }else {
            if ($this->model("Author_model")->loginAuthor($_POST) > 0) {
                echo 'berhasil';
                header("Location: " . baseurl . '/author/dashboard');
            } else {
                echo 'gagal';
                Flasher::setFailLoginAuthor('Invalid Username or Password');
                header("Location: " . baseurl . '/author/index');
            }
        }
    }

    public function signUp()
    {
        if (!isset($_POST['register'])) {
            $data['judul'] = 'Sign Up - Author';
            // validating Actor Admin, Authpr
            $data['validate'] = 'Author_Validate';
            $this->view('templates/header', $data);
            $this->view('author/signUp', $data);
        } else {
            if ($this->model("Author_model")->registerAuthor($_POST) > 0) {
                echo 'berhasil';
                header("Location: " . baseurl . '/author/index');
            } else {
                echo 'gagal';
                Flasher::setFailLoginAuthor('There is an error while Sign up');
                header("Location: " . baseurl . '/author/signUp');
            }
        }
    }

    public function addBooks()
    {
        if ($this->model("Author_model")->addBooksAuthor($_POST) > 0) {
            echo 'berhasil';
            Flasher::setFlashAuthor('success', 'Berhasil', ' memasukan buku');
            header("Location: " . baseurl . '/author/forms');
        } else {
            echo 'gagal';
            header("Location: " . baseurl . '/author/forms');
        }
    }


    public function dashboard()
    {
        $data['judul'] = 'Author - Dashboard';
        $data['set_active'] = 'dashboard';

        // validating Actor Admin, Author
        $data['validate'] = 'Author_Validate';

        //author id
        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id_author']);

        // id book before published
        $data['books_id'] = $this->model("Author_model")->getBooksAuthorId();

        $newDataBook =[];
        foreach ($data['books_id'] as $book) {
            $total_watcher = $this->model('Author_model')->getWatcher($book['id']);
            $newDataBook[$book['id']] = [
                    "total_watcher" => $total_watcher,
                    "judul_buku" => $book['judul_buku'],
                    "category" => $book['category'],
                    "sipnosis" => $book['sipnosis'],
                    "image" => $book['image'],
                    "tanggal" => $book['tanggal'],
                    "fullname" => $book['fullname'],
                    "slug" => $book['slug'],
                    "status" => $book['status'],
                    "premium" => $book['premium']
            ];
        }
        $data['new_book_data'] = $newDataBook;

        // get category
        $data['category'] = $this->model("Author_model")->getCategoryAll();

        //get notif
        $data['notif'] = $this->model('Author_model')->getNotif();
        $rowNotif = [];
        foreach ($data['notif'] as $n) {
            $rowNotif[$n['id']] = [
                "id" => count(array($n['id']))
            ];
        }
        $data['new_notif'] = $rowNotif;

        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/dashboard', $data);
            $this->view('templates/footer-author');
        }
    }

    public function book_premium()
    {
        $data['judul'] = 'Author - Dashboard';
        $data['set_active'] = 'premium';

        // validating Actor Admin, Author
        $data['validate'] = 'Author_Validate';

        //author id
        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id_author']);

        // id book before published
        $data['books_id'] = $this->model("Author_model")->getBooksAuthorId();

        $newDataBook = [];
        foreach ($data['books_id'] as $book) {
            $total_watcher = $this->model('Author_model')->getWatcher($book['id']);
            $newDataBook[$book['id']] = [
                "total_watcher" => $total_watcher,
                "judul_buku" => $book['judul_buku'],
                "category" => $book['category'],
                "sipnosis" => $book['sipnosis'],
                "image" => $book['image'],
                "tanggal" => $book['tanggal'],
                "fullname" => $book['fullname'],
                "slug" => $book['slug'],
                "status" => $book['status'],
                "premium" => $book['premium']
            ];
        }
        $data['new_book_data'] = $newDataBook;

        // get category
        $data['category'] = $this->model("Author_model")->getCategoryAll();

        //get notif
        $data['notif'] = $this->model('Author_model')->getNotif();
        $rowNotif = [];
        foreach ($data['notif'] as $n) {
            $rowNotif[$n['id']] = [
                "id" => count($n['id'])
            ];
        }
        $data['new_notif'] = $rowNotif;

        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/book_premium', $data);
            $this->view('templates/footer-author');
        }
    }

    public function category($slug)
    {
        $data['judul'] = 'Author - Category';
        $data['set_active'] = 'dashboard';

        // validating Actor Admin, Author
        $data['validate'] = 'Author_Validate';

        //author id
        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id_author']);

        // get category
        $data['category'] = $this->model("Author_model")->getCategoryAll();
        $data['category_data'] = $this->model('Author_model')->getCategorySlug($slug);

        // get watcher 
        $newDataBook = [];
        foreach ($data['category_data'] as $book) {
            $total_watcher = $this->model('Author_model')->getWatcher($book['id']);
            $newDataBook[$book['slug']] = [
                "total_watcher" => $total_watcher,
                "judul_buku" => $book['judul_buku'],
                "category" => $book['category'],
                "sipnosis" => $book['sipnosis'],
                "image" => $book['image'],
                "tanggal" => $book['tanggal'],
                "fullname" => $book['fullname'],
                "slug" => $book['slug'],
                "status" => $book['status'],
                "premium" => $book['premium']
            ];
        }
        $data['new_book_data'] = $newDataBook;

        //get notif
        $data['notif'] = $this->model('Author_model')->getNotif();
        $rowNotif = [];
        foreach ($data['notif'] as $n) {
            $rowNotif[$n['id']] = [
                "id" => count($n['id'])
            ];
        }
        $data['new_notif'] = $rowNotif;

        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/category', $data);
            $this->view('templates/footer-author');
        }
    }

    public function category_premium($slug)
    {
        $data['judul'] = 'Author - Category';
        $data['set_active'] = 'premium';

        // validating Actor Admin, Author
        $data['validate'] = 'Author_Validate';

        //author id
        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id_author']);

        // get category
        $data['category'] = $this->model("Author_model")->getCategoryAll();
        $data['category_data'] = $this->model('Author_model')->getCategorySlug($slug);

        // get watcher 
        $newDataBook = [];
        foreach ($data['category_data'] as $book) {
            $total_watcher = $this->model('Author_model')->getWatcher($book['id']);
            $newDataBook[$book['slug']] = [
                "total_watcher" => $total_watcher,
                "judul_buku" => $book['judul_buku'],
                "category" => $book['category'],
                "sipnosis" => $book['sipnosis'],
                "image" => $book['image'],
                "tanggal" => $book['tanggal'],
                "fullname" => $book['fullname'],
                "slug" => $book['slug'],
                "status" => $book['status'],
                "premium" => $book['premium']
            ];
        }
        $data['new_book_data'] = $newDataBook;

        //get notif
        $data['notif'] = $this->model('Author_model')->getNotif();
        $rowNotif = [];
        foreach ($data['notif'] as $n) {
            $rowNotif[$n['id']] = [
                "id" => count($n['id'])
            ];
        }
        $data['new_notif'] = $rowNotif;

        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/category_premium', $data);
            $this->view('templates/footer-author');
        }
    }

    public function bookDelete($slug)
    {
        $data['judul'] = 'Author - Books';
        $data['set_active'] = 'dashboard';

        // validating Actor Admin, Authpr
        $data['validate'] = 'Author_Validate';

        // inserting to deletebooks 
        $data['del_book'] = $this->model("Author_model")->getBookId($slug);

        //author id
        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id_author']);

        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/bookDelete', $data);
            $this->view('templates/footer-author');
        }
    }

    public function forms()
    {
        $data['judul'] = 'Author - Form';
        $data['set_active'] = 'forms';

        // validating Actor Admin, Authpr
        $data['validate'] = 'Author_Validate';

        //author id
        $data['author_single']= $this->model("Author_model")->getAuthorId($_SESSION['id_author']);
        $data['admin_single'] = '';

        $data['category'] = $this->model("Author_model")->getCategoryAll();

        //get notif
        $data['notif'] = $this->model('Author_model')->getNotif();
        $rowNotif = [];
        foreach ($data['notif'] as $n) {
            $rowNotif[$n['id']] = [
                "id" => count($n['id'])
            ];
        }
        $data['new_notif'] = $rowNotif;
        if (!isset($_SESSION['login-author'])) {
            header("Location: ". baseurl ."/author/index");
        }else{
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/forms', $data);
            $this->view('templates/footer-author');
        }
    }

    public function changesPass()
    {
        $query = $this->model('Author_model')->changesPassAuthor($_POST) > 0;
        if ($query) {
            echo"berhasil";
            var_dump($query);
            Flasher::setFlashAuthorPass('success', 'Berhasil', ' mengganti password');
            header("Location: ".baseurl.'/author/forms');
            exit;
        }else {
            Flasher::setFlashAuthorPass('danger', 'Gagal', ' mengganti password');
            exit;
        }
    }

    public function search()
    {
        $data['judul'] = 'Author - Books';
        $data['set_active'] = 'dashboard';

        // validating Actor Admin, Authpr
        $data['validate'] = 'Author_Validate';

        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id_author']);

        // find the author books and display it with getting the SESSION id author
        $data['books_id'] = $this->model("Author_model")->getBooksAuthorId($_SESSION['id_author']);
        $data['books_id'] = $this->model("Author_model")->searchBooksAuthor($_SESSION['id_author']);

        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/dashboard', $data);
            $this->view('templates/footer-author');
        }
    }

    public function request()
    {
        if ($this->model('Author_model')->requestDeleteBook($_POST) > 0) {
            echo '<script>
                    alert("Success requesting book to delete");
                    setTimeout(function() {
                        window.location.href="dashboard";
                    }, 1000);
                </script>';
            die;
        } else {
            echo 'gagal nambahkan buku';
            exit;
        }
    }

    public function setOut()
    {
        $this->model('Author_model')->logOut();
    }

}
