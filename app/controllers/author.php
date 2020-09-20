<?php 
class Author extends Controller
{
    public function index()
    {  
        if (!isset($_POST['login-author'])) {
                $data['judul'] = 'Author';
                $data['header-author'] = 'header-author';
                $this->view('templates/header', $data);
                $this->view('author/index', $data);
        }else {
            if ($this->model("Author_model")->loginAuthor($_POST) > 0) {
                echo 'berhasil';
                header("Location: " . baseurl . '/author/books');
            } else {
                echo 'gagal';
                Flasher::setFailLoginAdmin('Invalid Username or Password');
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
                Flasher::setFailLoginAdmin('There is an error while Sign up');
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


    public function books()
    {
        $data['judul'] = 'Author - Books';
        $data['set_active'] = 'books';

        //author id
        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id']);

        $data['books_id'] = $this->model("Author_model")->getBooksAuthorId($_SESSION['id']);
        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/books', $data);
            $this->view('templates/footer-author');
        }
    }

    public function forms()
    {
        $data['judul'] = 'Author - Form';
        $data['set_active'] = 'forms';
        //author id
        $data['author_single']= $this->model("Author_model")->getAuthorId($_SESSION['id']);
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

        //author id
        $data['author_single'] = $this->model("Author_model")->getAuthorId($_SESSION['id']);

        $data['books_id'] = $this->model("Author_model")->getBooksAuthorId($_SESSION['id']);
        $data['books_id'] = $this->model("Author_model")->searchBooksAuthor($_SESSION['id']);
        if (!isset($_SESSION['login-author'])) {
            header("Location: " . baseurl . "/author/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('author/books', $data);
            $this->view('templates/footer-author');
        }
    }

    public function setOut()
    {
        $this->model('Author_model')->logOut();
    }

}
