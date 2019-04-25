<?php
  session_start();
  if($_SESSION['user_role'] !== 'administrator') {
    header('Location: ../admin-login.php');
  }
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script>
    $(document).ready(function(){
    $('#teacherid').on('change', function() {   
            sem = '<?php echo $_SESSION["sem"]; ?>';
            batch = '<?php echo $_SESSION["batch"]; ?>';
            teacherid = $('#teacherid').val();
            if ($('#teacherid').val() != "") {                                
                $.ajax({
                    url: 'getSubjectCodes.php?sem='+sem+'&batch='+batch+'&teacherid='+teacherid,
                    type: 'GET',
                    success: function (response){                    
                        $('#code').html(response);
                    },
                    error: function (xhr) {
                        alert("Something went wrong, please try again");
                    }
                });
            }
        });
      });
      </script>
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
              <a class="nav-link disabled" href="./results1.php">
                <i class="fas fa-pencil-alt"></i>
                &nbsp;RESULTS
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./comments1.php">
                <i class="fas fa-pencil-alt"></i>
                &nbsp;REMARKS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-right"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- sidebar ends -->
      <main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <form method="post" action="comments2.php">
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
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <th style="width: 50px" scope="col">#</th>
              <th scope="col">Remarks</th>
            </thead>
            <tbody>
              <?php
                if($_SERVER["REQUEST_METHOD"]=="POST")
                {
                    $sql = "SELECT remarks from student_feedback where teacher_id = " . $_POST["teacher"] . " and sem = " . $_SESSION["sem"] . " and batch = " . $_SESSION["batch"] . " and sub_code = '" . $_POST["code"] . "';";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0)
                    {
                        $i = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if( strlen($row["remarks"]) > 0 )
                            {
                                echo "<tr>";
                                echo "<th scope='row'>" . $i . "</td>";
                                echo "<td>" . $row["remarks"] . "</td>";
                                echo "</tr>";
                                $i++;
                            }
                        }
                    }
                }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
</body>

</html>