<?php $thisPage = 'Sign Up'; ?>

<?php
  require_once("php_includes/header.php");
  if(!isset($_SESSION)) session_start();
?>


<body>
  <div class="signup-pg-background">
    <div id="form-wrapper">
        <form class="centerForm" action="login_handler.php" method="post">

          <h1 class="formTitle">Sign Up</h1>

          <?php
            if(isset($_SESSION["email_error"])) {
              echo "<div id='error_msg'>" . $_SESSION["email_error"] . "</div>";
              unset($_SESSION["email_error"]);
            }
            if(isset($_SESSION["password_error"])) {
              echo "<div id='error_msg'>" . $_SESSION["password_error"] . "</div>";
              unset($_SESSION["password_error"]);
            }
          ?>

          <fieldset>
            <label class="labelTitle" for="email">Email:</label>
            <input type="text" id="email" name="user_email" placeholder="example@example.com"
            value="<?php
              if(isset($_SESSION["email"]))
                echo $_SESSION["email"];
            ?>">

            <label class="labelTitle" for="password">Password:</label>
            <input type="password" id="password" name="user_password">

          </fieldset>

          <button type="submit" name="LogIn_Pressed">Log In</button>

        </form>
    </div>
  </div>
</body>

<?php require_once("php_includes/footer.php"); ?>
