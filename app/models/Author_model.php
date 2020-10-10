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
            $data_author = "SELECT * FROM authors WHERE $param = :$param";
            $this->db->query($data_author);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getBooksBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_book = "SELECT * FROM books WHERE $param = :$param";
            $this->db->query($data_book);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getDeleteBooksBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_book = "SELECT * FROM request WHERE $param = :$param";
            $this->db->query($data_book);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    //display author books and watcher :D
    public function getBooksAuthorId()
    {
        $id_author = $_SESSION['id_author'];
        $this->db->query("SELECT a.id, b.* FROM authors a INNER JOIN books b ON a.id= b.id_author WHERE a.id = '$id_author' ORDER BY b.id DESC");
        return $this->db->resultAll();
    }

    //get id author to display it
    public function getAuthorId($id)
    {
        $this->db->query("SELECT * FROM authors WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getBookId($slug)
    {
        $this->db->query('SELECT * FROM books WHERE slug=:slug'); // mengapa tidak menggunakan variabel $id disana karena untuk menghindari sql injection, jadi perlu di bind terlebih dahulu 
        $this->db->bind('slug', $slug);
        return $this->db->single();
    }

    public function getCategoryAll()
    {
        $this->db->query('SELECT * FROM category');
        return $this->db->resultAll();
    }

    public function getCategorySlug($slug)
    {
        $id_author = $_SESSION['id_author'];
        $this->db->query("SELECT a.*, b.slug_category, c.id FROM books a INNER JOIN category b ON a.category = b.slug_category INNER JOIN authors c ON a.id_author = c.id WHERE b.slug_category = '$slug' AND a.id_author = '$id_author'");
        $this->db->bind('slug', $slug);
        $this->db->bind('id_author', $id_author);
        return $this->db->resultAll();
    }

    //get notification from admin
    public function getNotif()
    {
        $id_author = $_SESSION['id_author'];
        $this->db->query("SELECT a.*, b.id FROM notifikasi a INNER JOIN books b ON a.id_book = b.id WHERE a.tujuan = 'Author' AND a.id_author = $id_author ORDER BY a.id DESC LIMIT 5");
        return $this->db->resultAll();
    }

    public function getWatcher($id)
    {
        $this->db->query("SELECT a.*, b.* FROM watcher a INNER JOIN books b ON a.id_book = b.id WHERE a.id_book = '$id'");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    //slug the judul buku
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

    public function registerAuthor($data)
    {
        $username = htmlspecialchars($data['username']);
        $fullname = htmlspecialchars($data['fullname']);
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
                        $query = "INSERT INTO authors(username, fullname, email, image, password) VALUES(:username, :fullname, :email, :image,  :password)";

                        $this->db->query($query);
                        $this->db->bind("username", $username);
                        $this->db->bind("fullname", $fullname);
                        $this->db->bind("email", $email);
                        $this->db->bind("image", $_FILES["image"]["name"]);
                        $this->db->bind("password", password_hash($password, PASSWORD_DEFAULT));
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

                    $_SESSION['id_author'] = $data_author['id'];
                    $_SESSION['fullname'] = $data_author['fullname']; // get fullname to insert into table buku

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
                $query = "UPDATE authors SET password = :password WHERE id = :id";
                $id = $_SESSION['id_author'];
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
        $judul_buku = $data['judul_buku'];
        $slug = $this->slugify($judul_buku);
        $sipnosis = $data['sipnosis'];
        $category = $data['category'];
        $fullname = $_SESSION['fullname']; // get this from table author
        $author = $_SESSION['id_author']; // get this from table author

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

        //to find pdf location
        $targetDir =  __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . "pdf" . DIRECTORY_SEPARATOR;
        $targetFile = $targetDir . basename($_FILES["pdf"]["name"]);
        $extension  = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $uploadOk   = 1;

        $check = is_uploaded_file($_FILES["pdf"]["tmp_name"]);
        if ($check !== false) {
            echo "File is a pdf";
            $uploadOk = 1;
        } else {
            echo "File is not a pdf.";
            $uploadOk = 0;
        }

        if ($extension != "pdf") {
            echo "Sorry, only PDF are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["pdf"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

            $query = "INSERT INTO books (judul_buku, slug, category, image, pdf, sipnosis, fullname, rating, id_author, status, tanggal) VALUES (:judul_buku, :slug, :category, :image, :pdf, :sipnosis,  :fullname, :rating, :id_author,  :status, now())";

            $this->db->query($query);
            $this->db->bind("judul_buku", $judul_buku);
            $this->db->bind("slug", $slug);
            $this->db->bind("category", $category);
            $this->db->bind("image", $_FILES["image"]["name"]);
            $this->db->bind("pdf", $_FILES["pdf"]["name"]);
            $this->db->bind("sipnosis", $sipnosis);
            $this->db->bind("fullname", $fullname);
            $this->db->bind("rating", 0);
            $this->db->bind("id_author", $author);
            $this->db->bind("status", 0);
            $this->db->execute();

            // notifikasi
            $id_book = $this->db->lastInsertId();
            $id_author = $_SESSION['id_author'];
            $deskripsi = "Author " . $_SESSION['fullname'] . " has been uploaded book " . $judul_buku;

            $jenis_notif = "Buku.Approve"; // jenis notif approve
            $tujuan = "Admin"; // tujuan untuk notif

            $query = "INSERT INTO notifikasi (deskripsi, jenis_notif, tujuan, id_book, id_author, tanggal, dibaca) VALUES (:deskripsi, :jenis_notif, :tujuan, :id_book, :id_author, now(), :dibaca)";
            $this->db->query($query);
            $this->db->bind('deskripsi', $deskripsi);
            $this->db->bind('jenis_notif', $jenis_notif);
            $this->db->bind('tujuan', $tujuan);
            $this->db->bind('id_book', $id_book);
            $this->db->bind('id_author', $id_author);
            $this->db->bind('dibaca', 0);
            $this->db->execute();

            return $this->db->rowCount();
    }

    public function searchBooksAuthor($id)
    {
        if (!isset($_POST['keyword'])) {
            header("Location: ". baseurl . '/author/dashboard'); 
        }else {
            $keyword = $_POST['keyword'];
            $query = "SELECT a.*,b.id FROM books a INNER JOIN authors b ON a.id_author= b.id WHERE a.id_author='$id' AND judul_buku LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultAll();
        }
    }

    public function requestDeleteBook($data)
    {
        $deskripsi = "Author " . $_SESSION['fullname'] . " ingin menghapus buku ";
        $id_author = $_SESSION['id_author'];
        if ($data_del = $this->getDeleteBooksBy('id_book', $data['id_book'])) {
            echo
                '<script>
                        alert("Books has been requested");
                        setTimeout(function() {
                            window.location.href="dashboard";
                        }, 1000);
                    </script>';
        }else{
            $query = "INSERT INTO request (deskripsi, id_book, id_author, tanggal, status) VALUES (:deskripsi, :id_book, :id_author, now(), :status)";
            $this->db->query($query);
            $this->db->bind('deskripsi', $deskripsi);
            $this->db->bind('id_book', $data['id_book']);
            $this->db->bind('id_author', $id_author);
            $this->db->bind('status', 0);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function logOut()
    {
        session_destroy();
        $_SESSION = [];
        unset($_SESSION);
        
        header("Location: ". baseurl ."/author/index");
    }
}
