<?php
	//Redirect if not logged in
  if(!isset($_SESSION)) session_start();
  if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"])) {
    header("Location: login.php");
    die;
  }
?>

<?php $thisPage = 'Add Project'; ?>

<?php require_once("php_includes/header.php"); ?>

<body>
  <div class="login-pg-background">
    <div id="form-wrapper">
        <form class="centerForm" action="addproj_handler.php" method="post">

          <h1 class="formTitle">Add Project</h1>

          <fieldset>
            <label class="labelTitle" for="p_title">Title:</label>
            <input type="text" id="p_title" name="p_title" required autofocus maxlength="255">

            <label class="labelTitle" for="p_descrip">Description:</label>
            <textarea id="p_descrip" name="p_descrip"></textarea>

            <label class="labelTitle" for="p_due">Due Date:</label>
            <input type="date" id="p_due" name="p_due">

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

          <button type="submit" name="Button_Pressed">Save</button>

        </form>
    </div>
  </div>
</body>

<?php require_once("php_includes/footer.php"); ?>
