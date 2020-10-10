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
        
        //get book for limit 5
        $data['book_limit'] = $this->model('Dashboard_model')->getBookLimit();

        //get user acc
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);

        //category list
        $data['category'] = $this->model('Dashboard_model')->getCategory();

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/book', $data);
        $this->view('templates/_footer-dashboard');
    }

    public function category($slug)
    {
        $data['judul'] = 'Dashboard - Book User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book';

        // validate actor user(anonim has been logged in), more validate on header
        $data['validate'] = 'user';

        //get book for limit 5
        $data['book_limit'] = $this->model('Dashboard_model')->getBookLimit();

        //get user acc
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);

        //category list
        $data['category'] = $this->model('Dashboard_model')->getCategory();
        $data['category_data'] = $this->model('Dashboard_model')->getCategorySlug($slug);

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/category', $data);
        $this->view('templates/_footer-dashboard');
    }

    // on click check button gonna display the book with their id
    public function bookData($id_book)
    {
        $data['judul'] = 'Book - User'; // masuk ke parameter view yaitu $data
        $data['set_active'] = 'book'; //set active class navbar

        // validate actor user(anonim has been logged in), more validate on header
        $data['validate'] = 'user';

        $data['book_limit'] = $this->model('Home_model')->getBookLimit();
        $data['book_single'] = $this->model('Dashboard_model')->getBookId($id_book);
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
    public function addBooks($id)
    {
        if ($this->model('Dashboard_model')->addBooksUser($id) > 0) {
            echo 'berhasil';
            header("Location: " . baseurl . "/dashboard/bookUser");
            exit;
        } else {
            echo 'gagal nambahkan buku';
            exit;
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
        $this->view('templates/_footer-dashboard');
    }
    
    public function setOut()
    {
        $this->model('Dashboard_model')->logOut();
    }
}
