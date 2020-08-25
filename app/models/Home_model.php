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
            $data_user = "SELECT * FROM users WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
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
            var_dump('email dan username sudah ada');
        } else {
            if (isset($password) && $password !== "" || isset($password2) && $password2 !== "") {
                if ($password === $password2) {
                    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                        echo 
                        '<script>
                            alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number.")
                        </script>';
                    } else {
                        $query = "INSERT INTO users(username, email, password) VALUES(:username, :email, :password)";

                        $this->db->query($query);
                        $this->db->bind("username", $username);
                        $this->db->bind("email", $email);
                        // $this->db->bind("image", $data['image']);
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
        $password = $data['password']; //inputan user

        if (isset($username) && $username !== "") {
            if ($data_user = $this->getUserBy('username', $username)) {
                $password_db = $data_user['password'];
                var_dump($data_user);
                if (password_verify($password_db, $password || $password_db === $password)) {
                    echo "berhasil";
                    return true;
                }else {
                    var_dump('gagal');
                    return false;
                }
            }
        }
    }

}
