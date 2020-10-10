<?php 
class Flasher 
{
    public static function setFailRegister($pesan)
    {
        $_SESSION['flash-fail-register'] = [
            'pesan' => $pesan,
        ];
    }

    public static function failRegister()
    {
        if (isset($_SESSION['flash-fail-register'])) {
            echo '<script>alert("' . $_SESSION['flash-fail-register']['pesan'] . '")</script>';
            unset($_SESSION['flash-fail-register']);
        }
    }

    public static function setFailLogin($pesan)
    {
        $_SESSION['flash-fail-login'] = [
            'pesan' => $pesan
        ];
    }

    public static function failLogin()
    {
        if (isset($_SESSION['flash-fail-login'])) {
            echo '<script>alert("' . $_SESSION['flash-fail-login']['pesan'] . '")</script>';
            unset($_SESSION['flash-fail-login']);
        }
    }

    public static function setSuccessLogin($pesan)
    {
        $_SESSION['flash-success-login'] = [
            'pesan' => $pesan
        ];
    }

    public static function successLogin()
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
    public static function setFailLoginAuthor($pesan)
    {
        $_SESSION['flash-fail-login-author'] = [
            'pesan' => $pesan
        ];
    }

    public static function setFlashAuthor($type, $pesan, $action)
    {
        $_SESSION['flash-author'] = [
            'type' => $type,
            'pesan' => $pesan,
            'action' => $action
        ];
    }

    public static function flashAuthor()
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
    public static  function setFlashAuthorPass($type, $pesan, $action)
    {
        $_SESSION['flash-author-pass'] = [
            'type' => $type,
            'pesan' => $pesan,
            'action' => $action
        ];
    }

    public static function flashAuthorPass()
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

    // add new Admin
    public static function setNewAdminFlash($type, $pesan, $action)
    {
        $_SESSION['flash-new-admin'] = [
            'type' => $type,
            'pesan' => $pesan,
            'action' => $action
        ];
    }

    public static function getNewAdminFlash()
    {
        if (isset($_SESSION['flash-new-admin'])) {
            echo '<div class="alert alert-' . $_SESSION['flash-new-admin']['type'] . ' alert-dismissible fade show" role="alert">
                     <strong>' . $_SESSION['flash-new-admin']['pesan'] . '</strong>' . $_SESSION['flash-new-admin']['action'] . '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                 </div>';
            unset($_SESSION['flash-new-admin']);
        }
    }

    public static function setAdminUpdateFlash($type, $pesan, $action)
    {
        $_SESSION['flash-update-pass'] = [
            'type' => $type,
            'pesan' => $pesan,
            'action' => $action
        ];
    }

    public static function getAdminUpdatePassFlash()
    {
        if (isset($_SESSION['flash-update-pass'])) {
            echo '<div class="alert alert-' . $_SESSION['flash-update-pass']['type'] . ' alert-dismissible fade show" role="alert">
                     <strong>' . $_SESSION['flash-update-pass']['pesan'] . '</strong>' . $_SESSION['flash-update-pass']['action'] . '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                 </div>';
            unset($_SESSION['flash-update-pass']);
        }
    }

    public static function setCategoryFlash($type, $pesan, $action)
    {
        $_SESSION['flash-category'] = [
            'type' => $type,
            'pesan' => $pesan,
            'action' => $action
        ];
    }

    public static function getCategoryFlash()
    {
        if (isset($_SESSION['flash-category'])) {
            echo '<div class="alert alert-' . $_SESSION['flash-category']['type'] . ' alert-dismissible fade show" role="alert">
                     <strong>' . $_SESSION['flash-category']['pesan'] . '</strong>' . $_SESSION['flash-category']['action'] . '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                 </div>';
            unset($_SESSION['flash-category']);
        }
    }
}
