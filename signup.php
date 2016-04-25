<?php
	//Redirect if user IS logged in
  if(!isset($_SESSION)) session_start();
  if(isset($_SESSION['access_granted']) && $_SESSION['access_granted']) {
    header("Location: grid.php");
    die;
  }
?>

<?php $thisPage = 'Sign Up'; ?>

<?php require_once("php_includes/header.php"); ?>

<body>
  <div class="signup-pg-background">
    <div id="form-wrapper">
        <form class="centerForm" action="signup_handler.php" method="post">

          <h1 class="formTitle">Create Your Account</h1>

          <?php $nameHighlight = ""; ?>
          <?php $emailHighlight = ""; ?>
          <?php $passwordHighlight = ""; ?>

          <?php
            if(isset($_SESSION["username_error"])) {
              echo "<div id='error_msg'>" . $_SESSION["username_error"] . "<span class='close-box'>&#10006</span>" . "</div>";
              $nameHighlight = "redHighlight";
              unset($_SESSION["username_error"]);
            }
            if(isset($_SESSION["email_error"])) {
              echo "<div id='error_msg'>" . $_SESSION["email_error"] . "<span class='close-box'>&#10006</span>" . "</div>";
              $emailHighlight = "redHighlight";
              unset($_SESSION["email_error"]);
            }
            if(isset($_SESSION["password_error"])) {
              echo "<div id='error_msg'>" . $_SESSION["password_error"] . "<span class='close-box'>&#10006</span>" . "</div>";
              $passwordHighlight = "redHighlight";
              unset($_SESSION["password_error"]);
            }
          ?>

          <fieldset>
            <label class="labelTitle" for="username">Name:</label>
              <input type="text" id="username" class="<?= $nameHighlight; ?>" name="user_name"
              value="<?php
                if(isset($_SESSION["username"]))
                  echo $_SESSION["username"];
              ?>">

            <label class="labelTitle" for="email">Email:</label>
            <input type="text" id="email" class="<?= $emailHighlight; ?>" name="user_email" placeholder="example@example.com"
            value="<?php
              if(isset($_SESSION["email"]))
                echo $_SESSION["email"];
            ?>">

            <label class="labelTitle" for="password">Password:</label>
            <input type="password" id="password" class="<?= $passwordHighlight; ?>" name="user_password">

          </fieldset>

          <button type="submit" name="Button_Pressed">Sign Up</button>

        </form>
    </div>
  </div>
</body>

<?php require_once("php_includes/footer.php"); ?>
