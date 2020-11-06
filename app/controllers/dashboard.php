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

            //get user premium
            $data['premium'] = $this->model('Dashboard_model')->getUserPremium();

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

        //get user premium
        $data['premium'] = $this->model('Dashboard_model')->getUserPremium();

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

        //get user premium
        $data['premium'] = $this->model('Dashboard_model')->getUserPremium();

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
        $data['rate'] = $this->model('Dashboard_model')->getRateBook($id_book);

        //get user premium
        $data['premium'] = $this->model('Dashboard_model')->getUserPremium();

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

        //get user premium
        $data['premium'] = $this->model('Dashboard_model')->getUserPremium();

        $this->view('templates/header', $data); // ada 2 param pada $this->view yaitu 'templates/header' dan $data
        $this->view('dashboard/bookUser', $data);
        $this->view('templates/_footer-dashboard');
    }


    // wannabe user premium
    public function package()
    {
        $data['judul'] = 'Book - Package'; // masuk ke parameter view yaitu $data

        // validate actor user (anonim has been logged in), more validate on header
        $data['validate'] = 'user';

        //get user data while login
        $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);

        // just trick for hiding the footer bar
        $data['user_premium'] = $this->model('Dashboard_model')->getPay($_SESSION['id']);
        
        $data['package'] = $this->model('Dashboard_model')->getPackage();
        
        //get user premium
        $data['premium'] = $this->model('Dashboard_model')->getUserPremium();
        
        $this->view('templates/header', $data);
        $this->view('dashboard/package', $data);
        $this->view('templates/footer', $data);
    }

    public function user_premium()
    {
        if ($this->model('Dashboard_model')->user_premium($_POST) > 0) {
            echo
                '<script>
                        alert("Your account success requested to premium, please follow the next steps");
                        setTimeout(function() {
                            window.location.href="/dashboard/pay";
                        }, 1000);
                    </script>';
        }
    }

    public function pay()
    {
        if (!isset($_SESSION['login_user'])) {
            header("Location: " . baseurl . "/home");
        }else{
            $data['judul'] = 'Book - Payment';

            $data['set_active'] = 'payment'; //set active class navbar

            $data['validate'] = 'user';

            //get user data while login
            $data['user_single'] = $this->model('Home_model')->getUserId($_SESSION['id']);

            $data['user_premium'] = $this->model('Dashboard_model')->getPay($_SESSION['id']);

            // just trick for hiding the footer bar
            $data['package'] = $this->model('Dashboard_model')->getPackage();

            //get user premium
            $data['premium'] = $this->model('Dashboard_model')->getUserPremium();

            $this->view('templates/header',$data);
            $this->view('dashboard/pay', $data);
            $this->view('templates/footer', $data);
        }
    }

    public function transfer()
    {
        if ($this->model('Dashboard_model')->transferMoney($_POST) > 0) {
            echo
                '<script>
                        alert("Success to transfer");
                        setTimeout(function() {
                            window.location.href="/dashboard";
                        }, 1000);
                    </script>';
            exit;
        } else {
            exit;
        }
    }

    // user gonna add their own books to bookmark
    public function addBooks($id)
    {
        if ($this->model('Dashboard_model')->addBooksUser($id) > 0) {
            echo 'berhasil';
            header("Location: " . baseurl . "/dashboard/bookUser");
            exit;
        } else {
            exit;
        }
    }

    public function clear_book($id_book)
    {
        if ($this->model('Dashboard_model')->clear_user_book($id_book) > 0) {
            echo
                '<script>
                    alert("Success clearing the books");
                    setTimeout(function() {
                        window.location.href="/dashboard;
                    }, 1000);
                </script>';
            exit;
        } else {
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

    public function rate($id_book)
    {
        if ($this->model('Dashboard_model')->rateBooks($id_book) > 0) {
            echo "berhasil rate";
            header("Location: ".baseurl."/dashboard");
        }
    }
    
    public function setOut()
    {
        $this->model('Dashboard_model')->logOut();
    }
}
