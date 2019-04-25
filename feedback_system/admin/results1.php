<?php
  session_start();
  if($_SESSION['user_role'] !== 'administrator') {
    header('Location: ../admin-login.php');
  }
  include('../database_con.php');
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $_SESSION["sem"] = $_POST["sem"];
    $_SESSION["batch"] = $_POST["batch"];
    header('Location: ./results2.php');
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="../js/scripts.js"></script>
</head>

<body>
  <!-- navigation bar starts -->
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Haldia Institute of Technology</a>
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
              <a class="nav-link active" href="./index.php">
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
              <a class="nav-link disabled" href="#">
                <i class="fas fa-pencil-alt"></i>
                &nbsp;RESULTS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-right"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="./comments1.php">
                <i class="fas fa-pencil-alt"></i>
                &nbsp;REMARKS
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- sidebar ends -->
      <main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <form method="post" action="results1.php">
            <div class="form-group row">
              <label for="sem" class="col-md-3 col-form-label">Semester</label>
              <div class="col-md-9">
                <select class="custom-select mr-sm-2" name="sem" id="sem">
                  <option selected>Choose...</option>
                  <option value="1">Semester 1</option>
                  <option value="2">Semester 2</option>
                  <option value="3">Semester 3</option>
                  <option value="4">Semester 4</option>
                  <option value="5">Semester 5</option>
                  <option value="6">Semester 6</option>
                  <option value="7">Semester 7</option>
                  <option value="8">Semester 8</option>
                </select>
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <label class="col-form-label col-md-3 pt-0">Batch</label>
                <div class="col-md-9">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="batch" id="batch1" value="1" required>
                    <label class="form-check-label" for="batch1">
                      Batch 1
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="batch" id="bacth2" value="2">
                    <label class="form-check-label" for="batch2">
                      Batch 2
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </main>
    </div>
  </div>
</body>

</html>