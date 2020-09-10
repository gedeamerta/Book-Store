<?php 
class Flasher 
{
    public function setFailRegister($pesan)
    {
        $_SESSION['flash-fail-register'] = [
            'pesan' => $pesan,
        ];
    }

    public function failRegister()
    {
        if (isset($_SESSION['flash-fail-register'])) {
            echo '<script>alert("' . $_SESSION['flash-fail-register']['pesan'] . '")</script>';
            unset($_SESSION['flash-fail-register']);
        }
    }

    public function setFailLogin($pesan)
    {
        $_SESSION['flash-fail-login'] = [
            'pesan' => $pesan
        ];
    }

    public function failLogin()
    {
        if (isset($_SESSION['flash-fail-login'])) {
            echo '<script>alert("' . $_SESSION['flash-fail-login']['pesan'] . '")</script>';
            unset($_SESSION['flash-fail-login']);
        }
    }

    public function setSuccessLogin($pesan)
    {
        $_SESSION['flash-success-login'] = [
            'pesan' => $pesan
        ];
    }

    public function successLogin()
    {
        if (isset($_SESSION['flash-success-login'])) {
            echo'<script>alert("'.$_SESSION['flash-success-login']['pesan'].'")</script>';
            unset($_SESSION['flash-fail-login']);
        }
    }

    /**
     * 
     * So I changed the way I create messages, first I created a method to store messages in session and values       ​​have an array of values, after that I filled the message in the controller by instancing the Flasher class and calling the setfailLoginAdmin method which has a parameter $pesan
     */
    public function setFailLoginAdmin($pesan)
    {
        $_SESSION['flash-fail-login-author'] = [
            'pesan' => $pesan
        ];
    }

    // public function setAddBook($pesan)
    // {

    // }
}
