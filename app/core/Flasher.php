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
        }
    }
}
