<?php 

class Dashboard extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['login'])) {
            $data['judul'] = 'Home - User'; // masuk ke parameter view yaitu $data
            $data['set_active'] = 'index'; //set active class navbar
            $data['header-author'] = ''; //author header
            $data['login_user'] = ''; // disabled username before login

            //for user index
            $data['nav'] = 'index';
            $data['nav_book'] = 'book';

            //for user dashboard
            $data['nav_dashboard'] = 'index_dashboard';
            $data['nav_book_dashboard'] = 'book_dashboard';

            $data['book_limit'] = $this->model('Home_model')->getBookLimit();
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('home/index',$data);
            $this->view('templates/footer',$data);
        }else {
            $data['judul'] = 'Dashboard - User'; // masuk ke parameter view yaitu $data
            $data['set_active'] = 'index';
            $data['header-author'] = ''; //author header
            $data['login_user'] = 'login_user'; // disabled username before login

            //for user index
            $data['nav'] = '';
            $data['nav_book'] = '';

            //for user dashboard
            $data['nav_dashboard'] = 'index_dashboard';
            $data['nav_book_dashboard'] = 'book_dashboard';

            $data['book'] = $this->model('Home_model')->getAllBook();
            $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('dashboard/index', $data);
            $this->view('templates/_footer-dashboard');
        }
    }

    public function book()
    {
        $data['judul'] = 'Dashboard - Book User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book';
        $data['header-author'] = ''; //author header
        $data['login_user'] = 'login_user'; // disabled username before login

        //for user index
        $data['nav'] = '';
        $data['nav_book'] = '';

        // for user dashboard
        $data['nav_dashboard'] = 'index_dashboard';
        $data['nav_book_dashboard'] = 'book_dashboard';
        
        $data['book_limit'] = $this->model('Dashboard_model')->getBookLimit();
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);
        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/book', $data);
        $this->view('templates/_footer-dashboard');
    }
    
    public function setOut()
    {
        $this->model('Dashboard_model')->logOut();
    }
}
