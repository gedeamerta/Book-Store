<?php 
class Author extends Controller
{
    public function index()
    {  
        if (!isset($_POST['login-author'])) {
            $data['set_active'] = ''; //set active class navbar
            $data['login_user'] = 'login_user'; // disabled username before login

            // for user index
            $data['nav'] = '';
            $data['nav_book'] = '';

            //for user dashboard
            $data['nav_dashboard'] = '';
            $data['nav_book_dashboard'] = '';

            $data['judul'] = 'Author';
            $data['header-author'] = 'header-author';
            $data['header-admin'] = '';
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
            $data['header-author'] = 'header-author';
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
        $data['judul'] = 'Author - Books';
        $data['set_active'] = 'books';

        $data['search_admin'] = '';
        $data['search_author'] = 'search_byAuthor';

        //author id
        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id_author']);
        $data['admin_single'] = '';

        $data['books_id'] = $this->model("Author_model")->getBooksAuthorId($_SESSION['id_author']);

        //image author
        $data['author_image'] = 'author_image';

        //logout 
        $data['logout_author'] = 'logout_author';
        $data['logout_admin'] = '';

        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/dashboard', $data);
            $this->view('templates/footer-author');
        }
    }

    public function forms()
    {
        $data['judul'] = 'Author - Form';
        $data['set_active'] = 'forms';

        // search validation
        $data['search_admin'] = '';
        $data['search_author'] = 'search_byAuthor';

        //author id
        $data['author_single']= $this->model("Author_model")->getAuthorId($_SESSION['id_author']);
        $data['admin_single'] = '';

        //image author
        $data['author_image'] = 'author_image';

        //logout 
        $data['logout_author'] = 'logout_author';
        $data['logout_admin'] = '';

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
            exit;
        }
    }

    public function search()
    {
        $data['judul'] = 'Author - Books';
        $data['set_active'] = 'books';

        $data['search_admin'] = '';
        $data['search_author'] = 'search_byAuthor';

        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id_author']);
        $data['admin_single'] = '';

        //image author
        $data['author_image'] = 'author_image';

        //logout 
        $data['logout_author'] = 'logout_author';
        $data['logout_admin'] = '';

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

    public function delete()
    {
        if ($this->model('Author_model')->deleteBookAuthor($_SESSION['id']) > 0) {
            echo"berhasil";
        }else {
            echo"gagal";
        }
    }

    public function setOut()
    {
        $this->model('Author_model')->logOut();
    }

}
