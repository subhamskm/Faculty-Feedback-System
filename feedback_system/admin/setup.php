<?php
session_start();
if($_SESSION['user_role'] !== 'administrator') {
   header('Location: ../admin-login.php');
}
include('../database_con.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $i = 0;
    if(isset($_POST['subjectCheck1']))
    {
        $sql = "INSERT INTO batch_record values(" . $_POST["sem"] . ", " . $_POST["batch"] . ", '" . $_POST["code1"] . "', '" . $_POST["subject1"] . "', '" . $_POST["teacher1"] . "')";
        if (!mysqli_query($conn, $sql)) { 
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) ."');</script>";
        }
        else
        $i++;
    }
    if(isset($_POST['subjectCheck2']))
    {
        $sql = "INSERT INTO batch_record values(" . $_POST["sem"] . ", " . $_POST["batch"] . ", '" . $_POST["code2"] . "', '" . $_POST["subject2"] . "', '" . $_POST["teacher2"] . "')";
        if (!mysqli_query($conn, $sql)) { 
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) ."');</script>";
        }
        else
        $i++;
    }
    if(isset($_POST['subjectCheck3']))
    {
        $sql = "INSERT INTO batch_record values(" . $_POST["sem"] . ", " . $_POST["batch"] . ", '" . $_POST["code3"] . "', '" . $_POST["subject3"] . "', '" . $_POST["teacher3"] . "')";
        if (!mysqli_query($conn, $sql)) { 
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) ."');</script>";
        }
        else
        $i++;
    }
    if(isset($_POST['subjectCheck4']))
    {
        $sql = "INSERT INTO batch_record values(" . $_POST["sem"] . ", " . $_POST["batch"] . ", '" . $_POST["code4"] . "', '" . $_POST["subject4"] . "', '" . $_POST["teacher4"] . "')";
        if (!mysqli_query($conn, $sql)) { 
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) ."');</script>";
        }
        else
        $i++;
    }
    if(isset($_POST['subjectCheck5']))
    {
        $sql = "INSERT INTO batch_record values(" . $_POST["sem"] . ", " . $_POST["batch"] . ", '" . $_POST["code5"] . "', '" . $_POST["subject5"] . "', '" . $_POST["teacher5"] . "')";
        
        if (!mysqli_query($conn, $sql)) { 
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) ."');</script>";
        }
        else
        $i++;
    }
    if(isset($_POST['subjectCheck6']))
    {
        $sql = "INSERT INTO batch_record values(" . $_POST["sem"] . ", " . $_POST["batch"] . ", '" . $_POST["code6"] . "', '" . $_POST["subject6"] . "', '" . $_POST["teacher6"] . "')";
        if (!mysqli_query($conn, $sql)) { 
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) ."');</script>";
        }
        else
        $i++;
    }
    echo "<script type='text/javascript'>alert('" . $i ." record created successfully');</script>";
}

include('../teachers_query.php');
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
      label{
          font-weight: bold;
          
      }
      .form-check-label{
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
                    <a class="nav-link" href="#">
                        <i class="fas fa-pencil-alt"></i>
                        &nbsp;SETUP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-right"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./update.php">
                        <i class="fas fa-pencil-alt"></i>
                        &nbsp;UPDATE
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" href="./results1.php">
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
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <form method="POST" action="setup.php">
                                <div class="form-row">
                                  <div class="form-group col-md-3">
                                    <label for="semester">Semester</label>
                                    <select id="semester" name="sem" class="form-control">
                                        <option selected>Choose...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-3">
                                    <label for="batch">Batch</label>
                                    <select id="batch" name="batch" class="form-control">
                                        <option selected>Choose...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>           
                                  </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="code1">Subject Code</label>
                                        <input type="text" name="code1" class="form-control" id="code1">
                                    </div>        
                                    <div class="form-group col-md-5">
                                        <label for="subject1">Subject</label>
                                        <input type="text" name="subject1" class="form-control" id="subject1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="teacher1">Teacher</label>
                                        <select id="teacher1" name="teacher1" class="form-control">
                                            <option selected>Choose...</option>
                                            <?php include('get_teachers.php') ?>
                                        </select>
                                    </div>
                                    <div class="form-group chk col-md-1">
                                        <label for="subjectCheck1">Filled?</label>
                                        <input type="checkbox" id="subjectCheck1" name="subjectCheck1" class="checkmark">
                                    </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="code2">Subject Code</label>
                                            <input type="text" class="form-control" name="code2" id="code2">
                                        </div>        
                                        <div class="form-group col-md-5">
                                            <label for="subject2">Subject</label>
                                            <input type="text" class="form-control" name="subject2" id="subject2">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="teacher2">Teacher</label>
                                            <select id="teacher2" name="teacher2" class="form-control">
                                                <option selected>Choose...</option>
                                                <?php include('get_teachers.php') ?>
                                            </select>
                                        </div>
                                        <div class="form-check col-md-1">
                                                <label for="subjectCheck2">Filled?</label>
                                                <input type="checkbox" id="subjectCheck2" name="subjectCheck2" class="checkmark">
                                            </div>
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="code3">Subject Code</label>
                                        <input type="text" class="form-control" name="code3" id="code3">
                                    </div>        
                                    <div class="form-group col-md-5">
                                        <label for="subject3">Subject</label>
                                        <input type="text" class="form-control" name="subject3" id="subject3">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="teacher3">Teacher</label>
                                        <select id="teacher3" name="teacher3" class="form-control">
                                                <option selected>Choose...</option>
                                                <?php include('get_teachers.php') ?>
                                            </select>
                                    </div>
                                    <div class="form-check col-md-1">
                                            <label for="subjectCheck3">Filled?</label>
                                            <input type="checkbox" id="subjectCheck3" name="subjectCheck3" class="checkmark">
                                        </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="code4">Subject Code</label>
                                            <input type="text" class="form-control" id="code4">
                                        </div>        
                                        <div class="form-group col-md-5">
                                            <label for="subject4">Subject</label>
                                            <input type="text" class="form-control" name="code4" name="subject4" id="subject4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="teacher4">Teacher</label>
                                            <select id="teacher4" name="teacher4" class="form-control">
                                                <option selected>Choose...</option>
                                                <?php include('get_teachers.php') ?>
                                            </select>
                                        </div>
                                        <div class="form-check col-md-1">
                                                <label for="subjectCheck4">Filled?</label>
                                                <input type="checkbox" id="subjectCheck4" name="subjectCheck4" class="checkmark">
                                            </div>
                                    </div>
                                    <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="code5">Subject Code</label>
                                                <input type="text" class="form-control" name="code5" id="code5">
                                            </div>        
                                            <div class="form-group col-md-5">
                                                <label for="subject5">Subject</label>
                                                <input type="text" class="form-control" name="subject5" id="subject5">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="teacher5">Teacher</label>
                                                <select id="teacher5" name="teacher5" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <?php include('get_teachers.php') ?>
                                                </select>
                                            </div>
                                            <div class="form-check col-md-1">
                                                    <label for="subjectCheck5">Filled?</label>
                                                    <input type="checkbox" id="subjectCheck5" name="subjectCheck5" class="checkmark">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="code6">Subject Code</label>
                                                    <input type="text" class="form-control" name="code6" id="code6">
                                                </div>        
                                                <div class="form-group col-md-5">
                                                    <label for="subject6">Subject</label>
                                                    <input type="text" class="form-control" id="subject6" name="subject6">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="teacher6">Teacher</label>
                                                    <select id="teacher6" name="teacher6" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <?php include('get_teachers.php') ?>
                                                    </select>
                                                </div>
                                                <div class="form-check col-md-1">
                                                        <label for="subjectCheck6">Filled?</label>
                                                        <input type="checkbox" id="subjectCheck6" name="subjectCheck6" class="checkmark">
                                                    </div>
                                            </div>
                                            
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            
                </div>
            </main>
        </div>
    </div>
</body>
</html>
