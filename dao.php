<?php
class Dao {

  private $host = '127.0.0.1';
  private $port = 3306;
  private $charset = 'utf8';
  private $username = 'crosbyPHP';
  private $password = 'password';
  private $sslCA = '/private/etc/mysql/ssl/mysql-ca.pem';
  private $sslCERT = '/private/etc/mysql/ssl/mysql-server-cert.pem';
  private $sslKEY = '/private/etc/mysql/ssl/mysql-server-key.pem';
  private $dbname = 'mcrosby';

  private function getConnection() {
    try {
      $conn = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset={$this->charset}", "$this->username", "$this->password");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // $conn->setAttribute(PDO::MYSQL_ATTR_SSL_CA, "$this->sslCA");
      // $conn->setAttribute(PDO::MYSQL_ATTR_SSL_CERT, "$this->sslCERT");
      // $conn->setAttribute(PDO::MYSQL_ATTR_SSL_KEY, "$this->sslKEY");
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

  public function getUserID($email) {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM User WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row['id'];
  }

  public function getNextRow($user_id) {
    $conn = $this->getConnection();
    // $stmt = $conn->prepare('CALL userProjectCount(:user_id, @rowCt)');
    // $stmt->bindParam(":user_id", $user_id);
    // $stmt->execute();
    // $stmt->closeCursor();
    // $count = $conn->query("SELECT @rowCt AS rowCt")->fetch(PDO::FETCH_ASSOC);
    // return $count['rowCt'];

    $stmt = $conn->prepare("SELECT MAX(row) FROM Project WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    $highest = $stmt->fetch();
    return $highest[0] + 1;
  }

  public function addProject($row, $title, $user_id, $descrip=NULL, $due_date=NULL, $color=NULL) {
    if(is_null($due_date)){
      $conn = $this->getConnection();
      $stmt = $conn->prepare("INSERT INTO Project (row, color, title, descrip, user_id)
      values (:row, :color, :title, :descrip, :user_id)");
      $stmt->bindParam(':row', $row);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':descrip', $descrip);
      $stmt->bindParam(':user_id', $user_id);
      $stmt->execute();
    }else{
      $conn = $this->getConnection();
      $stmt = $conn->prepare("INSERT INTO Project (row, due_date, color, title, descrip, user_id)
      values (:row, :due_date, :color, :title, :descrip, :user_id)");
      $stmt->bindParam(':row', $row);
      $stmt->bindParam(':due_date', $due_date);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':descrip', $descrip);
      $stmt->bindParam(':user_id', $user_id);
      $stmt->execute();
    }
  }

  public function deleteProject($proj_id){
    $conn = $this->getConnection();
    $stmt = $conn->prepare("DELETE FROM Project WHERE id = :proj_id");
    $stmt->bindParam(":proj_id", $proj_id);
    $stmt->execute();

    $stmt2 = $conn->prepare("DELETE FROM Task WHERE proj_id = :proj_id");
    $stmt2->bindParam(":proj_id", $proj_id);
    $stmt2->execute();
  }

  public function getProjects($user_id) {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM Project WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function addTask($column, $title, $user_id, $proj_id, $descrip=NULL, $due_date=NULL, $color=NULL) {
    if(is_null($due_date)){
      $conn = $this->getConnection();
      $stmt = $conn->prepare("INSERT INTO Task (col, color, title, descrip, user_id, proj_id)
      values (:col, :color, :title, :descrip, :user_id, :proj_id)");
      $stmt->bindParam(':col', $column);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':descrip', $descrip);
      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':proj_id', $proj_id);
      $stmt->execute();
    }else{
      $conn = $this->getConnection();
      $stmt = $conn->prepare("INSERT INTO Task (col, due_date, color, title, descrip, user_id, proj_id)
      values (:col, :due_date, :color, :title, :descrip, :user_id, :proj_id)");
      $stmt->bindParam(':col', $column);
      $stmt->bindParam(':due_date', $due_date);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':descrip', $descrip);
      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':proj_id', $proj_id);
      $stmt->execute();
    }
  }

  public function deleteTask($task_id){
    $conn = $this->getConnection();
    $stmt = $conn->prepare("DELETE FROM Task WHERE id = :task_id");
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();
  }

  public function getTasks($user_id) {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM Task WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }


}
?>
