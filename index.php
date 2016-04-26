<?php
	//Redirect if user IS logged in
  if(!isset($_SESSION)) session_start();
  if(isset($_SESSION['access_granted']) && $_SESSION['access_granted']) {
    header("Location: grid.php");
    die;
  }
?>

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
        <h2>Let KanbanGrid Map your Workflow</h2>
        <h4>KanbanGrid is a simple, intuitive, and flexible way to map out your weekly projects and tasks.</h4>
        <img id-"testimg" src="images/business-idea-534228_cropped.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/>
        <p>Kanban helps you harness the power of visual information by using sticky notes on a whiteboard to create a “picture” of your work. Seeing how your work flows within your team’s process lets you not only communicate status but also give and receive context for the work. Kanban takes information that typically would be communicated via words and turns it into brain candy.</p>
        <p>
          Unlike other methods that force fit change from the get-go, Kanban is about evolution, not revolution. It hinges on the fundamental truth that you can’t get where you want to go without first knowing where you are.
        </p>
        <p>
          Kanban is gaining traction as a way to smoothly implement Agile and Lean management methods in tech and non-tech companies around the world. Throughout this fresh take on Toyota’s manufacturing process, Kanban’s core elements have remained rooted in the principles below.
        </p>
        <p>
          By creating a visual model of your work and workflow, you can observe the flow of work moving through your Kanban system. Making the work visible—along with blockers, bottlenecks and queues—instantly leads to increased communication and collaboration.
        </p>
      </div>

      <div class="bodysection" id="sec2img">
        <h2>Get Your Weekly Agenda Under Control</h2>
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/Kanban_board.png" alt="Kanban Example" title="KanbanGrid in Action"/>
      </div>

      <div class="bodysection" id="sec3">
        <h2>Flexibility in Planning</h2>
        <p>By limiting how much unfinished work is in process, you can reduce the time it takes an item to travel through the Kanban system. You can also avoid problems caused by task switching and reduce the need to constantly reprioritize items.</p>
        <p>
          By using work-in-process (WIP) limits and developing team-driven policies, you can optimize your Kanban system to improve the smooth flow of work, collect metrics to analyze flow, and even get leading indicators of future problems by analyzing the flow of work.
        </p>
        <p>
          Once your Kanban system is in place, it becomes the cornerstone for a culture of continuous improvement. Teams measure their effectiveness by tracking flow, quality, throughput, lead times and more. Experiments and analysis can change the system to improve the team’s effectiveness.
        </p>
        <img src="images/kanban7_cropped.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/>
        <p>Kanban became an effective tool to support running a production system as a whole, and an excellent way to promote improvement. Problem areas are highlighted by reducing the number of kanban in circulation.</p>
        <p>One of the main benefits of kanban is to establish an upper limit to the work in progress inventory, avoiding overloading of the manufacturing system. Although producing software is a creative activity and therefore different to mass-producing cars, the underlying mechanism for managing the production line can still be applied.</p>
      </div>
    </body>

  <?php require_once("php_includes/footer.php"); ?>
