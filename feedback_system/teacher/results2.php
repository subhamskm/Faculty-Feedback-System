<?php
  session_start();
  include('../database_con.php');
  include('../teachers_query.php');
  $sql = "SELECT distinct(teacher) 'teachers' from batch_record where sem = " . $_SESSION["sem"] . " and batch = " . $_SESSION["batch"] . ";";
  $result = mysqli_query($conn,$sql);
  $teacherids = array();
  if(mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
        array_push($teacherids,$row["teachers"]);
  } 
  $sql = "SELECT distinct(code) 'codes' from batch_record where sem = " . $_SESSION["sem"] . " and batch = " . $_SESSION["batch"] . ";";
  $result = mysqli_query($conn,$sql);
  $codes = array();
  if(mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
        array_push($codes,$row["codes"]);
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
              <a class="nav-link disabled" href="./results1.php">
                <i class="fas fa-pencil-alt"></i>
                &nbsp;RESULTS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-right"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./comments1.php">
                <i class="fas fa-pencil-alt"></i>
                &nbsp;REMARKS</i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- sidebar ends -->
      <main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <form method="post" action="results2.php">
            <div class="form-group row">
              <label for="teacherid" class="col-md-3 col-form-label">Teacher</label>
              <div class="col-md-9">
                <select class="custom-select" name="teacher" id="teacherid" required>
                  <option value="">Choose...</option>
                  <?php 
                    for($i=0;$i<count($teacherids);$i++)
                        echo "<option value='" . $teacherids[$i] . "'>" . $teachers[$teacherids[$i]] . "</option>";
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="code" class="col-md-3 col-form-label">Subject Code</label>
              <div class="col-md-9">
                <select class="custom-select" name="code" id="code" required>
                  <option value="">Choose...</option>
                  <?php 
                    for($i=0;$i<count($codes);$i++)
                        echo "<option value='" . $codes[$i] . "'>" . $codes[$i] . "</option>";
                  ?>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <th scope="col">#</th>
              <th scope="col">Communication Skills</th>
              <th scope="col">Sincerity and Commitment</th>
              <th scope="col">Interest generation</th>
              <th scope="col">Regularity and punctuality</th>
              <th scope="col">Completion of syllabus</th>
              <th scope="col">Overall Score</th>
            </thead>
            <tbody>
              <?php
                if($_SERVER["REQUEST_METHOD"]=="POST")
                {
                    $sql = "SELECT * from student_feedback where teacher_id = " . $_POST["teacher"] . " and sem = " . $_SESSION["sem"] . " and batch = " . $_SESSION["batch"] . " and sub_code = '" . $_POST["code"] . "';";
                    $result = mysqli_query($conn,$sql);
                    $_SESSION["code"] = $_POST["code"];
                    $_SESSION["teacher"] = $_POST["teacher"];
                    if(mysqli_num_rows($result)>0)
                    {
                        $i = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<th scope='row'>" . $i . "</td>";
                            echo "<td>" . $row["remark1"] . "</td>";
                            echo "<td>" . $row["remark2"] . "</td>";
                            echo "<td>" . $row["remark3"] . "</td>";
                            echo "<td>" . $row["remark4"] . "</td>";
                            echo "<td>" . $row["remark5"] . "</td>";
                            echo "<td>" . $row["total"] . "</td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                }
              ?>
            </tbody>
          </table>
        </div>
        <a role="button" href='./result.php' style="text-align: center" class="btn btn-success" style>Print result</a>
      </main>
    </div>
  </div>
</body>

</html>