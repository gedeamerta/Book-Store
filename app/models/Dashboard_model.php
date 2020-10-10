<?php 
class Dashboard_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;    
    }

    public function getUserBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_user = "SELECT * FROM pengguna WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getBooksUserBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_user = "SELECT * FROM users_books WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function get_ipadd($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_user = "SELECT * FROM watcher WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getBookLimit()
    {
        $this->db->query('SELECT * FROM books WHERE books.status = 1 ORDER BY id DESC LIMIT 6');
        return $this->db->resultAll();
    }

    // get all of the books
    public function getAllBook()
    {
        $this->db->query('SELECT * FROM books WHERE books.status = 1');
        return $this->db->resultAll();
    }

    public function getUserBook($id)
    {
        $this->db->query("SELECT a.*, b.* FROM books a INNER JOIN users_books b ON a.id = b.id_book WHERE b.id_user = '$id'");
        return $this->db->resultAll();
    }

    public function getBookId($id_book)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif (!empty($_SERVER['HTTP_X_FORWARD_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARD_FOR'];
        }else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        date_default_timezone_set("Asia/Makassar");
        $tanggal = date("Y/m/d");
        $waktu = date("h:i:sa");

        if ($this->get_ipadd('ipusers', $ip) && $this->get_ipadd('id_user', $_SESSION['id']) && $this->get_ipadd('tanggal', $tanggal)) {
           
        }else {
            $query = "INSERT INTO watcher (ipusers, id_user, id_book, tanggal, waktu) VALUES (:ipusers, :id_user, :id_book, :tanggal, :waktu)";
            $this->db->query($query);
            $this->db->bind('ipusers', $ip);
            $this->db->bind('id_user', $_SESSION['id']);
            $this->db->bind('id_book', $id_book);
            $this->db->bind('tanggal', $tanggal);
            $this->db->bind('waktu', $waktu);
            $this->db->execute();
        }
        $this->db->query("SELECT * FROM books WHERE id = :id"); // mengapa tidak menggunakan variabel $slug disana karena untuk menghindari sql injection, jadi perlu di bind terlebih dahulu 
        $this->db->bind('id', $id_book);
        return $this->db->single();
    }

    public function getUserId($id)
    {
        $this->db->query('SELECT * FROM pengguna WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getCategory()
    {
        $this->db->query('SELECT * FROM category');
        return $this->db->resultAll();
    }

    public function getCategorySlug($slug)
    {
        $this->db->query("SELECT a.*, b.slug FROM books a INNER JOIN category b ON a.category = b.slug WHERE b.slug = '$slug'");
        $this->db->bind('slug', $slug);
        return $this->db->resultAll();
    }

    public function addBooksUser($id)
    {   
        if ($this->getBooksUserBy('id_book', $id)) {
            echo
                '<script>
                        alert("Books has been save it");
                        setTimeout(function() {
                            window.location.href="/bookStore/dashboard";
                        }, 1000);
                    </script>';
        }else {
            $query = "INSERT INTO users_books (id_user, id_book, tanggal) VALUES (:id_user, :id_book, now())";    
            $this->db->query($query);
            $this->db->bind('id_book', $id);
            $this->db->bind('id_user', $_SESSION['id']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function searchBook()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM books WHERE judul_books LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultAll();

    }

    public function logOut()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        header("Location: ". baseurl . '/home');
    }
}
