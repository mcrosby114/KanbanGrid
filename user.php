<?php
require_once ("dao.php");

class User {
  private $id;
  private $name;
  private $projects = array();

  public function __construct($id, $name){
    $this->id = $id;
    $this->name = $name;
  }

  public function get_id(){
    return $this->id;
  }

  public function get_name(){
    return $this->name;
  }


}
?>
