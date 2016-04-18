<?php
	//Redirect if user IS logged in
  if(!isset($_SESSION)) session_start();
  if(isset($_SESSION['access_granted']) && $_SESSION['access_granted']) {
    header("Location: grid.php");
    die;
  }
?>

<?php $thisPage = 'Log In'; ?>

<?php require_once("php_includes/header.php"); ?>

<body>
  <div class="login-pg-background">
    <div id="form-wrapper">
        <form class="centerForm" action="login_handler.php" method="post">

          <h1 class="formTitle">Log In</h1>

          <?php $emailHighlight = ""; ?>
          <?php $passwordHighlight = ""; ?>

          <?php
            if(isset($_SESSION["login_error"])) {
              echo "<div id='error_msg'>" . $_SESSION["login_error"] . "</div>";
              unset($_SESSION["login_error"]);
            }
            if(isset($_SESSION["email_error"])) {
              echo "<div id='error_msg'>" . $_SESSION["email_error"] . "</div>";
              $emailHighlight = "redHighlight";
              unset($_SESSION["email_error"]);
            }
            if(isset($_SESSION["password_error"])) {
              echo "<div id='error_msg'>" . $_SESSION["password_error"] . "</div>";
              $passwordHighlight = "redHighlight";
              unset($_SESSION["password_error"]);
            }
          ?>

          <fieldset>
            <label class="labelTitle" for="email">Email:</label>
            <input type="text" id="email" name="user_email" class="<?= $emailHighlight; ?>" placeholder="example@example.com"
            value="<?php
              if(isset($_SESSION["email"]))
                echo $_SESSION["email"];
            ?>">

            <label class="labelTitle" for="password">Password:</label>
            <input type="password" id="password" class="<?= $passwordHighlight; ?>" name="user_password">

          </fieldset>

          <button type="submit" name="Button_Pressed">Log In</button>

        </form>
    </div>
  </div>
</body>


<?php require_once("php_includes/footer.php"); ?>
