<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="view/images/icon.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/main.css">

    <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
    }
    </style>
    <title>Eating4Health</title>
  </head>
  
<body>
    <div class="container">
      <div class="row logos">
        <div class="col-sm">
          <a href="index.php">
            <img src="view/images/E4H_logo.png" class="text-left" alt="Logo for Eating 4 Health" style="width:150px;"></a>
            <!-- <h1 class="text-center">Eating4Health</h1> -->
        </div>
        <div class="col-sm"></div>
        <div class="col-sm">
        <img src="view/images/NBFM_logo.png" class="text-end" alt="New Beginnings Functional Medicine logo" style="width:200px;">
        </div>
      </div>

    <nav class="navbar topnav">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=diet">The Diet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=diet">Recipe Links</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">
                    Member Content</a>
                <div class="dropdown-menu topnav-dropdown">
                    <a class="dropdown-item" href="index.php?action=substitutes">Substitutes</a>
                    <a class="dropdown-item" href="index.php?action=list_recipe">Recipes</a>
                    <a class="dropdown-item" href="index.php?action=weekplan">Sample Week Plan</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=resources">Resources</a>
            </li>
        </ul>
    </nav>
    <header>
        <div class="loggedin">

            <?php if (!isset($_SESSION['userid']) { ?>

                <a href=".?action=login">Login</a>

            <?php } else if (isset($_SESSION['userid']) && $action !== 'logout') { 
                    $userid = $_SESSION['userid'];
            ?>

            <p>
                Welcome <?= $userid ?>! (<a href=".?action=logout">Sign Out</a>)
            </p>

            <?php } ?>
        </div>
    </header>