<?php 
class Admin_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAdminBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $query = "SELECT * FROM admin WHERE $param =: $param";
            $this->db->query($query);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function loginAdmin($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        if (isset($username) || $username !== "") {
            if ($data_user = $this->getAdminBy('username', $username)) {
                $password_db = $data_user['password'];

                if (password_verify($password, $password_db || $password == $password_db)) {
                    echo 'berhasil';
                    return true;
                } else {
                    echo 'gagal';
                    return false;
                }
            }
        }else{
            echo'username takda';
        }
    }
}
