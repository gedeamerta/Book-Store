<?php 

class Dashboard extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['login'])) {
            $data['judul'] = 'Home - User'; // masuk ke parameter view yaitu $data
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('home/index');
            $this->view('templates/footer');
        }else {
            $data['judul'] = 'Dashboard - User'; // masuk ke parameter view yaitu $data
            $this->view('templates/_header-user', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('dashboard/index');
            $this->view('templates/footer');
        }
    }

    public function book()
    {
        $data['judul'] = 'Dashboard - Book User'; // masuk ke parameter view yaitu $data
        $this->view('templates/_header-user-book', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/book');
        $this->view('templates/footer');
    }

    public function store()
    {
        $data['judul'] = 'Dashboard - Book Store User'; // masuk ke parameter view yaitu $data
        $this->view('templates/_header-user-store', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/store');
        $this->view('templates/footer');
    }
}
