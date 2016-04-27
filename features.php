<?php
	//Redirect if user IS logged in
  if(!isset($_SESSION)) session_start();
  if(isset($_SESSION['access_granted']) && $_SESSION['access_granted']) {
    header("Location: grid.php");
    die;
  }
?>

<?php $thisPage = 'Features'; ?>

<?php require_once("php_includes/header.php"); ?>

<body>
		<div class="bodysection" id="sec1">
			<h1>Features</h1>
			<h2> Visualize your work at a glance</h2>
			<p>You have to understand what it takes to get an item from request to completion. The goal of Kanban is to make positive change to optimize the flow of work through the system. Only after understanding how the workflow currently functions can you aspire to improve it by making the correct adjustments. Making changes before you understand your workflow is putting the proverbial cart before the horse and can cause you to make choices that are, at best, unhelpful and, at worst, harmful.</p>
		</div>

		<div class="bodysection" id="wideimg">
			<h2>Built for speed and flexibility</h2>
			<p>
				The Kanban board gives you an excellent overview of your current work situation. Visualizing work in a team environment simplifies communication and lead to improved effectiveness. By focusing your efforts on working on fewer items at the same time, you will get more done. Lots more actually. And you will feel less stressed.
			</p>
			<ul class="bxslider">
			  <!-- <li><img src="images/kanboard.png" height=400px min-width=1000px alt="Kanban Example" title="KanbanGrid in Action"/></li> -->
			  <li><img src="images/kanban3.png" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/></li>
			  <li><img src="images/kanban4.png" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/></li>
				<li><img src="images/kanban5.png" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/></li>
				<li><img src="images/computer4_cropped.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/></li>
			  <li><img src="images/office5.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/></li>
				<li><img src="images/office4.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/></li>
			</ul>
			<!-- <img src="images/computer4_cropped.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/> -->
		</div>

		<div class="bodysection" id="sec3">
			<h2>Manage flow</h2>
			<p>
				Kanban is incredibly simple, but at the same time incredibly powerful. In its simplest incarnation, a kanban system consists of a big board on the wall with cards or sticky notes placed in columns with numbers at the top.
			</p>
			<p>
				The most common way to visualize your workflow is to use card walls with cards and columns. Each column on the wall represents steps in your workflow. I also like to recommend that you take this one step farther and visualize your incoming work requests. The ways in which this can be done are as varied as the workflows you might see out in the wild.
			</p>
			<p>
				Get things done, quickly. That's the way we think it should be when working with a lean project management tool. Add, delete, move or reorder your tasks without experiencing any frustrating loading times.
			</p>
			<img src="images/kanban1_cropped.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/>
			<p>
				The Kanban board gives you an excellent overview of your current work situation. When working in a team of people you can instantly see what other people are working on right now, what has been done and what is coming up. KanbanFlow can be used as a Lean project management tool for you and your team. Its intuitive user interface will get you up and running in a few minutes.
			</p>
		</div>
</body>

<?php require_once("php_includes/footer.php"); ?>
