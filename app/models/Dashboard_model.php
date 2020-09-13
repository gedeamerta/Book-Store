<?php 
class Dashboard_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;    
    }

    public function getBookLimit()
    {
        $this->db->query('SELECT * FROM buku ORDER BY id LIMIT 6');
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


    public function addBooksUser()
    {

    }

    public function logOut()
    {
        session_unset();
        $_SESSION = [];
        session_destroy();

        header("Location: ". baseurl . '/home');
    }
}
