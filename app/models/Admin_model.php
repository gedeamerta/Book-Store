<?php 

class Admin_model 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAdminBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $this->db->query("SELECT * FROM admins WHERE $param = :$param");
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getJudulBuku($id)
    {
        $this->db->query("SELECT * FROM books WHERE id = $id");
        return $this->db->single();
    }

    public function getAdminId($id)
    {
        $this->db->query("SELECT * FROM admins WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getCategoryBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $this->db->query("SELECT * FROM category WHERE $param = :$param");
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getBookAuthor()
    {
        $this->db->query('SELECT a.*, b.* FROM books a INNER JOIN notifikasi b ON a.id = b.id_book WHERE a.id = b.id_book ORDER BY a.id DESC');
        return $this->db->resultAll();
    }

    // get all of the books request from author
    public function getBookRequest()
    {
        $this->db->query('SELECT a.*, b.id_book FROM books a INNER JOIN request b ON a.id = b.id_book WHERE a.id = b.id_book');
        return $this->db->resultAll();
    }

    //get notification from author
    public function getNotif()
    {
        $this->db->query("SELECT a.*, b.id FROM notifikasi a INNER JOIN books b ON a.id_book = b.id WHERE a.tujuan = 'Admin' ORDER BY a.id DESC LIMIT 5");
        return $this->db->resultAll();
    }

    public function getCategory()
    {
        $this->db->query('SELECT * FROM category');
        return $this->db->resultAll();
    }

    public function getCategorySlug($slug)
    {
        $this->db->query("SELECT a.*, b.*, c.* FROM category a INNER JOIN books b ON a.slug_category = b.category INNER JOIN notifikasi c ON b.id = c.id_book WHERE a.slug_category = '$slug'");
        $this->db->bind('slug', $slug);
        return $this->db->resultAll();
    }

    public function getUserPremium()
    {
        $this->db->query("SELECT * FROM pengguna");
        return $this->db->resultAll();
    }

    public function accept_premium()
    {
        $this->db->query("SELECT * FROM pengguna");
        return $this->db->lastInsertId();
    }

    //slug the category
    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function loginAdmin($data)
    {
        $username = $data['username'];
        $password = $data['password']; //password on admin form input

        if ($data_admin = $this->getAdminBy('username', $username)) {
            $password_db = $data_admin['password']; // password from tb admnin

            if ($password == $password_db || password_verify($password, $password_db)) {
                $_SESSION['id_admin'] = $data_admin['id'];
                $_SESSION['fullname_admin'] = $data_admin['fullname'];
                $_SESSION['login_admin'] = 'login_admin';
                echo "berhasil";
                return true;
            }else{
                echo"gagal";
                return false;
            }
        }
    }

    public function addNewAdmin($data)
    {
        $username = htmlspecialchars($data['username']);
        $fullname = htmlspecialchars($data['fullname']);
        $password = htmlspecialchars($data['password']);

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

        if ($data_admin = $this->getAdminBy("username", $username) || $data_admin = $this->getAdminBy("fullname",$fullname)) {
            var_dump("udah ada username");
        }else{
            if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                echo
                    '<script>
                            alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number.")
                        </script>';
            } else {
                $query = "INSERT INTO admins (username, fullname, image, password) VALUES (:username, :fullname, :image, :password)";
                $this->db->query($query);
                $this->db->bind("username", $username);
                $this->db->bind("fullname", $fullname);
                $this->db->bind("image", $_FILES['image']['name']);
                $this->db->bind("password", password_hash($password, PASSWORD_DEFAULT));
                $this->db->execute();
                return $this->db->rowCount();
            }
        }
    }

    public function updatePassword($data)
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
        } else {
            if ($data['password'] !== $data['password2']) {
                echo
                    '<script>
                        alert("Your Password is invalid");
                        setTimeout(function() {
                            window.location.href="forms";
                        }, 1000);
                    </script>';
                exit;
            }else {
                $query = "UPDATE admins SET password = :password WHERE id = :id";
                $id_admin = $_SESSION['id_admin'];
                $this->db->query($query);
                $this->db->bind('id', $id_admin);
                $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
                $this->db->execute();
                return $this->db->rowCount();
            }
        }
    }

    public function addCategoryBooks($data)
    {
        $name_category = $data['name_category'];
        $slug = $this->slugify($name_category);
        if ($data_category = $this->getCategoryBy('name_category', $name_category)) {
            var_dump("Category has been inserted");
        }else {
            $query = "INSERT INTO category (name_category, slug_category) VALUES (:name_category, :slug_category)";
            $this->db->query($query);
            $this->db->bind('name_category', $name_category);
            $this->db->bind('slug_category', $slug);
            $this->db->execute();   
            return $this->db->rowCount();
        }
    }

    public function accept_request_premium($id_user)
    {
        $this->db->query("UPDATE pengguna SET status_package = :status_package WHERE id = $id_user");

        // * change it into 2, it mean user has been premium
        $this->db->bind('status_package', 2);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchBook()
    {
        if (!isset($_POST['keyword'])) {
            header("Location: " . baseurl . '/admin/dashboard');
        }else {
            $keyword = $_POST['keyword'];
            $this->db->query("SELECT * FROM books WHERE judul_buku LIKE :keyword");
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultAll();
        }
    }
    
    public function deleteBooksAuthor($id)
    {   
        $status = 2;
        $query = "DELETE request FROM request INNER JOIN books ON books.id = books.id WHERE request.id_book = :id_book;
        UPDATE books SET status = :status WHERE id = :id;
        UPDATE users_books SET status = :status WHERE id_book = :id";
        $this->db->query($query);
        $this->db->bind('id_book', $id);
        $this->db->bind('id', $id);
        $this->db->bind('status', $status);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function publishBook($id)
    {   
        $judulBuku = $this->getJudulBuku($id);
        $status = 1;
        $dibaca = 1;
        $deskripsi = "Admin " . $_SESSION['fullname_admin'] . " has been publish book " . $judulBuku['judul_buku'];
        $tujuan = "Author"; // tujuan untuk notif
        
        $query = "UPDATE books SET status = :status WHERE id = :id; 
        UPDATE notifikasi SET dibaca = :dibaca, deskripsi = :deskripsi, tujuan = :tujuan WHERE id_book = :id_book";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('dibaca', $dibaca);
        $this->db->bind('id', $id);
        $this->db->bind('id_book', $id);
        $this->db->bind('deskripsi', $deskripsi);
        $this->db->bind('tujuan', $tujuan);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function logOut()
    {
        session_destroy();
        $_SESSION = [];
        unset($_SESSION);

        header("Location: " . baseurl . '/admin/index');
    }
}