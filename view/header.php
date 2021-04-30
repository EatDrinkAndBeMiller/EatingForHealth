<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="icon" href="view/images/logo.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="view/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="view/css/main.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap');
    </style>

    <title>Eating4Health</title>
  </head>
  
<body>
  <div class="container">
    <div class="row logos">
      <div class="col-sm">
        <a href="index.php">
          <img src="view/images/E4H_logo_dark.jpg" class="text-left" alt="Logo for Eating 4 Health" 
            style="width:150px;"></a>
      </div>
      <div class="col-sm"></div>
        <div class="col-sm nbfm-logo">
        <a href="https://www.newbeginningsfmc.com/" target="_blank">
          <img src="view/images/NBFM_logo.png" class="text-end" alt="New Beginnings Functional Medicine logo" 
               style="width:200px;"></a>
      </div>
    </div>

    <nav class="navbar topnav navbar-expand-lg navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php">Home</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="nav nav-pills mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=diet">The Diet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=public_recipes">Recipe Links</a>
        </li>

        <?php if (isset($_SESSION['userid']) && $action !== 'logout') {  ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=substitutes">Substitutes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=list_recipe">All Recipes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=weekplan">Sample Week Plan</a>
          </li>
        <?php } else { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">
                Member Content</a>
            <div class="dropdown-menu topnav-dropdown">
                <a class="dropdown-item" href="index.php?action=substitutes">Substitutes</a>
                <a class="dropdown-item" href="index.php?action=list_recipe">All Recipes</a>
                <a class="dropdown-item" href="index.php?action=weekplan">Sample Week Plan</a>
            </div>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="index.php?action=resources">Resources</a>
        </li>
      </ul>
      <div class="login text-right">
        <?php if (!isset($_SESSION['userid'])) { ?>
          <a href=".?action=about-membership">Register<!-- &#47;About Membership --></a> &nbsp; &nbsp;
          <a href=".?action=login">Log in</a> 
            
        <?php } else if (isset($_SESSION['userid']) && $action !== 'logout') { 
                $userid = $_SESSION['userid'];
        ?>
          <p>
              Welcome <?= $userid ?>! (<a href=".?action=logout">Sign Out</a>)
          </p>
        <?php } ?>
      </div>
    </nav>



