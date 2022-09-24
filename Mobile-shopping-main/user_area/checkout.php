<?php
include('../includes/connect.php');
//include('../functions/common_function.php');
//session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mobile shopping</title>
    <link rel="stylesheet" href="../style.css">
    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--font awsome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
  </head>
<body class="bg-light">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
  <span class="navbar-brand mb-0 h1"><img src="../images/smartphone.png" class="logo"></span>
  <span class="navbar-brand mb-0 h1" id="name">ZONE</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" id="navlist">
          <a class="nav-link"  href="../index.php"><button class="btn btn-primary">Home</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php"><button class="btn btn-primary">Product</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php"><button class="btn btn-primary">Register</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><button class="btn btn-primary">Contact us</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- second navbar-->
<nav class="navbar navbar-expand-lg bg-dark text-white">
  <ul class="navbar-nav me auto text-white">
<?php
if(!isset($_SESSION['username'])){
  echo"<li class='nav-item text-white'>
  <a class='nav-link text-white' href='#'>Welcome Guest,</a>
</li>";
}else{
  echo "<li class='nav-item'>
      <a class='nav-link text-white' href=''>Welcome ".$_SESSION['username']."</a>
</li>";
}
if(!isset($_SESSION['username'])){
  echo"<li class='nav-item'>
  <a class='nav-link text-white' href='./user_login.php'>Login</a>
</li>";
}else{
  echo "<li class='nav-item'>
      <a class='nav-link text-white' href='./logout.php'>Logout</a>
</li>";
}
?>
</nav>


<!-- third navbar-->
<div class="row px-1">
    <div class="col-md-12">
        <!--products -->
        <div class="row">
            <?php
        if(!isset($_SESSION['username'])){
            include('user_login.php');
        }else{
            include('payment.php');
        }
?>
        </div>
    </div>
</div>

<!-- footer section -->
<?php include('../includes/footer.php'); ?>
   <!--script link--> 
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>