<?php 
class Dashboard_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;    
    }

    public function logOut()
    {
        session_unset();
        $_SESSION = [];
        session_destroy();

        header("Location: ". baseurl . '/home');
    }
}
