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
        foreach ($data as $key => $p_row)
          $tmp[$key] = $p_row[$field];
        $args[$n] = $tmp;
      }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
  }

  $dao = new Dao();
  $proj_query = $dao->getProjects($user_id);
  $proj_rows = array_orderby($proj_query, 'row', SORT_ASC, 'id', SORT_ASC);
  $task_query = $dao->getTasks($user_id);
  $task_rows = array_orderby($task_query, 'proj_id', SORT_ASC, 'col', SORT_ASC);

  $p_due_date = "";
  $p_color = "";
  $p_title = "";
  $p_descrip = "";

  foreach($proj_rows as $p_row){
    $p_id = $p_row["id"];
    foreach($task_rows as $t_row){      //Load this project's tasks in a list
      if($t_row["proj_id"] == $p_id){
        $proj_tasks[] = $t_row;
      }
    }
    if(is_null($p_row["due_date"])){    //Prepare to print the project's info in first table column
      $p_due_date = NULL;
    }else{
      $date = date_create($p_row["due_date"]);
      $p_due_date = date_format($date, 'F jS, Y');
    }
    $p_color = $p_row["color"];
    $p_title = $p_row["title"];
    $p_descrip = $p_row["descrip"]; ?>
    <tr>
      <td id="col_0" class="<?='p_cell '.'color_'.$p_color; ?>">
        <!-- <button class="del-proj" > - </button> -->
        <a href="delete_proj.php?proj_id=<?php echo $p_id; ?>"><button id="del-button-white-border" class="button button-caution button-box button-tiny button-longshadow-right del-proj"><i class="fa fa-minus"></i></button></a>
        <div class="p_wrapper">
          <h4 class="item-title"><?=$p_title;?></h4>
          <hr />
          <p class="p_descrip"><?= $p_descrip;?></p>
          <!-- <hr /> -->
          <?php if (!is_null($p_due_date)){ ?>
            <p class="due-txt"><ins>Due: <?= $p_due_date;?></ins></p>
          <?php } ?>
        </div>
            <a href="addtask.php?proj_id=<?php echo $p_id; ?>"><button id="white-border" class="task-in-proj button-custom button-primary button-raised button-longshadow-right"><span><i class="fa fa-plus"></i> Add Task</span></button></a>
        <!-- <button id="white-border" class="task-in-proj button-custom button-primary button-raised button-longshadow-right"><span><i class="fa fa-plus"></i> Add Task</span></button> -->
        <!-- <button class="button button-border button-primary task-in-proj" style="vertical-align:middle" ><span>+ Add Task</span></button> -->



      </td>
      <td id="col_1">
        <?php foreach($proj_tasks as $key => $task){
          if($task["col"] == 1){
            $task_id = $task["id"];
            if(is_null($task["due_date"])){    //Prepare to print the project's info in first table column
              $t_due_date = NULL;
            }else{
              $date = date_create($task["due_date"]);
              $t_due_date = date_format($date, 'F jS, Y');
            }
            $t_color = $task["color"];
            $t_title = $task["title"];
            $t_descrip = $task["descrip"];

          ?><div class="<?='task-container '.'color_'.$t_color; ?>">
            <div id="dialog-confirm-task" title="Delete this Task?">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This will be permanently deleted and cannot be recovered. Are you sure?</p>
            </div>
            <button  id=<?php echo $task_id; ?> class="opener-task del-button-white-border button button-caution button-box button-tiny button-longshadow-right del-proj"><i class="fa fa-minus"></i></button>
              <div class="t_wrapper">
                <h4 class="item-title"><?=$t_title;?></h4>
                <hr />
                <p class="t_descrip"><?=$t_descrip?></p>
                <?php if (!is_null($t_due_date)){ ?>
                  <p class="due-txt"><ins>Due: <?= $t_due_date;?></ins></p>
                <?php } ?>
              </div>
            </div>

          <?php
            unset($proj_tasks[$key]);
          }
        }
        ?>
      </td>
      <td id="col_2">
        <?php foreach($proj_tasks as $key => $task){
          if($task["col"] == 2){
            $task_id = $task["id"];
            if(is_null($task["due_date"])){    //Prepare to print the project's info in first table column
              $t_due_date = NULL;
            }else{
              $date = date_create($task["due_date"]);
              $t_due_date = date_format($date, 'F jS, Y');
            }
            $t_color = $task["color"];
            $t_title = $task["title"];
            $t_descrip = $task["descrip"];

          ?><div class="<?='task-container '.'color_'.$t_color; ?>">
            <a href="delete_task.php?task_id=<?php echo $task_id; ?>"><button id="del-button-white-border" class="button button-caution button-box button-tiny button-longshadow-right del-proj"><i class="fa fa-minus"></i></button></a>
              <div class="t_wrapper">
                <h4 class="item-title"><?=$t_title;?></h4>
                <hr />
                <p class="t_descrip"><?=$t_descrip?></p>
                <?php if (!is_null($t_due_date)){ ?>
                  <p class="due-txt"><ins>Due: <?= $t_due_date;?></ins></p>
                <?php } ?>
              </div>
            </div>

          <?php
            unset($proj_tasks[$key]);
          }
        }
        ?>
      </td>
      <td id="col_3">
        <?php foreach($proj_tasks as $key => $task){
          if($task["col"] == 3){
            $task_id = $task["id"];
            if(is_null($task["due_date"])){    //Prepare to print the project's info in first table column
              $t_due_date = NULL;
            }else{
              $date = date_create($task["due_date"]);
              $t_due_date = date_format($date, 'F jS, Y');
            }
            $t_color = $task["color"];
            $t_title = $task["title"];
            $t_descrip = $task["descrip"];

          ?><div class="<?='task-container '.'color_'.$t_color; ?>">
            <a href="delete_task.php?task_id=<?php echo $task_id; ?>"><button id="del-button-white-border" class="button button-caution button-box button-tiny button-longshadow-right del-proj"><i class="fa fa-minus"></i></button></a>
              <div class="t_wrapper">
                <h4 class="item-title"><?=$t_title;?></h4>
                <hr />
                <p class="t_descrip"><?=$t_descrip?></p>
                <?php if (!is_null($t_due_date)){ ?>
                  <p class="due-txt"><ins>Due: <?= $t_due_date;?></ins></p>
                <?php } ?>
              </div>
            </div>

            <?php unset($proj_tasks[$key]);
          }
        }
        ?>
      </td>
      <td id="col_4">
        <?php foreach($proj_tasks as $key => $task){
          if($task["col"] == 4){
            $task_id = $task["id"];
            if(is_null($task["due_date"])){    //Prepare to print the project's info in first table column
              $t_due_date = NULL;
            }else{
              $date = date_create($task["due_date"]);
              $t_due_date = date_format($date, 'F jS, Y');
            }
            $t_color = $task["color"];
            $t_title = $task["title"];
            $t_descrip = $task["descrip"];

          ?><div class="<?='task-container '.'color_'.$t_color; ?>">
            <a href="delete_task.php?task_id=<?php echo $task_id; ?>"><button id="del-button-white-border" class="button button-caution button-box button-tiny button-longshadow-right del-proj"><i class="fa fa-minus"></i></button></a>
              <div class="t_wrapper">
                <h4 class="item-title"><?=$t_title;?></h4>
                <hr />
                <p class="t_descrip"><?=$t_descrip?></p>
                <?php if (!is_null($t_due_date)){ ?>
                  <p class="due-txt"><ins>Due: <?= $t_due_date;?></ins></p>
                <?php } ?>
              </div>
            </div>

            <?php unset($proj_tasks[$key]);
          }
        }
        ?>
      </td>
      <td id="col_5">
        <?php foreach($proj_tasks as $key => $task){
          if($task["col"] == 5){
            $task_id = $task["id"];
            if(is_null($task["due_date"])){    //Prepare to print the project's info in first table column
              $t_due_date = NULL;
            }else{
              $date = date_create($task["due_date"]);
              $t_due_date = date_format($date, 'F jS, Y');
            }
            $t_color = $task["color"];
            $t_title = $task["title"];
            $t_descrip = $task["descrip"];

          ?><div class="<?='task-container '.'color_'.$t_color; ?>">
            <a href="delete_task.php?task_id=<?php echo $task_id; ?>"><button id="del-button-white-border" class="button button-caution button-box button-tiny button-longshadow-right del-proj"><i class="fa fa-minus"></i></button></a>
              <div class="t_wrapper">
                <h4 class="item-title"><?=$t_title;?></h4>
                <hr />
                <p class="t_descrip"><?=$t_descrip?></p>
                <?php if (!is_null($t_due_date)){ ?>
                  <p class="due-txt"><ins>Due: <?= $t_due_date;?></ins></p>
                <?php } ?>
              </div>
            </div>

            <?php unset($proj_tasks[$key]);
          }
        }
        ?>
      </td>
      <td id="col_6">
        <?php foreach($proj_tasks as $key => $task){
          if($task["col"] == 6){
            $task_id = $task["id"];
            if(is_null($task["due_date"])){    //Prepare to print the project's info in first table column
              $t_due_date = NULL;
            }else{
              $date = date_create($task["due_date"]);
              $t_due_date = date_format($date, 'F jS, Y');
            }
            $t_color = $task["color"];
            $t_title = $task["title"];
            $t_descrip = $task["descrip"];

          ?><div class="<?='task-container '.'color_'.$t_color; ?>">
            <a href="delete_task.php?task_id=<?php echo $task_id; ?>"><button id="del-button-white-border" class="button button-caution button-box button-tiny button-longshadow-right del-proj"><i class="fa fa-minus"></i></button></a>
              <div class="t_wrapper">
                <h4 class="item-title"><?=$t_title;?></h4>
                <hr />
                <p class="t_descrip"><?=$t_descrip?></p>
                <?php if (!is_null($t_due_date)){ ?>
                  <p class="due-txt"><ins>Due: <?= $t_due_date;?></ins></p>
                <?php } ?>
              </div>
            </div>

            <?php unset($proj_tasks[$key]);
          }
        }
        ?>
      </td>
      <td id="col_7">
        <?php foreach($proj_tasks as $key => $task){
          if($task["col"] == 7){
            $task_id = $task["id"];
            if(is_null($task["due_date"])){    //Prepare to print the project's info in first table column
              $t_due_date = NULL;
            }else{
              $date = date_create($task["due_date"]);
              $t_due_date = date_format($date, 'F jS, Y');
            }
            $t_color = $task["color"];
            $t_title = $task["title"];
            $t_descrip = $task["descrip"];

          ?><div class="<?='task-container '.'color_'.$t_color; ?>">
            <a href="delete_task.php?task_id=<?php echo $task_id; ?>"><button id="del-button-white-border" class="button button-caution button-box button-tiny button-longshadow-right del-proj"><i class="fa fa-minus"></i></button></a>
              <div class="t_wrapper">
                <h4 class="item-title"><?=$t_title;?></h4>
                <hr />
                <p class="t_descrip"><?=$t_descrip?></p>
                <?php if (!is_null($t_due_date)){ ?>
                  <p class="due-txt"><ins>Due: <?= $t_due_date;?></ins></p>
                <?php } ?>
              </div>
            </div>

            <?php unset($proj_tasks[$key]);
          }
        }
        ?>
      </td>
    </tr>
<?php	}
?>
