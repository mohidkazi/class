<?php
require("config.php");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href=""> -->
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="css/login.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" action="login.php" method="post">
    <img class="mb-4" src="image/admin.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="un" class="sr-only">User Name</label>
    <input type="text" id="un" class="form-control" placeholder="User Name" name="username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <?php
    if(isset($_GET['incorrect'])){
      echo "<div class='col-auto pass'>password incorrect</div>";
    }
    ?>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $username = secure($_POST['username']);
  $password = secure($_POST['password']);
  $str="SELECT * FROM `admin` WHERE `Admin_fname`='$username' OR `Admin_email`='$username' AND `Admin_password`='$password' AND `Admin_designation`='owner'";
  $temp=$sql->query($str);
  if($row=$temp->fetch_row()){
    $_SESSION['lid'] = $row[0];
    $_SESSION['aid'] = $row[0];
    header("location:landing.php");
  }
  else{
    header("location:login.php?incorrect");
  }
}
if (isset($_POST['submit'])) {
  $username = secure($_POST['username']);
  $password = secure($_POST['password']);
  $str="SELECT * FROM `admin` WHERE `Admin_fnameme`='$username' OR `Admin_email`='$username' AND `Admin_password`='$password' AND `Admin_designation`='staff'";
  $temp=$sql->query($str);
  if ($demo=$temp->fetch_row()) {
    $_SESSION['lid'] = $demo[0];
    header("location:landing.php");
  }
  else{
    header("location:login.php?incorrect");
  }
}
?>