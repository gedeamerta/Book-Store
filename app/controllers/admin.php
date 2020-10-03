<?php 
class Admin extends Controller
{
    public function index()
    {
        if (!isset($_POST['login-admin'])) {
            $data['set_active'] = ''; //set active class navbar
            $data['login_user'] = 'login_user'; // disabled username before login

            // validating Actor Admin, Authpr
            $data['validate'] = 'Admin_Validate';

            $data['judul'] = 'Admin';
            $this->view('templates/header', $data);
            $this->view('admin/index', $data);
        }else {
            if($this->model("Admin_model")->loginAdmin($_POST) > 0){
                var_dump('berhasil');
                header("Location: " . baseurl . '/admin/dashboard');
            }else {
                var_dump('gagal');
                Flasher::setFailLoginAuthor('Invalid Username or Password');
                header("Location: " . baseurl . '/admin/index');
            }
        }
    }

    public function dashboard()
    {
        $data['judul'] = 'Admin - Dashboard';
        $data['set_active'] = 'dashboard';

        // validating Actor Admin, Authpr
        $data['validate'] = 'Admin_Validate';

        // get actor admin and author id validation
        $data['admin_single'] = $this->model("Admin_model")->getAdminId($_SESSION['id_admin']);
        $data['req_del_book'] = $this->model('Admin_model')->getBookRequest();
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

        // validating Actor Admin, Authpr
        $data['validate'] = 'Admin_Validate';

        $data['admin_single'] = $this->model("Admin_model")->getAdminId($_SESSION['id_admin']);

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

    public function delete($id)
    {
        if ($this->model('Admin_model')->deleteBooksAuthor($id) > 0) {
            echo
                '<script>
                        alert("Books has been deleted");
                        setTimeout(function() {
                            window.location.href="/bookStore/admin/dashboard";
                        }, 1000);
                    </script>';
            die;
        }else {
            echo "gagal";
            var_dump($this->model('Admin_model')->deleteBooksAuthor($id));
        }
    }

    public function setOut()
    {   
        $this->model('Admin_model')->logOut();
    }
}
