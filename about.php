<?php
	//Redirect if user IS logged in
  if(!isset($_SESSION)) session_start();
  if(isset($_SESSION['access_granted']) && $_SESSION['access_granted']) {
    header("Location: grid.php");
    die;
  }
?>

<?php $thisPage = 'About'; ?>

<?php require_once("php_includes/header.php"); ?>

<body>
		<div class="bodysection" id="sec1">
			<h1>The Kanban Concept</h1>
			<h2> Why use the Kanban method to plan things?</h2>
			<p>Kanban is a new technique for managing a software development process in a highly efficient way. Kanban underpins Toyota's "just-in-time" (JIT) production system. Although producing software is a creative activity and therefore different to mass-producing cars, the underlying mechanism for managing the production line can still be applied.</p>
			<p>A software development process can be thought of as a pipeline with feature requests entering one end and improved software emerging from the other end.</p>
			<p>Inside the pipeline, there will be some kind of process which could range from an informal ad hoc process to a highly formal phased process. In this article, we'll assume a simple phased process of: (1) analyse the requirements, (2) develop the code, and (3) test it works.</p>
		</div>

		<div class="bodysection" id="wideimg">
			<h2>The Effect of Bottlenecks</h2>
			<img src="images/kanban6.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/>
		</div>

		<div class="bodysection" id="sec3">
			<h2>Kanban reveals bottlenecks dynamically</h2>
			<p>A bottleneck in a pipeline restricts flow. The throughput of the pipeline as a whole is limited to the throughput of the bottleneck.</p>
			<p>Using our development pipeline as an example: if the testers are only able to test 5 features per week whereas the developers and analysts have the capacity to produce 10 features per week, the throughput of the pipeline as a whole will only be 5 features per week because the testers are acting as a bottleneck.</p>
			<p>If the analysts and developers aren't aware that the testers are the bottleneck, then a backlog of work will begin to pile up in front of the testers.</p>
			<p>The effect is that lead times go up. And, like warehouse stock, work sitting in the pipeline ties up investment, creates distance from the market, and drops in value as time goes by.</p>
			<p>Inevitably, quality suffers. To keep up, the testers start to cut corners. The resulting bugs released into production cause problems for the users and waste future pipeline capacity. If, on the other hand, we knew where the bottleneck was, we could redeploy resources to help relieve it. For example, the analysts could help with testing and the developers could work on test automation.</p>
			<img src="images/planning2.jpg" height=400px width=1000px alt="Kanban Example" title="KanbanGrid in Action"/>
			<p>Kanban is incredibly simple, but at the same time incredibly powerful. In its simplest incarnation, a kanban system consists of a big board on the wall with cards or sticky notes placed in columns with numbers at the top.</p>
		</div>
</body>

<?php require_once("php_includes/footer.php"); ?>
