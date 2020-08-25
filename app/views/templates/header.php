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
                        <a class="nav-link active" href="<?= baseurl; ?>/home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= baseurl; ?>/home/book">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= baseurl; ?>/home/store">Toko Buku</a>
                    </li>
                </ul>
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
                                                <label for="exampleInputEmail1">Username </label>
                                                <input type="text" name="username" class="form-control" required>
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
                                        <form action="<?= baseurl; ?>/home/register" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username </label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email </label>
                                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                            <!-- <div class="custom-file">
                                                <label class="custom-file-label" for="inputGroupFile01">Profile Picture</label>
                                                <input type="file" name="image" class="form-control custom-file-input">
                                            </div> -->
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
            </div>
        </nav>
    </div>