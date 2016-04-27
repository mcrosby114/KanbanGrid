<?php
	//Redirect if not logged in
  if(!isset($_SESSION)) session_start();
  if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"])) {
    header("Location: login.php");
    die;
  }
?>

<?php $thisPage = 'Add Task'; ?>

<?php require_once("php_includes/header.php"); ?>

<body>
  <div class="login-pg-background">
    <div id="form-wrapper">
        <form class="centerForm" action="addtask_handler.php" method="post">

          <h1 class="formTitle">Add Task</h1>

          <fieldset>
            <label class="labelTitle" for="t_title">Title:</label>
            <input type="text" id="t_title" name="t_title" required autofocus maxlength="255">

            <label class="labelTitle" for="t_descrip">Description:</label>
            <textarea id="t_descrip" name="t_descrip"></textarea>

            <label class="labelTitle" for="dayPicker">Day Select:</label>
            <select id="dayPicker" name="dayPicker" required>
              <option value="1">Monday</option>
              <option value="2">Tuesday</option>
              <option value="3">Wednesday</option>
              <option value="4">Thursday</option>
              <option value="5">Friday</option>
              <option value="6">Saturday</option>
              <option value="7">Sunday</option>
            </select>

            <label class="labelTitle" for="t_due">Due Date:</label>
            <input type="date" id="t_due" name="t_due">

            <label class="labelTitle" for="colorPicker">Color:</label>
            <select id="colorPicker" name="colorPicker">
              <option class="color_Red" value="Red">Red</option>
              <option class="color_Orange" value="Orange">Orange</option>
              <option class="color_Yellow" value="Yellow" selected>Yellow</option>
              <option class="color_Green" value="Green">Green</option>
              <option class="color_Blue" value="Blue">Blue</option>
              <option class="color_Purple" value="Purple">Purple</option>
            </select>
          </fieldset>

          <input type="hidden" name="proj_id" value="<?=$_GET["proj_id"]?>" />

          <button type="submit" name="Button_Pressed">Save</button>

        </form>
    </div>
  </div>
</body>

<?php require_once("php_includes/footer.php"); ?>
