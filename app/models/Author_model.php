<?php 
class Author_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAuthorBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_author = "SELECT * FROM author WHERE $param = :$param";
            $this->db->query($data_author);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getBooksBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_book = "SELECT * FROM buku WHERE $param = :$param";
            $this->db->query($data_book);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    //display author books
    public function getBooksAuthorId($id)
    {
        $this->db->query("SELECT a.*, b.id FROM buku a INNER JOIN author b ON a.id_author= b.id WHERE a.id_author = '$id'");
        return $this->db->resultAll();
    }

    //get id author to display it
    public function getAuthorId($id)
    {
        $this->db->query("SELECT * FROM author WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function registerAuthor($data)
    {
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $password2 = htmlspecialchars($data['password2']);
        $data['id_book'] = 0;

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
        if ($data_user = $this->getAuthorBy("email", $email) || $data_user = $this->getAuthorBy("username", $username)) {
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
                        $query = "INSERT INTO author(username, email, image, password, id_book) VALUES(:username, :email, :image,  :password, :id_book)";

                        $this->db->query($query);
                        $this->db->bind("username", $username);
                        $this->db->bind("email", $email);
                        $this->db->bind("image", $_FILES["image"]["name"]);
                        $this->db->bind("password", password_hash($password, PASSWORD_DEFAULT));
                        $this->db->bind("id_book", $data['id_book']);
                        $this->db->execute();
                        return $this->db->rowCount();
                    }
                } else {
                    echo "password kosong";
                    
                }
            } else {
                echo "password masih belom dimasukin";
                
            }
        }
    }


    public function loginAuthor($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        if (isset($username) && $username !== "") {
            if ($data_author = $this->getAuthorBy('username', $username)) {
                $password_db = $data_author['password'];

                if (password_verify($password, $password_db) || $password === $password_db) {

                    $_SESSION['id'] = $data_author['id'];
                    $_SESSION['fullname'] = $data_author['fullname']; // get fullname to insert into table buku

                    $_COOKIE['id'] = $data_author['id'];
                    setcookie($_COOKIE['id'],
                        $username,
                        time() + 3600,
                        '/'
                    );

                    $_SESSION['login-author'] = 'login-author';
                    echo "berhasil";
                    return true;
                    exit;
                } else {
                    var_dump('gagal');
                    return false;
                }
            }
        }
    }

    public function changesPassAuthor($data)
    {   
        //validate password
        $uppercase =  preg_match('@[A-Z]@', $data['password']);
        $lowercase =  preg_match('@[a-z]@', $data['password']);
        $number =  preg_match('@[0-9]@', $data['password']);

        if (!$uppercase || !$lowercase || !$number || strlen($data['password']) < 8) {
            echo '<script>
                    alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number.");
                    setTimeout(function() {
                        window.location.href="forms";
                    }, 1000);
                </script>';
        }else {
            if ($data['password'] !== $data['password2']) {
                echo 
                    '<script>
                        alert("Your Password is invalid");
                        setTimeout(function() {
                            window.location.href="forms";
                        }, 1000);
                    </script>';
                exit;
            } else {
                $query = "UPDATE author SET password = :password WHERE id = :id";
                $id = $_SESSION['id'];
                $this->db->query($query);
                $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
                $this->db->bind('id', $id);
                $this->db->execute();
                return $this->db->rowCount();
            }
        }
    }

    public function addBooksAuthor($data)
    {
        $judul_buku = htmlspecialchars($data['judul_buku']);
        $sipnosis = htmlspecialchars($data['sipnosis']);
        $fullname = $_SESSION['fullname']; // get this from table author
        $rating = 0;
        $user = 0;
        $author = $_SESSION['id']; // get this from table author

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
        if ($data_book = $this->getBooksBy("judul_buku", $judul_buku)) {
            var_dump("Judul Buku Sudah Ada");
        } else {
            $query = "INSERT INTO buku(judul_buku, image, sipnosis, fullname, rating, id_author, id_user) VALUES(:judul_buku, :image, :sipnosis,  :fullname, :rating, :id_author, :id_user)";

            $this->db->query($query);
            $this->db->bind("judul_buku", $judul_buku);
            $this->db->bind("image", $_FILES["image"]["name"]);
            $this->db->bind("sipnosis", $sipnosis);
            $this->db->bind("fullname", $fullname);
            $this->db->bind("rating", $rating);
            $this->db->bind("id_author", $author);
            $this->db->bind("id_user", $user);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function searchBooksAuthor($id)
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT a.*,b.id FROM buku a INNER JOIN author b ON a.id_author= b.id WHERE a.id_author='$id' AND judul_buku LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultAll();
    }

    public function logOut()
    {
        session_destroy();
        $_SESSION = [];
        unset($_SESSION);
        
        header("Location: ". baseurl ."/author/index");
    }
}
