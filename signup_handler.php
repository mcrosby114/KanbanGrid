<?php
  if(!isset($_SESSION)) session_start();
  require_once ("dao.php");

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
      die;
    }
    else if(!preg_match("/^[A-Za-z][\sA-Za-z0-9]{0,31}$/", $username)){
      $_SESSION["username_error"] = "Username must be letters and/or numbers.";
      $_SESSION["username"] = $username;
      header("Location:signup.php");
      die;
    }
    else {
      $_SESSION["username"] = $username;
      $namePresent = true;
    }

    if(empty($email)) {
      $_SESSION["email"] = null;
      $_SESSION["email_error"] = "Email address required.";
      header("Location:signup.php");
      die;
    }
    else {
      if(!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $email)) {
        $_SESSION["email_error"] = "Invalid email syntax.";
        $_SESSION["email"] = $email;
        header("Location:signup.php");
        die;
      }
      else {
        $_SESSION["email"] = $email;
        $emailPresent = true;
      }
    }

    if(empty($password)) {
      $_SESSION["password_error"] = "Password required.";
      header("Location:signup.php");
      die;
    }
    else if(strlen($password) < 6){
      $_SESSION["password_error"] = "Password must be at least 6 characters long.";
      header("Location:signup.php");
      die;
    }
    else {
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
        die;
      } else {
        $dao->createUser($username, $email, $password);
        header("Location:signup_success.php");
        die;
      }
    } catch(Exception $e) {
        var_dump($e);
        echo "I'm a dumb dumb.";
        die;
    }
  }
?>
