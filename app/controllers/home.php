<?php 
class Home extends Controller 
{
    public function index()
    {
        $data['judul'] = 'Home - User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'index'; //set active class navbar

        // validate anonim(user before logged in), more validate on header
        $data['validate'] = 'anonim';

        if (isset($_SESSION['login_user'])) {
            header("Location: " . baseurl . '/dashboard');
        }else{
            $data['book_limit'] = $this->model('Home_model')->getBookLimit();
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }

    }

    public function book()
    {
        $data['judul'] = 'Book List - User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book'; //set active class navbar

        $data['validate'] = 'anonim';

        $data['book'] = $this->model('Home_model')->getAllBook();
        $data['book_limit'] = $this->model('Home_model')->getBookLimit();

        if (isset($_SESSION['login-user'])) {
            header("Location: " . baseurl . '/dashboard');
        }else{
            $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
            $this->view('home/book', $data);
            $this->view('templates/footer');
        }

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
                header('Location: ' . baseurl . '/home');
            }else{
                var_dump("gagal");
                Flasher::setFailRegister('Anda gagal untuk registrasi');
                header('Location: '. baseurl .'/home');
            }
        } 
    }

    public function login()
    {
        if ($this->model("Home_model")->loginUser($_POST) > 0) {
            var_dump("berhasil");
            Flasher::setSuccessLogin('Login Berhasil');
            header('Location: ' . baseurl . '/dashboard');
        } else {
            var_dump("gagal");
            Flasher::setFailLogin('Invalid Account');
            header('Location: ' . baseurl . '/home');
            }
    }

    public function search()
    {   
        $data['judul'] = 'Daftar Buku';
        $data['set_active'] = 'book'; //set active class navbar

        $data['validate'] = 'anonim';

        $data['book'] = $this->model('Home_model')->getAllBook();
        $data['book_limit'] = $this->model('Home_model')->getBookLimit();
        $data['book'] = $this->model('Home_model')->searchBook();

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('home/book', $data);
        $this->view('templates/footer');
    }
}