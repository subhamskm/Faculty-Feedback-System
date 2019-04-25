<?php
  session_start();
  if(!empty($_SESSION["sem"])){
    $sem=$_SESSION["sem"];
    $batch=$_SESSION["batch"];
  }
  else
  {
    header('Location: ./index.php');
  }
  include('./database_con.php');
  include('./teachers_query.php');
  $sql = "SELECT * from batch_record where sem = " . $sem . " and batch = " . $batch . ";";
  $result = mysqli_query($conn,$sql);
  $res = array();
  if(mysqli_num_rows($result) > 0)
  {
        while($row = mysqli_fetch_assoc($result))
        {
              array_push($res, $row);
        }
  }
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
      $sql = " INSERT INTO `student_feedback` (`date`, `sem`, `batch`, `teacher_id`, `sub_code`, `remark1`, `remark2`, `remark3`, `remark4`, `remark5`, `total`, `remarks`) VALUES ('" . $_SESSION["date"] . "', " . $_SESSION["sem"] . ", " . $_SESSION["batch"] . ", '" . $res[$_SESSION["sub"]]["teacher"] . "', '" . $res[$_SESSION["sub"]]["code"] . "', " . $_POST["feedback1"] . ", " . $_POST["feedback2"] . ", " . $_POST["feedback3"] . ", " . $_POST["feedback4"] . ", " . $_POST["feedback5"] . ", " . (($_POST["feedback1"] + $_POST["feedback2"] + $_POST["feedback3"] + $_POST["feedback4"] + $_POST["feedback5"])/5) . ", '" . $_POST["remarks"] . "'); ";
      
      if(mysqli_query($conn,$sql))
      {
          if($_SESSION["sub"] == count($res)-1)
          {
            session_unset();
            session_destroy();
            echo "<script type='text/javascript'>alert('Thank you for giving your valuable feedback!');window.location = './index.php';</script>";
          }
          $_SESSION["sub"]++;
      }
      else
      {
          echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) ."');</script>";
      }
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
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <style>
    label {
      font-weight: bold;
      font-size: 1rem;
    }

    .form-check-label {
      font-weight: normal;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Haldia Institute of Technology</a>

    <ul class="navbar-nav px-3">
      <li class="nav-item">
        <a class="nav-link" style="color:ghostwhite" href="#">Subject:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res[$_SESSION["sub"]]["subject"] ?></a>
      </li>
    </ul>
    <ul class="navbar-nav px-3">
      <li class="nav-item">
        <a class="nav-link" style="color:ghostwhite" href="#">Teacher:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $teachers[$res[$_SESSION["sub"]]["teacher"]] ?></a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="fas fa-lg fa-tasks"></i>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php
              for($i=0; $i<count($res); $i++)
              {
                if($i==$_SESSION['sub'])
                  echo "<li class='nav-item'><a class='nav-link' href='#'><i class='fas fa-pencil-alt'></i>&nbsp;&nbsp;" . $res[$i]["code"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-lg fa-chevron-right'></i></a></li>";
                else
                  echo "<li class='nav-item'><a class='nav-link' href='#'><i class='fas fa-pencil-alt'></i>&nbsp;&nbsp;" . $res[$i]["code"] . "</a></li>";
              }
            ?>
          </ul>
        </div>
      </nav>
      <!--class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom-->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <form method="post" action="subjects.php">

            <div class="form-group">
              <label for="feedback2">1. Communication Skills (in terms of articulation and
                comprehensibility)</label><br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback1" id="vgood" value="100">
                <label class="form-check-label" for="vgood">Very Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback1" id="good" value="85">
                <label class="form-check-label" for="good">Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback1" id="fair" value="70" checked>
                <label class="form-check-label" for="fair">Fair</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback1" id="sat" value="55">
                <label class="form-check-label" for="sat">Satisfactory</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback1" id="unsat" value="40">
                <label class="form-check-label" for="unsat">Unsatisfactory</label>
              </div>
            </div>

            <div class="form-group">
              <label for="feedback3">2. Sincerity / Commitment of the teacher</label><br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback2" id="vgood" value="100">
                <label class="form-check-label" for="vgood">Very Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback2" id="good" value="85">
                <label class="form-check-label" for="good">Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback2" id="fair" value="70" checked>
                <label class="form-check-label" for="fair">Fair</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback2" id="sat" value="55">
                <label class="form-check-label" for="sat">Satisfactory</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback2" id="unsat" value="40">
                <label class="form-check-label" for="unsat">Unsatisfactory</label>
              </div>
            </div>

            <div class="form-group">
              <label for="feedback4">3. Interest generated by the teacher</label><br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback3" id="vgood" value="100">
                <label class="form-check-label" for="vgood">Very Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback3" id="good" value="85">
                <label class="form-check-label" for="good">Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback3" id="fair" value="70" checked>
                <label class="form-check-label" for="fair">Fair</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback3" id="sat" value="55">
                <label class="form-check-label" for="sat">Satisfactory</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback3" id="unsat" value="40">
                <label class="form-check-label" for="unsat">Unsatisfactory</label>
              </div>
            </div>

            <div class="form-group">
              <label for="feedback5">4. Whether the teacher regularly engages classes as per the timetable?
              </label><br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback4" id="vgood" value="100">
                <label class="form-check-label" for="vgood">Very Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback4" id="good" value="85">
                <label class="form-check-label" for="good">Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback4" id="fair" value="70" checked>
                <label class="form-check-label" for="fair">Fair</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback4" id="sat" value="55">
                <label class="form-check-label" for="sat">Satisfactory</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback4" id="unsat" value="40">
                <label class="form-check-label" for="unsat">Unsatisfactory</label>
              </div>
            </div>


            <div class="form-group">
              <label for="feedback7">5. Does the teacher completes the subject as per the syllabus</label><br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback5" id="vgood" value="100">
                <label class="form-check-label" for="vgood">Very Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback5" id="good" value="85">
                <label class="form-check-label" for="good">Good</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback5" id="fair" value="70" checked>
                <label class="form-check-label" for="fair">Fair</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback5" id="sat" value="55">
                <label class="form-check-label" for="sat">Satisfactory</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="feedback5" id="unsat" value="40">
                <label class="form-check-label" for="unsat">Unsatisfactory</label>
              </div>
            </div>
            <div class="form-group">
              <label for="remarks">6. Remarks (if any)</label>
              <textarea class="form-control" id="inputRemarks" name="remarks" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </main>
    </div>
  </div>
</body>

</html>