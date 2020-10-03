<?php 

class Dashboard extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['login_user'])) {
            header("Location: " . baseurl ."/home");
        }else {
            $data['judul'] = 'Dashboard - User'; // masuk ke parameter view yaitu $data
            $data['set_active'] = 'index';

            // validate actor user(anonim has been logged in), more validate on header
            $data['validate'] = 'user';
            
            $data['book_limit'] = $this->model('Dashboard_model')->getBookLimit();
            $data['user_single'] = $this->model('Dashboard_model')->getUserId($_SESSION['id']);
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('dashboard/index', $data);
            $this->view('templates/_footer-dashboard');
        }
    }

    public function book()
    {
        $data['judul'] = 'Dashboard - Book User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book';

        // validate actor user(anonim has been logged in), more validate on header
        $data['validate'] = 'user';
        
        $data['book_limit'] = $this->model('Dashboard_model')->getBookLimit();
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);
        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/book', $data);
        $this->view('templates/_footer-dashboard');
    }

    // on click check button gonna display the book with their id
    public function bookData($id)
    {
        $data['judul'] = 'Book - User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book'; //set active class navbar

        // validate actor user(anonim has been logged in), more validate on header
        $data['validate'] = 'user';

        $data['book_limit'] = $this->model('Home_model')->getBookLimit();
        $data['book_single'] = $this->model('Dashboard_model')->getBookId($id);
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/bookData', $data);
        $this->view('templates/_footer-dashboard');
    }

    public function bookUser()
    {
        $data['judul'] = 'Book - User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book_user'; //set active class navbar

        // validate actor user(anonim has been logged in), more validate on header
        $data['validate'] = 'user';

        $data['books_user'] = $this->model('Dashboard_model')->getUserBook($_SESSION['id']);
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/bookUser', $data);
        $this->view('templates/_footer-dashboard');
    }

    // user gonna add their own books to bookmark
    public function addBooks()
    {
        if($this->model('Dashboard_model')->getBookId($_POST['id'])) {
            if ($this->model('Dashboard_model')->addBooksUser($_POST) > 0) {
                echo 'berhasil';
                header("Location: " . baseurl . "/dashboard/booksUser");
                exit;
            } else {
                echo 'gagal nambahkan buku';
                exit;
            }
        }else{
            echo'gagal bos';
        }
    }

    public function search()
    {
        $data['judul'] = 'Daftar Buku';
        $data['set_active'] = 'book'; //set active class navbar

        // validate actor user(anonim has been logged in), more validate on header
        $data['validate'] = 'user';

        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);
        $data['book_limit'] = $this->model('Dashboard_model')->searchBook();

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/book', $data);
        $this->view('templates/footer');
    }
    
    public function setOut()
    {
        $this->model('Dashboard_model')->logOut();
    }
}
