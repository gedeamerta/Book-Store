<?php 

class Dashboard extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['login-user'])) {
            $data['judul'] = 'Home - User'; // masuk ke parameter view yaitu $data
            $data['set_active'] = 'index'; //set active class navbar
            $data['login_user'] = ''; // disabled username before login

            //for user index
            $data['nav'] = 'index';
            $data['nav_book'] = 'book';

            //for user dashboard
            $data['nav_dashboard'] = '';
            $data['nav_book_dashboard'] = '';
            $data['nav_book_dashboard_user'] = '';

            $data['book_limit'] = $this->model('Home_model')->getBookLimit();
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('home/index',$data);
            $this->view('templates/footer',$data);
        }else {
            $data['judul'] = 'Dashboard - User'; // masuk ke parameter view yaitu $data
            $data['set_active'] = 'index';
            $data['login_user'] = 'login_user'; // disabled username before login

            //for user index
            $data['nav'] = '';
            $data['nav_book'] = '';

            //for user dashboard
            $data['nav_dashboard'] = 'index_dashboard';
            $data['nav_book_dashboard'] = 'book_dashboard';
            $data['nav_book_dashboard_user'] = 'book_user';
            
            $data['user_single'] = $this->model('Dashboard_model')->getUserId($_SESSION['id']);
            $data['book_limit'] = $this->model('Dashboard_model')->getBookLimit();
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('dashboard/index', $data);
            $this->view('templates/_footer-dashboard');
        }
    }

    public function book()
    {
        $data['judul'] = 'Dashboard - Book User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book';
        $data['login_user'] = 'login_user'; // disabled username before login

        //for user index
        $data['nav'] = '';
        $data['nav_book'] = '';

        // for user dashboard
        $data['nav_dashboard'] = 'index_dashboard';
        $data['nav_book_dashboard'] = 'book_dashboard';
        $data['nav_book_dashboard_user'] = 'book_user';
        
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
        $data['login_user'] = 'login_user'; // disabled username before login

        // for user index
        $data['nav'] = '';
        $data['nav_book'] = '';
        
        // for user dashboard
        $data['nav_dashboard'] = 'index_dashboard';
        $data['nav_book_dashboard'] = 'book_dashboard';
        $data['nav_book_dashboard_user'] = 'book_user';

        $data['book_limit'] = $this->model('Home_model')->getBookLimit();
        $data['book_single'] = $this->model('Dashboard_model')->getBookId($id);
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/bookData', $data);
        $this->view('templates/_footer-dashboard');
    }

    public function booksUser()
    {
        $data['judul'] = 'Book - User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book_user'; //set active class navbar
        $data['login_user'] = 'login_user'; // disabled username before login

        // for user index
        $data['nav'] = '';
        $data['nav_book'] = '';

        // for user dashboard
        $data['nav_dashboard'] = 'index_dashboard';
        $data['nav_book_dashboard'] = 'book_dashboard';
        $data['nav_book_dashboard_user'] = 'book_user';

        $data['books_user'] = $this->model('Dashboard_model')->getUserBook($_SESSION['id']);
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/booksUser', $data);
        $this->view('templates/_footer-dashboard');
    }

    // user gonna add their own books to bookmark
    public function addBooks()
    {
        if($this->model('Dashboard_model')->getBookId($_POST['id'])) {
            if ($this->model('Dashboard_model')->addBooksUser($_POST) > 0) {
                echo 'berhasil';
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
        $data['login_user'] = 'login_user'; // disabled username before login

        // for user index
        $data['nav'] = '';
        $data['nav_book'] = '';
        
        // for user dashboard
        $data['nav_dashboard'] = 'index_dashboard';
        $data['nav_book_dashboard'] = 'book_dashboard';
        $data['nav_books_user'] = 'booksUser';

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
