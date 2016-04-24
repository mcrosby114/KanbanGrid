<?php
class Dao {
  #For BSU WebDev MySQL
  // private $host = 'localhost';
  // private $port = 3306;
  // private $username = 'mcrosby';
  // private $password = 'password';
  // private $dbname = 'mcrosby';

  #For home testing with MAMP
  private $host = "localhost";
  private $port = 3308;
  private $username = "root";
  private $password = "root";
  private $dbname = "mcrosby";

  private function getConnection() {
    try {
      $conn = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname};", "$this->username", "$this->password");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
    return $conn;
  }

  public function emailExists($email) {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM User WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    if($stmt->fetch())
      return true;
    else
      return false;
  }

  public function createUser($username, $email, $password) {
    $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
    $conn = $this->getConnection();
    $stmt = $conn->prepare("INSERT INTO User (username, email, pass_hash) VALUES (:username, :email, :password)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashed_pwd);
    $stmt->execute();
  }

  public function validateLogin($email,$password) {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM User WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $row = $stmt->fetch();
    //If fetch did not return false, email exists.
    //Proceed to check password against hash associated with email in database
    if($row){
      $stored_hash = $row['pass_hash'];
      if(password_verify($password, $stored_hash))
        return true;
    } else {
      return false;
    }
  }

  public function getUserName($email) {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM User WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row['username'];
  }




}
?>
