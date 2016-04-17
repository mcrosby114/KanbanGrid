<?php
class Dao {
  #For BSU WebDev MySQL
  // private $dbname = "mcrosby";
  // private $host ="localhost";
  // private $username = "mcrosby";
  // private $password = "Vuqadr2p";

  #For testing with MAMP
  private $host ="localhost";
  private $port = 3308;
  private $username = "root";
  private $password = "root";
  private $dbname = "mcrosby";

  private function getConnection() {
    try {
      #MAMP Testing
      $conn = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname};", "$this->username", "$this->password");

      #BSU WebDev Actual
      // $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};", "$this->username", "$this->password");

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
    if($stmt->fetch()) {
      return true;
    } else {
      return false;
    }
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




}
?>
