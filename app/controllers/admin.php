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

        //get notif
        $data['notif'] = $this->model('Admin_model')->getNotif();

        //delete request from author
        $data['book_author'] = $this->model('Admin_model')->getBookAuthor();

        //category book
        $data['category'] = $this->model('Admin_model')->getCategory();

        if (!isset($_SESSION['login_admin'])) {
            header("Location: " . baseurl . "/admin/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('admin/dashboard', $data);
            $this->view('templates/footer-author');
        }
    }

    public function publish($id)
    {
        if ($this->model('Admin_model')->publishBook($id) > 0) {
            echo
                '<script>
                        alert("Books has been published");
                        setTimeout(function() {
                            window.location.href="/admin/dashboard";
                        }, 1000);
                    </script>';
            die;
        }else {
            echo "failed publish";
        }
    }

    public function user_premium()
    {
        $data['judul'] = 'Admin - Books';
        $data['set_active'] = 'premium';

        // validating Actor Admin, Authpr
        $data['validate'] = 'Admin_Validate';

        //get notif
        $data['notif'] = $this->model('Admin_model')->getNotif();

        //author id
        $data['admin_single'] = $this->model("Admin_model")->getAdminId($_SESSION['id_admin']);

        //get user premium 
        $data['user_premium'] = $this->model('Admin_model')->getUserPremium();

        if (!isset($_SESSION['login_admin'])) {
            header("Location: " . baseurl . "/admin/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('admin/user_premium', $data);
            $this->view('templates/footer-author');
        }
    }

    public function accept_request()
    {
        if ($this->model('Admin_model')->accept_request_premium($_POST) > 0) {
            echo
                '<script>
                        alert("Success Accept User");
                        setTimeout(function() {
                            window.location.href="/admin/user_premium";
                        }, 1000);
                    </script>';
        }else {
            echo "gagal";
        }
    }

    public function forms()
    {
        $data['judul'] = 'Admin - Forms';
        $data['set_active'] = 'forms';

        // validating Actor Admin, Authpr
        $data['validate'] = 'Admin_Validate';

        // get actor admin and author id validation
        $data['admin_single'] = $this->model("Admin_model")->getAdminId($_SESSION['id_admin']);

        //get notif
        $data['notif'] = $this->model('Admin_model')->getNotif();

        $this->view('templates/sidebar-author', $data);
        $this->view('templates/header-author', $data);
        $this->view('admin/forms', $data);
        $this->view('templates/footer-author');
    }

    public function addAdmin()
    {
        if($this->model('Admin_model')->addNewAdmin($_POST) > 0)
        {
            echo "berhasil";
            Flasher::setNewAdminFlash('success', 'Success', ' add new Admin');
            header("Location: " . baseurl . "/admin/forms");
        }else {
            var_dump($_POST);
            Flasher::setNewAdminFlash('danger', 'Fail', ' add new Admin');
            header("Location: " . baseurl . "/admin/forms");
        }
    }

    public function update()
    {
        if ($this->model('Admin_model')->updatePassword($_POST) > 0) {
            echo "berhasil";
            Flasher::setAdminUpdateFlash('success', 'Success', ' update password');
            header("Location: " . baseurl . "/admin/forms");
        } else {
            var_dump($_POST);
            Flasher::setAdminUpdateFlash('danger', 'Fail', ' update password');
            header("Location: " . baseurl . "/admin/forms");
        }
    }

    public function addCategory()
    {
        if ($this->model('Admin_model')->addCategoryBooks($_POST) > 0) {
            echo "berhasil";
            Flasher::setCategoryFlash('success', 'Success', ' add category');
            header("Location: " . baseurl . "/admin/forms");
        }else {
            echo "gagal";
            Flasher::setCategoryFlash('danger', 'Fail', ' add category');
            header("Location: " . baseurl . "/admin/forms");
        }
    }

    public function category($slug)
    {
        $data['judul'] = 'Admin - Category';
        $data['set_active'] = 'dashboard';

        // validating Actor Admin, Authpr
        $data['validate'] = 'Admin_Validate';

        // get actor admin and author id validation
        $data['admin_single'] = $this->model("Admin_model")->getAdminId($_SESSION['id_admin']);

        //get notif
        $data['notif'] = $this->model('Admin_model')->getNotif();

        //books from author
        $data['book_author'] = $this->model('Admin_model')->getBookAuthor();

        //category book
        $data['category'] = $this->model('Admin_model')->getCategory();
        $data['category_data'] = $this->model('Admin_model')->getCategorySlug($slug);

        if (!isset($_SESSION['login_admin'])) {
            header("Location: " . baseurl . "/admin/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('admin/category', $data);
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

        // books from author
        $data['book_author'] = $this->model('Admin_model')->getBookAuthor();
        $data['book_author'] = $this->model('Admin_model')->searchBook();

        //get notif
        $data['notif'] = $this->model('Admin_model')->getNotif();

        //category book
        $data['category'] = $this->model('Admin_model')->getCategory();

        if (!isset($_SESSION['login_admin'])) {
            header("Location: " . baseurl . "/admin/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('admin/dashboard', $data);
            $this->view('templates/footer-author');
        }
    }

    public function delete()
    {
        $data['judul'] = 'Admin - Delete';
        $data['set_active'] = 'delete';

        // validating Actor Admin, Authpr
        $data['validate'] = 'Admin_Validate';

        // get actor admin and author id validation
        $data['admin_single'] = $this->model("Admin_model")->getAdminId($_SESSION['id_admin']);

        //get notif
        $data['notif'] = $this->model('Admin_model')->getNotif();

        //delete request from author
        $data['req_del_book'] = $this->model('Admin_model')->getBookRequest();

        if (!isset($_SESSION['login_admin'])) {
            header("Location: " . baseurl . "/admin/index");
        } else {
            $this->view('templates/sidebar-author', $data);
            $this->view('templates/header-author', $data);
            $this->view('admin/delete', $data);
            $this->view('templates/footer-author');
        }
    }

    public function deleteBook($id)
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
