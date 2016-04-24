<?php if(!isset($_SESSION)) session_start();?>

<?php if(isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
        $logged_in = true;
      } else {
        $logged_in = false;
      }
?>

<!DOCTYPE html>
<html lang=en>
<head>
  <meta charset="utf-8">
  <title>KanbanGrid - <?= $thisPage; ?></title>
  <script src="../scripts/jquery-2.2.3.js"></script>
  <script src="../scripts/jscode.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->
  <link rel="stylesheet" href="css/normalize.css" type="text/css"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="stylesheet" href="css/forms.css" type="text/css"/>
  <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
  <!-- <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'> -->
  <link href="images/squares_16px_16px.png" type="image/png" rel="shortcut icon" />
</head>
  <nav <?php if (!$logged_in) { echo " class=\"shadownav\" "; } ?>>
  <?php if($logged_in){ ?>
    <a class="banner-logo-container" id="homeclick" href="grid.php">
      <img id="logo" src="images/squares_50px_50px.png" alt="KanbanGrid Logo" title="Welcom to KanbanGrid"/>
      <span id="logotxt">KanbanGrid</span></a>
      <ul id="menubar">
        <li><a class="headlink" href="addproj.php">+ Add Project</a></li>
        <li><a class="headlink" href="addtask.php">+ Add Task</a></li>
        <li><a class="headlink signin_link" href="logout.php">Log Out</a></li>
      </ul>
  <?php } else { ?>
    <a class="banner-logo-container" <?php if ($thisPage == 'Welcome') { echo " id=\"homeclick\" "; } ?> href="index.php">
      <img id="logo" src="images/squares_50px_50px.png" alt="KanbanGrid Logo" title="Welcom to KanbanGrid"/>
      <span id="logotxt">KanbanGrid</span></a>
      <ul id="menubar">
        <li><a class="headlink" <?php if ($thisPage == 'Features') { echo " id=\"on\" "; } ?> href="features.php">Features</a></li>
        <li><a class="headlink" <?php if ($thisPage == 'About') { echo " id=\"on\" "; } ?> href="about.php">About</a></li>
        <li><a class="headlink" <?php if ($thisPage == 'Sign Up') { echo " id=\"on\" "; } ?> href="signup.php">Sign Up</a></li>
        <li><a class="headlink signin_link" <?php if ($thisPage == 'Log In') { echo " id=\"on\" "; } ?> href="login.php">Log In</a></li>
      </ul>
  <?php } ?>
  </nav>
