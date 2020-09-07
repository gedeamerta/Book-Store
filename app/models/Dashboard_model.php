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

    public function logOut()
    {
        session_unset();
        $_SESSION = [];
        session_destroy();

        header("Location: ". baseurl . '/home');
    }
}
