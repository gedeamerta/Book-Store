<?php 
class Admin extends Controller
{
    public function index()
    {  
        if (!isset($_POST['login'])) {
            $data['judul'] = 'Admin';
            $data['header-admin'] = 'header-admin';
            $this->view('templates/header', $data);
            $this->view('admin/index', $data);
        }else {
            if ($this->model("Admin_model")->loginAdmin($_POST) > 0) {
                echo'berhasil';
            }else {
                echo'gagal';
            }
        }
    }

    public function forms()
    {
        $data['judul'] = 'Admin - Form';
        $this->view('templates/header', $data);
        $this->view('admin/form', $data);
        $this->view('templates/footer');
    }

}
