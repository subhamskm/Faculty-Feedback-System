<?php
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    include('./database_con.php');
    $sql = "SELECT userid, password FROM admin";
    $result = mysqli_query($conn, $sql);
    $teachers = array();
    $n = mysqli_num_rows($result);
    if ( $n > 0) 
    {
        if($row = mysqli_fetch_assoc($result))
        {
            if($row["userid"]==$_POST["userid"]&&$row["password"]==$_POST["password"])
            {
                $_SESSION["user_role"] = "administrator";
                header('Location: ./admin/index.php');
                exit;
            }
        }
    }
    $message = "wrong login credentials";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.png">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="admin-login.php">
      <img class="mb-4 rounded-circle" src="images/logo1.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">User ID</label>
      <input type="text" id="inputEmail" name="userid" class="form-control" placeholder="User ID" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
  </body>
</html>