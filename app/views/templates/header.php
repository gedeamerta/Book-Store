<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= baseurl; ?>/assets/css/bootstrap.css">

    <!-- Uikit CSS -->
    <link rel="stylesheet" href="<?= baseurl; ?>/assets/css/uikit.css">

    <!-- Mine Css -->
    <link rel="stylesheet" href="<?= baseurl; ?>/assets/css/mine.php">

    <!-- FontAwesome -->
    <link href="<?= baseurl; ?>/assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- Tailwind Css -->
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Fira+Sans:wght@500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= baseurl; ?>/assets/fontawesome/css/all.css">
    <title><?= $data['judul']; ?></title>
</head>
<?php if (!$data['header-author'] == 'header-author') : ?>

    <body>
        <div class="uk-position-relative">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand font-weight-bold" href="<?= baseurl; ?>/home">Buku Media</a>

                <!-- make collapse navbar when it going to responsive -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto p-2">
                        <li class="nav-item">
                            <a class="nav-link <?= $data['set_active'] == 'index' ? 'active' : '' ?>" href="<?= $data['nav'] == 'index' ? baseurl .'/home' : (($data['nav_dashboard'] == 'index_dashboard') ? baseurl . '/dashboard' : '') ?>"> Home <span class=" sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link 
                            <?= $data['set_active'] == 'book' ? 'active' : '' ?>" href="<?= $data['nav_book'] == 'book' ? baseurl . '/home/book' : (($data['nav_book_dashboard'] == 'book_dashboard') ? baseurl . '/dashboard/book' : '')?>">Buku</a>
                        </li>
                    </ul>
                    <?php if (!$data['login_user'] == 'login_user') : ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info mr-3 font-weight-bold">Log in</button>

                                <div class="modal fade" id="myModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="exampleModalLabel">Login</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= baseurl; ?>/home/login" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Username</label>
                                                        <input type="username" name="username" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" id="textInputId1" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" name="login" class="btn btn-info">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <button type="button" data-toggle="modal" data-target="#register" class="btn btn-dark mr-3 font-weight-bold">Register</button>

                                <div class="modal fade" id="register" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="exampleModalLabel">Register</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= baseurl; ?>/home/register" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Username </label>
                                                        <input type="text" name="username" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email </label>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" id="textInputId1" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Re-type Password</label>
                                                        <input type="password" name="password2" class="form-control" id="textInputId1" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" name="register" class="btn btn-info">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    <?php endif; ?>

                    <!-- When User Login -->
                    <?php if ($data['login_user'] == 'login_user') : ?>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <!-- <a class="nav-link" href="#">Username</a> -->
                                <a class="nav-link dropdown-toggle ml-5" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg> <?php print_r($data['user_single']['username']) ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= baseurl; ?>/dashboard/setOut">Log out</a>
                                </div>
                            </li>
                        </ul>
                    <?php endif; ?>
                    <!-- When user login end -->
                </div>
            </nav>
        </div>
<?php endif; ?>