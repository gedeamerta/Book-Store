<?php 
class Dashboard_model
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

    public function getBooksUserBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_user = "SELECT * FROM users_books WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getRateBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_user = "SELECT * FROM rate WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    //ip address
    public function get_ipadd($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_user = "SELECT * FROM watcher WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getUserPremiumBy($param, $value)
    {
        if (isset($param) && isset($value)) {
            $data_user = "SELECT * FROM users_premium WHERE $param = :$param";
            $this->db->query($data_user);
            $this->db->bind($param, $value);
            return $this->db->single();
        }
    }

    public function getBookLimit()
    {
        $this->db->query('SELECT * FROM books WHERE books.status = 1 ORDER BY id DESC LIMIT 6');
        return $this->db->resultAll();
    }

    // get all of the books
    public function getAllBook()
    {
        $this->db->query('SELECT * FROM books WHERE books.status = 1');
        return $this->db->resultAll();
    }

    public function getUserBook($id)
    {
        $this->db->query("SELECT a.*, b.id_book,id_user FROM books a INNER JOIN users_books b ON a.id = b.id_book WHERE b.id_user = '$id'");
        return $this->db->resultAll();
    }

    public function getRateBook($id_book)
    {
        $this->db->query("SELECT * FROM rate WHERE id_book = $id_book");
        return $this->db->resultAll();
    }

    // get user ip when they looking for the book 
    public function getBookId($id_book)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif (!empty($_SERVER['HTTP_X_FORWARD_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARD_FOR'];
        }else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        date_default_timezone_set("Asia/Makassar");
        $tanggal = date("Y/m/d");

        if ($this->get_ipadd('ipusers', $ip) && $this->get_ipadd('id_user', $_SESSION['id']) && $this->get_ipadd('tanggal', $tanggal)) {
           
        }else {
            $query = "INSERT INTO watcher (ipusers, id_user, id_book, tanggal, waktu) VALUES (:ipusers, :id_user, :id_book, :tanggal, now())";
            $this->db->query($query);
            $this->db->bind('ipusers', $ip);
            $this->db->bind('id_user', $_SESSION['id']);
            $this->db->bind('id_book', $id_book);
            $this->db->bind('tanggal', $tanggal);
            $this->db->execute();
        }
        $this->db->query("SELECT * FROM books WHERE id = :id"); // mengapa tidak menggunakan variabel $slug disana karena untuk menghindari sql injection, jadi perlu di bind terlebih dahulu 
        $this->db->bind('id', $id_book);
        return $this->db->single();
    }

    // get user acc
    public function getUserId($id)
    {
        $this->db->query('SELECT * FROM pengguna WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getCategory()
    {
        $this->db->query('SELECT * FROM category');
        return $this->db->resultAll();
    }

    public function getCategorySlug($slug)
    {
        $this->db->query("SELECT a.*, b.slug FROM books a INNER JOIN category b ON a.category = b.slug WHERE b.slug = '$slug'");
        $this->db->bind('slug', $slug);
        return $this->db->resultAll();
    }

    public function getPackage()
    {
        $this->db->query("SELECT * FROM premium_package");
        return $this->db->resultAll();
    }

    public function getPay($id)
    {   
        $this->db->query("SELECT a.*, b.id,type_package,price FROM pengguna a INNER JOIN premium_package b ON a.package_id = b.id WHERE a.id = $id");
        return $this->db->resultAll();
    }

    public function getUserPremium()
    {
        $id_user = $_SESSION['id'];
        $this->db->query("SELECT id, status_package FROM pengguna WHERE id = $id_user");
        return $this->db->single();
    }

    public function getPricePackage()
    {
        $this->db->query("SELECT a.*, b.package_id FROM premium_package a INNER JOIN pengguna b ON a.id = b.package_id WHERE a.id = b.package_id");
        return $this->db->single();
    }

// ===================================================================================================== //

    public function addBooksUser($id)
    {   
        if ($this->getBooksUserBy('id_book', $id) && $this->getBooksUserBy('id_user', $_SESSION['id']) == $_SESSION['id']) {
            echo
                '<script>
                        alert("Books has been save it");
                        setTimeout(function() {
                            window.location.href="/bookStore/dashboard";
                        }, 1000);
                    </script>';
        }else {
            $query = "INSERT INTO users_books (id_user, id_book, tanggal) VALUES (:id_user, :id_book, now());
            UPDATE users_books SET status = 1 WHERE id = :id_book";

            $this->db->query($query);
            $this->db->bind('id_book', $id);
            $this->db->bind('id_user', $_SESSION['id']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    // user going to premium
    public function user_premium($data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $number_ph = $data['no_telp'];
        $package = $data['package_id'];

        if ($this->getUserPremiumBy('username', $username) && $this->getUserPremiumBy('email', $email)) {
            echo
                '<script>
                        alert("Your Account has been requested to premium");
                        setTimeout(function() {
                            window.location.href="/dashboard";
                        }, 1000);
                    </script>';
        }else{

            $query = "UPDATE pengguna SET package_id = :package_id WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $_SESSION['id']);
            $this->db->bind('package_id', $package);
            $this->db->execute();

            $query = "UPDATE pengguna SET no_telp = :no_telp WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('no_telp', $number_ph);
            $this->db->bind('id', $_SESSION['id']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function transferMoney()
    { 
        $id_user = $_SESSION['id'];
        if(!$this->getUserBy('status_package', 0) && $this->getUserBy('id', $id_user)){
            return "b";
        } else {
            $price_package = $this->getPricePackage();
            $convert_integer = intval($price_package['price']);
            $price = $_POST['price_package'];

            if ($price < $convert_integer) {
                echo
                    '<script>
                        alert("Insufficient amount to transfer");
                        setTimeout(function() {
                            window.location.href="/dashboard/pay";
                        }, 1000);
                    </script>';
            }else{
                $targetDir =  __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . "struk" . DIRECTORY_SEPARATOR;
                $targetFile = $targetDir . basename($_FILES["struk"]["name"]);
                $extension  = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $uploadOk   = 1;

                $check = getimagesize($_FILES["struk"]["tmp_name"]);
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
                    if (move_uploaded_file($_FILES["struk"]["tmp_name"], $targetFile)) {
                        echo "The file " . basename($_FILES["struk"]["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                $query = "UPDATE pengguna SET struk = :struk WHERE id = :id";
                $this->db->query($query);
                $this->db->bind('id', $id_user);
                $this->db->bind('struk', $_FILES['struk']['name']);
                $this->db->execute();

                $query = "UPDATE pengguna SET status_package = :status_package WHERE id = :id";
                $this->db->query($query);

                // * user did not premium yet
                $this->db->bind('status_package', 1);
                $this->db->bind('id', $id_user);
                $this->db->execute();

                $query = "UPDATE pengguna SET premium_date = now() WHERE id = :id";
                $this->db->query($query);
                $this->db->bind('id', $id_user);
                $this->db->execute();

                return $this->db->rowCount();
            }
        }
    }

    public function clear_user_book($id_book)
    {
        $query = "DELETE FROM users_books WHERE id_book = :id_book";
        $this->db->query($query);
        $this->db->bind('id_book', $id_book);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchBook()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM books WHERE judul_books LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultAll();
    }

    public function rateBooks($id_book)
    {
        if ($this->getRateBy('id_user', $_SESSION['id']) == $_SESSION['id'] && $this->getRateBy('id_book', $id_book) ) {
            echo
                '<script>
                        alert("This books has been rates with you");
                        setTimeout(function() {
                            window.location.href="/bookStore/book";
                        }, 1000);
                    </script>';
        }else {
            $query = "INSERT INTO rate (id_book, id_user, rating) VALUES (:id_book, :id_user, :rating)";
            $this->db->query($query);
            $this->db->bind('id_book', $id_book);
            $this->db->bind('rating', $_POST['rating']);
            $this->db->bind('id_user', $_SESSION['id']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function logOut()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        header("Location: ". baseurl . '/home');
    }
}
