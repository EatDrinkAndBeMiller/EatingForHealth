<?php
    require_once('util/valid_admin.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="icon" href="view/images/logo.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../view/css/main.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap');
    </style>

    <title>Eating4Health</title>
  </head>
  
<body>
  <div class="container">
    <div class="row logos">
      <div class="col-sm">
        <a href="../index.php">
          <img src="../view/images/E4H_logo_dark.jpg" class="text-left" alt="Logo for Eating 4 Health" 
            style="width:150px;"></a>
      </div>
      <div class="col-sm"></div>
        <div class="col-sm nbfm-logo">
        <a href="https://www.newbeginningsfmc.com/" target="_blank">
          <img src="../view/images/NBFM_logo.png" class="text-end" alt="New Beginnings Functional Medicine logo" 
               style="width:200px;"></a>
      </div>
    </div>
    <nav class="navbar topnav navbar-expand-lg navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Admin Home</a>
    </li>  
    <li class="nav-item">
      <a class="nav-link" href="../index.php">E4H Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../index.php?action=diet">The Diet</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../index.php" role="button" aria-haspopup="true" aria-expanded="false">
          Recipes</a>
      <div class="dropdown-menu topnav-dropdown">
        <a class="dropdown-item" href="../index.php?action=list_recipe">All Recipes</a>
        <a class="nav-link" href="../index.php?action=public_recipes">Public Recipe Links</a>
        <a class="dropdown-item" href="../index.php?action=profile">Favorites</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../index.php?action=resources" role="button" aria-haspopup="true" aria-expanded="false">
        Diet Resources</a>
        <div class="dropdown-menu topnav-dropdown">
            <a class="dropdown-item" href="../index.php?action=substitutes">Substitutes</a>
            <a class="dropdown-item" href="../index.php?action=weekplan">Sample Week Plan</a>
            <a class="dropdown-item" href="../index.php?action=resources">Resources/Education</a>
        </div>
      </li>
    </ul>
  </div>
  <div class="nav-item">       
    <ul class="navbar-nav">  
      <li style="color: #072968" class="hide-sm">
        <a class="dropdown-item" href="../.?action=profile">
          <?php $userid = $_SESSION['userid']; ?>
          Welcome, <?= $userid ?> </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../.?action=profile" role="button" aria-haspopup="true" aria-expanded="false">
          Profile</a>
          <div class="dropdown-menu topnav-dropdown">
            <a class="dropdown-item" href="../.?action=profile">View Profile</a>
            <a class="dropdown-item" href="../.?action=profile">Favorites</a>
            <a class="dropdown-item" href="../index.php?action=view_journal">Food Journal</a>
            <a href=".?action=logout">Sign Out</a>
          </div>
      </li>
    </ul>
  </div>
</nav>



