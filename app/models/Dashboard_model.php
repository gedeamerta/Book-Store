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
            $data_user = "SELECT * FROM users WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getBookLimit()
    {
        $this->db->query('SELECT * FROM buku ORDER BY id DESC LIMIT 6');
        return $this->db->resultAll();
    }

    // get all of the books
    public function getAllBook()
    {
        $this->db->query('SELECT * FROM buku');
        return $this->db->resultAll();
    }

    public function getUserBook($id)
    {
        $this->db->query("SELECT a.*, b.id FROM buku a INNER JOIN users b ON a.id_user =b.id WHERE a.id_user = '$id'");
        return $this->db->resultAll();
    }

    // get id book , first thing is u have to query the books and then bind the book id , at the end u return the single fetch
    public function getBookId($id)
    {
        $this->db->query('SELECT * FROM buku WHERE id=:id'); // mengapa tidak menggunakan variabel $id disana karena untuk menghindari sql injection, jadi perlu di bind terlebih dahulu 
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getUserId($id)
    {
        $this->db->query('SELECT * FROM users WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addBooksUser($data)
    {  
        $id_book = $this->getBookId($data['id']);
        $query = "UPDATE buku SET id_user = :id_user WHERE id =:id";    
        $this->db->query($query);
        $this->db->bind('id_user', $_SESSION['id']);
        $this->db->bind('id', $id_book['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchBook()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM buku WHERE judul_buku LIKE :keyword";
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
