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

    // get all of the books
    public function getAllBook()
    {
        $this->db->query('SELECT * FROM buku');
        return $this->db->resultAll();
    }

    // get id book , first thing is u have to query the books and then bind the book id , at the end u return the single fetch
    public function getBookId($id)
    {
        $this->db->query('SELECT * FROM buku WHERE id=:id'); // mengapa tidak menggunakan variabel $id disana karena untuk menghindari sql injection, jadi perlu di bind terlebih dahulu 
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getBookLimit()
    {
        $this->db->query('SELECT * FROM buku ORDER BY id LIMIT 6');
        return $this->db->resultAll();
    }

    public function getUserId($id)
    {
        $this->db->query('SELECT * FROM users WHERE id=:id');
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

        //to find image location
         
                $targetDir =  __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR;
                $targetFile = $targetDir . basename($_FILES["image"]["name"]);
                $extension  = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $uploadOk   = 1;

                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }

                if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
                    echo "Sorry, only JPG, JPEG, and PNG images are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }


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
                        $query = "INSERT INTO users(username, email, image, password) VALUES(:username, :email, :image,  :password)";

                        $this->db->query($query);
                        $this->db->bind("username", $username);
                        $this->db->bind("email", $email);
                        $this->db->bind("image", $_FILES["image"]["name"]);
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
                    $_SESSION['login'] = 'login';

                    $_COOKIE['id'] = $data_user['id'];
                    setcookie($_COOKIE['id'], $username, time() + 3600, '/');
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
}
