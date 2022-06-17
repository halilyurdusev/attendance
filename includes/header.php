<?php
include_once "session.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance - <?php echo $title ?></title>
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">IT Conference</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link" aria-current="page" href="index.php">Home</a>
              <a class="nav-item nav-link" href="viewrecords.php">View Attendees</a>
            </div>
            <div class="navbar-nav mr-auto">
              <?php
                if(!isset($_SESSION['user_id'])){
              ?>
              <a class="nav-item nav-link" aria-current="page" href="login.php">Login</a>
              <?php 
                } else { ?>
                <a class="nav-item nav-link" aria-current="page" href="#"><span>Hello <?php  echo $_SESSION['username'];  ?>!</span></a>
                <a class="nav-item nav-link" aria-current="page" href="logout.php">Log Out</a>
               <?php } ?>
            </div>
          </div>
        </div>
      </nav>
    <div class="container">
      
<br>