<?php require("../config.php"); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href=""> -->
  <title>Registration Form</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="student.css" rel="stylesheet">
</head>
<body class="text-center bg-info">
  <form class="form-signin" action="#" method="post">
    <!-- <i class="fas fa-trash-alt text-primary"></i> -->
    <img class="mb-4" src="admin.png" alt="" width="70" height="70" style="text-shadow:2px 10px 50px 0 rgb(0,0,0,1);">
    <h1 class="h3 mb-3 font-weight-normal text-light">Please Fill out the Form</h1>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="First Name" name="firstname" autofocus>
      <input type="text" class="form-control" placeholder="Last Name" name="lastname">
      <input type="tel" class="form-control" placeholder="Contact" name="contact">
      <input type="email" class="form-control" placeholder="Email" name="email">
      <textarea class="form-control" rows="1" placeholder="Address" name="address"></textarea>
      <input type="text" class="form-control" placeholder="Institute" name="institute">
      <input type="text" class="form-control" placeholder="Branch" name="branch">
      <input type="tel" class="form-control" placeholder="Year" name="year">
    </div>
    <button class="btn btn-lg btn-dark btn-block" type="submit" name="student-submit-button">Register</button>
    <p class="mt-sm-4 mt-3 text-light">&copy; 2017-2018</p>
  </form>
  <?php
  $string = "SELECT * FROM student ORDER BY S_Roll DESC LIMIT 1";
  $temp = $sql->query($string);
  if($demo = $temp->fetch_row()){
    $_SESSION['register'] = $demo[1];
    $_SESSION['register']++;
  }
  if (isset($_POST['student-submit-button'])) {
    $firstname = secure($_POST['firstname']);
    $lastname = secure($_POST['lastname']);
    $contact = secure($_POST['contact']);
    $email = secure($_POST['email']);
    $address = secure($_POST['address']);
    $institute = secure($_POST['institute']);
    $branch = secure($_POST['branch']);
    $year = secure($_POST['year']);
    $string = "INSERT INTO `student` (`S_Roll`,`S_fname`, `S_lname`, `S_contact`, `S_email`, `S_address`, `S_institute`, `S_branch`, `S_year`) VALUE ('$_SESSION[register]','$firstname','$lastname','$contact','$email','$address','$institute','$branch','$year')";
    $temp = $sql->query($string);
    if($temp){
      header("location:student.php?registered");
    }
    else{
      ?>
      <div class="container"><div class="card mx-auto"><div class="card-body" style="background-color: #ff6666; color: red; border-color: red;text-align: center;">unable to register please try again!!!</div></div></div>
      <?php
    }
  }
  ?>

</body>
</html>