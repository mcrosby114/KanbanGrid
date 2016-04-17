<?php
  if(!isset($_SESSION)) session_start();
  require_once "dao.php";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email = test_input($_POST["user_email"]);
  $password = test_input($_POST["user_password"]);
  $emailPresent = false;
  $passwordPresent = false;

  if (isset($_POST["Button_Pressed"])) {

    if(empty($email)) {
      $_SESSION["email"] = null;
      $_SESSION["email_error"] = "Email address required.";
      header("Location:login.php");
    }
    else {
      if(!preg_match("/^.+@.+$/", $email)) {
        $_SESSION["email_error"] = "Invalid email syntax.";
        $_SESSION["email"] = $email;
        header("Location:login.php");
      }
      else {
        $_SESSION["email"] = $email;
        $emailPresent = true;
      }
    }

    if(empty($password)) {
      $_SESSION["password"] = null;
      $_SESSION["password_error"] = "Password required.";
      header("Location:login.php");
    } else {
      $_SESSION["password"] = $password;
      $passwordPresent = true;
    }
  }

  if($emailPresent && $passwordPresent) {
    try {

      $status=false;
      // $dao = new Dao();
      // $status = $dao->validateLogin($email_entry,$password_entry);

      if ($status===FALSE) {
        $_SESSION["login_error"] = "Invalid combination of email and password.";
        header("Location:login.php");
      }
      else {
        $_SESSION["logged_in"] = true;
        header("Location:grid.php");
      }
    } catch(Exception $e) {
        var_dump($e);
        echo "I'm a dumb dumb.";
        die;
    }
  }
?>
