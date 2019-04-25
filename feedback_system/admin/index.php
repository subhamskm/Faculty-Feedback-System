<?php
    session_start();
    if($_SESSION['user_role'] !== 'administrator') {
        header('Location: ../admin-login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../images/logo.png">
    <title>Feedback</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <style>
        label {
            font-weight: bold;
            
        }

        .form-check-label {
            font-weight: normal;
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
</head>

<body>
    <!-- navigation bar starts -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Haldia Institute of Technology</a>
        <div class="collapse" id="navbarToggleExternalContent">
            <ul class="navbar-nav mr-auto mt-2 pl-4 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="./setup.php">SETUP <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./update.php">UPDATE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./results1.php">RESULTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./comments1.php">REMARKS</a>
                </li>
            </ul>
        </div>
        <button class="navbar-toggler col-sm" type="button" data-toggle="collapse"
            data-target="#navbarToggleExternalContent" aria-controls="navbarTogglerDemo03" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3 ml-auto">
            <li class="nav-item text-nowrap">
              <a class="nav-link" style="color:ghostwhite" href="./admin-logout.php">Sign out</a>
            </li>
        </ul>
    </nav>

    <!-- navigation bar ends -->

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar starts -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-lg fa-tasks"></i>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./setup.php">
                                <i class="fas fa-pencil-alt"></i>
                                &nbsp;SETUP
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./update.php">
                                <i class="fas fa-pencil-alt"></i>
                                &nbsp;UPDATE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./results1.php">
                                <i class="fas fa-pencil-alt"></i>
                                &nbsp;RESULTS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./comments1.php">
                                <i class="fas fa-pencil-alt"></i>
                                &nbsp;REMARKS
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- sidebar ends -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                </div>
            </main>
        </div>
    </div>
</body>

</html>