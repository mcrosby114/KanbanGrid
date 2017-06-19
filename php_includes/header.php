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

  <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
  <link href="images/squares_16px_16px.png" type="image/png" rel="shortcut icon" />

  <script src="../scripts/external/jquery-2.2.3.js"></script>
  <script src="../scripts/external/jquery-ui.js"></script>
  <script src="../scripts/external/jquery.bxslider.js"></script>
  <!-- <script src="../scripts/external/jquery.magnific-popup.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->
  <script src="../scripts/script.js"></script>

  <link rel="stylesheet" href="styles/external/normalize.css" type="text/css"/>
  <link rel="stylesheet" href="styles/external/jquery.bxslider.css" type="text/css"/>
  <link rel="stylesheet" href="styles/external/buttons.css" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/external/jquery-ui.css" type="text/css"/>
  <link rel="stylesheet" href="styles/external/jquery-ui.structure.css" type="text/css"/>
  <link rel="stylesheet" href="styles/external/jquery-ui.theme.css" type="text/css"/>
  <!-- <link rel="stylesheet" href="styles/external/_settings.css" type="text/css"/> -->
  <!-- <link rel="stylesheet" href="styles/external/main.css" type="text/css"/> -->
  <!-- <link rel="stylesheet" href="styles/external/magnific-popup.css" type="text/css"/> -->
  <link rel="stylesheet" href="styles/style.css" type="text/css"/>
  <link rel="stylesheet" href="styles/forms.css" type="text/css"/>

</head>

  <nav <?php if (!$logged_in) { echo " class=\"shadownav\" "; } ?>>
  <?php if($logged_in){ ?>
    <a class="banner-logo-container" id="homeclick" href="grid.php">
      <img id="logo" src="images/squares_50px_50px.png" alt="KanbanGrid Logo" title="Welcom to KanbanGrid"/>
      <span id="logotxt">KanbanGrid</span></a>
      <ul id="menubar">
        <li><a class="headlink" href="addproj.php">+ Add Project</a></li>
        <li><a id="settings-test" class="headlink" href="">Settings</a></li>
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
