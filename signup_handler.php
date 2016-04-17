<?php
  if(!isset($_SESSION)) session_start();
  require_once "dao.php";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $username = test_input($_POST["user_name"]);
  $email = test_input($_POST["user_email"]);
  $password = test_input($_POST["user_password"]);
  $namePresent = false;
  $emailPresent = false;
  $passwordPresent = false;

  if (isset($_POST["Button_Pressed"])) {

    if(empty($username)) {
      $_SESSION["username"] = null;
      $_SESSION["username_error"] = "Username required.";
      header("Location:signup.php");
    }
    else {
      $_SESSION["username"] = $username;
      $namePresent = true;
    }

    if(empty($email)) {
      $_SESSION["email"] = null;
      $_SESSION["email_error"] = "Email address required.";
      header("Location:signup.php");
    }
    else {
      if(!preg_match("/^.+@.+$/", $email)) {
        $_SESSION["email_error"] = "Invalid email syntax.";
        $_SESSION["email"] = $email;
        header("Location:signup.php");
      }
      else {
        $_SESSION["email"] = $email;
        $emailPresent = true;
      }
    }

    if(empty($password)) {
      $_SESSION["password"] = null;
      $_SESSION["password_error"] = "Password required.";
      header("Location:signup.php");
    } else {
      $_SESSION["password"] = $password;
      $passwordPresent = true;
    }
  }

  #If input is valid so far, attempt to create new user in database
  if($namePresent && $emailPresent && $passwordPresent) {
    try {
      $dao = new Dao();
      if ($dao->emailExists($email)){
        $_SESSION["email_error"] = "Error: this email address is alreay in use.";
        header("Location:signup.php");
      } else {
        $dao->createUser($username, $email, $password);
        header("Location:signup_success.php");
      }
    } catch(Exception $e) {
        var_dump($e);
        echo "I'm a dumb dumb.";
        die;
    }
  }
?>
