<?php 
class Home extends Controller 
{
    public function index()
    {
        $data['judul'] = 'Home -User'; // masuk ke parameter view yaitu $data
        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('home/index');
        $this->view('templates/footer');
    }

    public function book()
    {
        $data['judul'] = 'Book - User'; // masuk ke parameter view yaitu $data
        $this->view('templates/header-book', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('home/book');
        $this->view('templates/footer');
    }

    public function store()
    {
        $data['judul'] = 'Book Store - User'; // masuk ke parameter view yaitu $data
        $this->view('templates/header-bookStore', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('home/store');
        $this->view('templates/footer');
    }

    public function register()
    {
        if (!isset($_POST['register'])) {
            $data['judul'] = 'Home - User'; // masuk ke parameter view yaitu $data
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('home/index');
            $this->view('templates/footer');
        }else{
            if ($this->model("Home_model")->registerUser($_POST) > 0) {
                var_dump("berhasil");
            }else{
                var_dump("gagal");
                header('Location: '. baseurl .'/home');
            }
        } 
    }

    public function login()
    {
        if (!isset($_POST['login'])) {
            $data['judul'] = 'Home - User'; // masuk ke parameter view yaitu $data
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('home/index');
            $this->view('templates/footer');
        } else {
            if ($this->model("Home_model")->loginUser($_POST) > 0) {
                var_dump("berhasil");
                header('Location: ' . baseurl . '/dashboard');
                die;
            } else {
                var_dump("gagal");
                die;
            }
        }
    }
}