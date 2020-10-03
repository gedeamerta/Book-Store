<?php 
class Home_model 
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

    // get all of the books
    public function getAllBook()
    {
        $this->db->query('SELECT * FROM books');
        return $this->db->resultAll();
    }

    public function getBookLimit()
    {
        $this->db->query('SELECT * FROM books ORDER BY id DESC LIMIT 6');
        return $this->db->resultAll();
    }

    public function getUserId($id)
    {
        $this->db->query('SELECT * FROM pengguna WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


    public function registerUser($data)
    {
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $password2 = htmlspecialchars($data['password2']);

        //validate password
        $uppercase =  preg_match('@[A-Z]@', $password);
        $lowercase =  preg_match('@[a-z]@', $password);
        $number =  preg_match('@[0-9]@', $password);

        //first check it out if there is an email on database, and if empty email go to register progress
        if ($data_user = $this->getUserBy("email", $email) || $data_user = $this->getUserBy("username", $username)) {
            var_dump("email dan username sudah ada");
        } else {
            if (isset($password) && $password !== "" || isset($password2) && $password2 !== "") {
                if ($password === $password2) {
                    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                        echo 
                        '<script>
                            alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number.")
                        </script>';
                    } else {
                        $query = "INSERT INTO pengguna(username, email, password) VALUES(:username, :email, :password)";

                        $this->db->query($query);
                        $this->db->bind("username", $username);
                        $this->db->bind("email", $email);
                        $this->db->bind("password", password_hash($password, PASSWORD_DEFAULT));
                        $this->db->execute();
                        return $this->db->rowCount();
                    }
                } else {
                    echo "password kosong";
                    header("Location: ". baseurl . '/home');
                }
            } else {
                echo "password masih belom dimasukin";
                header("Location: " . baseurl . '/home');
            }
        }
    }

    public function loginUser($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        if (isset($username) && $username !== "") {
            if ($data_user = $this->getUserBy('username', $username)) {
                $password_db = $data_user['password'];

                if (password_verify($password, $password_db) || $password === $password_db) {
                    $_SESSION['id'] = $data_user['id'];
                    $_SESSION['login_user'] = 'login_user';
                    echo "berhasil";
                    return true;
                    exit;
                }else {
                    var_dump('gagal');
                    return false;
                }
            }
        }
    }

    public function searchBook()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM books WHERE judul_buku LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultAll();
    }
}
