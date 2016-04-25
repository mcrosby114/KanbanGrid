<?php
  // if(!isset($_SESSION)) session_start();
  // require_once ("dao.php");
	// $user_id = $_SESSION["userid"];
  //
  // function array_orderby() {
  //   $args = func_get_args();
  //   $data = array_shift($args);
  //   foreach ($args as $n => $field) {
  //     if (is_string($field)) {
  //       $tmp = array();
  //       foreach ($data as $key => $row)
  //         $tmp[$key] = $row[$field];
  //       $args[$n] = $tmp;
  //     }
  //   }
  //   $args[] = &$data;
  //   call_user_func_array('array_multisort', $args);
  //   return array_pop($args);
  // }
  //
  // $dao = new Dao();
  // $proj_rows = $dao->getProjects($user_id);
  //
  // $sorted_rows = array_orderby($proj_rows, 'row', SORT_ASC, 'id', SORT_ASC);

  foreach($sorted_rows as $row){ ?>
    <pre>
      <?=$dao->getRowCount($user_id); ?>
      <?php print_r($row); ?>
    </pre>
<?php	}
?>
