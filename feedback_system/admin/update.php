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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
                            <a class="nav-link" href="./setup.php">
                                <i class="fas fa-pencil-alt"></i>
                                &nbsp;SETUP&nbsp;&nbsp;
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                &nbsp;UPDATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                    class="fas fa-chevron-right"></i>
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
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div>
                        <form method="POST" action="update.php">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="sem">Semester</label>
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
                                <div class="form-group col-md-1">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-primary" href="#">Search</a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Subject Code</th>
                                        <th scope="col">Subject Name</th>
                                        <th scope="col">Teacher Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('../database_con.php');
                                        if($_SERVER["REQUEST_METHOD"]=="POST")
                                        {
                                            if(isset($_POST['remove']))
                                            {
                                                $sql = "DELETE from batch_record where sem = " . $_POST['sem'] . " and batch = " . $_POST['batch'] . " and code = '" . $_POST['code'] ."' and teacher = ". $_POST['teacher'] . ";";
                                                if(!mysqli_query($conn,$sql))
                                                    echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) . "')</alert>";
                                            }
                                            $sql = "SELECT * from batch_record, teachers where teachers.id = batch_record.teacher and sem = " . $_POST['sem'] . " and batch = " . $_POST['batch'] . ";";
                                            $result = mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                $i = 1;
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<th scope='row'>" . $i . "</td>";
                                                    echo "<td>" . $row["code"] . "</td>";
                                                    echo "<td>" . $row["subject"] . "</td>";
                                                    echo "<td>" . $row["name"] . "</td>";
                                                    echo "<form action='update.php' method='post'>";
                                                    echo "<input type='hidden' name='sem' value='" . $_POST["sem"] . "' >";
                                                    echo "<input type='hidden' name='batch' value='" . $_POST["batch"] . "' >";
                                                    echo "<input type='hidden' name='code' value='" . $row["code"] . "' >";
                                                    echo "<input type='hidden' name='teacher' value='" . $row["teacher"] . "' >";
                                                    echo "<td><span class='table-remove'><button type='submit' name='remove' " . $i ."' class='btn btn-danger btn-rounded btn-sm my-0'>Remove</button></span></td>";
                                                    echo "</form>";
                                                    echo "</tr>";
                                                    $i++;
                                                }
                                            }
                                        }

                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>