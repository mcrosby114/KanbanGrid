<?php $thisPage = 'Welcome'; ?>

<?php require_once("php_includes/header.php"); ?>


  <body>
      <form class="smallForm" action="login_handler.php" method="post">
        <h2 class="formTitle">Log In</h2>
        <?php $emailHighlight = ""; ?>
        <?php $passwordHighlight = ""; ?>
        <?php
          if(isset($_SESSION["login_error"])) {
            echo "<div id='error_msg'>" . $_SESSION["login_error"] . "</div>";
            unset($_SESSION["login_error"]);
          }
          if(isset($_SESSION["email_error"])) {
            echo "<div id='error_msg'>" . $_SESSION["email_error"] . "</div>";
            $emailHighlight = "redHighlight";
            unset($_SESSION["email_error"]);
          }
          if(isset($_SESSION["password_error"])) {
            echo "<div id='error_msg'>" . $_SESSION["password_error"] . "</div>";
            $passwordHighlight = "redHighlight";
            unset($_SESSION["password_error"]);
          }
        ?>
        <fieldset class="indexpg-form">
          <label class="labelTitle" for="email">Email:</label>
          <input type="text" id="email" name="user_email" class="indexpg-form" class="<?= $emailHighlight; ?>" placeholder="example@example.com"
          value="<?php
            if(isset($_SESSION["email"]))
              echo $_SESSION["email"];
          ?>">
          <label class="labelTitle" for="password">Password:</label>
          <input type="password" id="password" class="indexpg-form" class="<?= $passwordHighlight; ?>" name="user_password">
        </fieldset>
        <button type="submit" name="Button_Pressed">Log In</button>
      </form>

      <div class="bodysection" id="sec1">
        <h2>SECTION 1 Intro Text, Img, Signup Form</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac mauris sed libero rutrum congue at eget elit. Maecenas a ex eu leo porttitor iaculis. Curabitur egestas eu massa sed condimentum. Nulla facilisi. Proin tortor justo, pretium id rutrum sed, lobortis in nunc. Cras pulvinar sodales massa quis dapibus. Nulla non dolor sit amet ligula aliquet elementum.</p>
        <img id-"testimg" src="images/business-idea-534228_cropped.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/>
        <p>Maecenas at laoreet metus. Donec lobortis tempor dolor vitae rutrum. Sed aliquam porta lacus vitae volutpat. Pellentesque suscipit urna at augue aliquet, eu condimentum enim hendrerit. Maecenas volutpat, nibh sed semper dignissim, ipsum massa elementum lacus, nec tincidunt erat quam luctus turpis. Mauris pellentesque ipsum eu mauris suscipit tempus. Donec ut libero aliquet, maximus eros vitae, blandit ligula. Curabitur purus turpis, mattis vitae eleifend eu, ultricies vel nunc. Donec nec justo purus. Duis tempor purus ac risus aliquam pulvinar.</p>
      </div>

      <div class="bodysection" id="sec2img">
        <h2>SECTION 2: Wide Image</h2>
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/Kanban_board.png" alt="Kanban Example" title="KanbanGrid in Action"/>
      </div>

      <div class="bodysection" id="sec3">
        <h2>SECTION 3: User reviews (Text in columns or boxes)</h2>
        <p>Donec egestas tortor ac mi vehicula consequat. Donec eleifend porttitor consectetur. Sed sed commodo purus, vitae viverra dui. Suspendisse potenti. Nullam quis tellus tempus, tincidunt elit sed, posuere leo. Pellentesque non sapien feugiat, iaculis libero a, lacinia quam. Pellentesque eu sem bibendum, efficitur erat id, aliquet odio. Mauris sit amet dictum velit. Aliquam sagittis tincidunt arcu, sit amet pharetra lorem pretium nec. In efficitur tristique ultricies.</p>
        <img src="images/kanban7_cropped.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/>
        <p>Fusce sed lorem venenatis, efficitur turpis sit amet, elementum dolor. Nam sed pharetra urna. Aenean laoreet eu ex ac tristique. Phasellus consectetur rutrum condimentum. Sed ut pharetra nulla. Etiam blandit ac augue nec tempor. Nunc in ante nec leo tincidunt eleifend. Nam quis dolor malesuada tellus pellentesque sodales ut et sapien.</p>
        <p>Vivamus ornare cursus lorem sit amet faucibus. Sed tincidunt libero metus. Proin elit eros, iaculis non sollicitudin consequat, iaculis sit amet lorem. Maecenas eget egestas sem, sit amet ultrices nisi. Curabitur pellentesque felis quis elit iaculis maximus. Mauris dignissim malesuada bibendum. Nulla et eros enim. Morbi et nulla id erat consectetur luctus ut non dolor. Nulla ut finibus nibh, nec interdum augue. Nam pretium rutrum erat, id lobortis magna. Curabitur iaculis lectus vitae diam sodales, nec hendrerit tellus fringilla. Donec ut leo eget nisl accumsan suscipit.</p>
      </div>
    </body>

  <?php require_once("php_includes/footer.php"); ?>
