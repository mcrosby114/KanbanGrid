<?php
  if(!isset($_SESSION)) session_start();
  require_once ("dao.php");
	$user_id = $_SESSION["userid"];

  function array_orderby() {
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
      if (is_string($field)) {
        $tmp = array();
        foreach ($data as $key => $row)
          $tmp[$key] = $row[$field];
        $args[$n] = $tmp;
      }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
  }

  $dao = new Dao();
  $proj_rows = $dao->getProjects($user_id);
  $sorted_rows = array_orderby($proj_rows, 'row', SORT_ASC, 'id', SORT_ASC);

  $p_due_date = "";
  $p_color = "";
  $p_title = "";
  $p_descrip = "";

  foreach($sorted_rows as $row){
    if(is_null($row["due_date"])){
      $p_due_date = NULL;
    }else{
      $date = date_create($row["due_date"]);
      $p_due_date = date_format($date, 'F jS, Y');
    }
    $p_color = $row["color"];
    $p_title = $row["title"];
    $p_descrip = $row["descrip"]; ?>
    <tr>
      <td class="<?='p_cell '.'color_'.$p_color; ?>">
        <h4><?=$p_title;?></h4>
        <?php if (!is_null($p_due_date)){ ?>
          <p><ins>Due: <?= $p_due_date;?></ins></p>
        <?php } ?>
        <p class="p_descrip"><?= $p_descrip;?></p>
      </td>
      <td>blank</td>
      <td>blank</td>
      <td>blank</td>
      <td>blank</td>
      <td>blank</td>
      <td>blank</td>
      <td>blank</td>
    </tr>
<?php	}
?>
