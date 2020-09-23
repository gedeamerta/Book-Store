<?php 
class Admin extends Controller
{
    public function index()
    {
        if (!isset($_POST['login-admin'])) {
            $data['set_active'] = ''; //set active class navbar
            $data['login_user'] = 'login_user'; // disabled username before login

            // for user index
            $data['nav'] = '';
            $data['nav_book'] = '';

            //for user dashboard
            $data['nav_dashboard'] = '';
            $data['nav_book_dashboard'] = '';

            $data['judul'] = 'Admin';
            $data['header-author'] = '';
            $data['header-admin'] = 'header-admin';
            $this->view('templates/header', $data);
            $this->view('admin/index', $data);
        }else {
            if($this->model("Admin_model")->loginAdmin($_POST) > 0){
                var_dump('berhasil');
                header("Location: " . baseurl . '/admin/dashboard');
            }else {
                var_dump('gagal');
                header("Location: " . baseurl . '/admin/index');
            }
        }
    }

    public function dashboard()
    {
        $data['judul'] = 'Admin - Dashboard';
        $data['set_active'] = 'dashboard';

        // search book validation
        $data['search_admin'] = 'search_byAdmin';
        $data['search_author'] = 'search_byAuthor';

        // get actor admin and author id validation
        $data['admin_single'] = $this->model("Admin_model")->getAdminId($_SESSION['id_admin']);
        $data['author_single'] = '';
        
        $data['book'] = $this->model("Admin_model")->getAllBook();

        // validation for author image, bcs admin isn't display their picture profile
        $data['author_image'] = '';
        
        if (!isset($_SESSION['login_admin'])) {
            header("Location: " . baseurl . "/admin/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('admin/dashboard', $data);
            $this->view('templates/footer-author');
        }
    }

    public function search()
    {
        $data['judul'] = 'Admin - Dashboard';
        $data['set_active'] = 'dashboard';

        $data['search_admin'] = 'search_byAdmin';
        $data['search_author'] = 'search_byAuthor';
        
        $data['admin_single'] = $this->model("Admin_model")->getAdminId($_SESSION['id_admin']);
        $data['author_single'] = '';

        $data['book'] = $this->model("Admin_model")->getAllBook();
        $data['book'] = $this->model('Admin_model')->searchBook();

        if (!isset($_SESSION['login_admin'])) {
            header("Location: " . baseurl . "/admin/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('admin/dashboard', $data);
            $this->view('templates/footer-author');
        }
    }

    public function setOut($data)
    {   
        $this->model('Admin_model')->logOut();
    }
}
