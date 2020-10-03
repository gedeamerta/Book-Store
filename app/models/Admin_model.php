<?php 

class Admin_model 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAdminBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $this->db->query("SELECT * FROM admins WHERE $param = :$param");
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getAdminId($id)
    {
        $this->db->query("SELECT * FROM admins WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // get all of the books
    public function getBookRequest()
    {
        $this->db->query('SELECT a.*, b.id_book FROM books a INNER JOIN deletebooks b ON a.id = b.id_book WHERE a.id = b.id_book');
        return $this->db->resultAll();
    }

    public function loginAdmin($data)
    {
        $username = $data['username'];
        $password = $data['password']; //password on admin form input

        if ($data_admin = $this->getAdminBy('username', $username)) {
            $password_db = $data_admin['password']; // password from tb admnin

            if ($password == $password_db || password_verify($password, $password_db)) {
                $_SESSION['id_admin'] = $data_admin['id'];
                $_SESSION['fullname_admin'] = $data_admin['fullname'];
                $_SESSION['login_admin'] = 'login_admin';
                echo "berhasil";
                return true;
            }else{
                echo"gagal";
                return false;
            }
        }
    }

    public function searchBook()
    {
        if (!isset($_POST['keyword'])) {
            header("Location: " . baseurl . '/admin/dashboard');
        }else {
            $keyword = $_POST['keyword'];
            $this->db->query("SELECT * FROM books WHERE judul_buku LIKE :keyword");
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultAll();
        }
    }
    
    public function deleteBooksAuthor($id)
    {
        $query = "DELETE a.*, b.* FROM deletebooks a INNER JOIN books b WHERE a.id_book = :id_book and b.id = :id";
        $this->db->query($query);
        $this->db->bind('id_book', $id);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function logOut()
    {
        session_destroy();
        $_SESSION = [];
        unset($_SESSION);

        header("Location: " . baseurl . '/admin/index');
    }
}
