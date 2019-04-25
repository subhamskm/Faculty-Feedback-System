<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="images/logo.png">
  <title>Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#"><img class="rounded-circle" src="images/logo1.png" height=50 width=50>  Haldia Institute of Technology</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Contact us</a>
          </li>
        </ul>
        <!--<a href="./teacher/results1.php" role="button" class="btn btn-outline-success my-2 my-sm-0">Teacher</a>-->
        <a href="admin-login.php" role="button" class="btn btn-outline-success ml-2 my-2 my-sm-0">Admin</a>
      </div>
    </nav>
  </header>

  <main role="main">

    <!-- Modal -->
    <form id='index.php' autocomplete="off" action="profile_process.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <img class="rounded-circle mx-auto d-block" height=100 width=100 src="images/logo1.png"><br/><br />
                <div class="form-group row">
                      <label for="roll" class="col-sm-2 col-form-label">Date</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputRoll" name="datee" value="<?php echo date('Y/m/d') ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="sem" class="col-sm-2 col-form-label">Semester</label>
                      <div class="col-sm-10">
                          <select class="custom-select mr-sm-2" id="inputsem" name="semester" required>
                              <option value="">Choose...</option>
                              <option value="3">Semester 3</option>
                              <option value="4">Semester 4</option>
                              <option value="5">Semester 5</option>
                              <option value="6">Semester 6</option>
                            </select>
                      </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                          <legend class="col-form-label col-sm-2 pt-0">Batch</legend>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="batch" id="gridRadios1" value="1" required>
                              <label class="form-check-label" for="gridRadios1">
                                Batch 1
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="batch" id="gridRadios2" value="2">
                              <label class="form-check-label" for="gridRadios2">
                                Batch 2
                              </label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    <div class="form-group row">
                      <label for="roll" class="col-sm-2 col-form-label">Roll</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputRoll" placeholder="Ex:(16/CSE/001)" name="roll" required />
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input name ='Proceed' class="btn btn-primary" type="submit" value="Proceed" />
            </div>
          </div>
        </div>
      </div>
  </form>
    <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/image5.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
                <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Give Feedback
                </button>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/image2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
                <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Give Feedback
                </button>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/image3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
                <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Give Feedback
                </button>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

    <!-- FOOTER -->
    <footer class="container">
      <!--<p class="float-right"><a href="#">Back to top</a></p>-->
      <p>&copy; Haldia Institute of Technology</p>
    </footer>
  </main>
</body>
</html>
