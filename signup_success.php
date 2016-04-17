<?php $thisPage = 'Sign-up Successful'; ?>

<?php
  require_once("php_includes/header.php");
  if(!isset($_SESSION)) session_start();
?>

<?php $username = $_SESSION["username"]; ?>

<body>
  <div class="success-pg-background" id="signup-success">
    <p>Success! Welcome <?= $username; ?>. Your account has been created.</p>
    <p><a class="default-link" href="login.php">Please log in to access your grid.</a></p>
  </div>
</body>

<?php require_once("php_includes/footer.php"); ?>
