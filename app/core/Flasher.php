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
    public function setFailLoginAuthor($pesan)
    {
        $_SESSION['flash-fail-login-author'] = [
            'pesan' => $pesan
        ];
    }

    public function setFlashAuthor($type, $pesan, $action)
    {
        $_SESSION['flash-author'] = [
            'type' => $type,
            'pesan' => $pesan,
            'action' => $action
        ];
    }

    public function flashAuthor()
    {
        if (isset($_SESSION['flash-author'])) {
            echo '<div class="alert alert-' . $_SESSION['flash-author']['type'] . ' alert-dismissible fade show" role="alert">
                     <strong>' . $_SESSION['flash-author']['pesan'] . ' </strong>' . $_SESSION['flash-author']['action']. '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                 </div>';
            unset($_SESSION['flash-author']);
        }
    }

    // change password author
    public function setFlashAuthorPass($type, $pesan, $action)
    {
        $_SESSION['flash-author-pass'] = [
            'type' => $type,
            'pesan' => $pesan,
            'action' => $action
        ];
    }

    // change password author
    public function flashAuthorPass()
    {
        if (isset($_SESSION['flash-author-pass'])) {
            echo '<div class="alert alert-' . $_SESSION['flash-author-pass']['type'] . ' alert-dismissible fade show" role="alert">
                     <strong>' . $_SESSION['flash-author-pass']['pesan'] . '</strong>' . $_SESSION['flash-author-pass']['action'] . '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                 </div>';
            unset($_SESSION['flash-author-pass']);
        }
    }
}
