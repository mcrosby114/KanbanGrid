<?php
//Redirect if not logged in
if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"])) {
	header("Location: login.php");
	die;
}
?>

<?php
	$thisPage = 'Main';
	$user_id = $_SESSION["userid"];
	$user_name = $_SESSION["username"];
	require_once("php_includes/header.php");
	// require_once ("dao.php");
	// require_once("project_retriever.php");
?>

<body>
	<div class="grid-pg-background">
		<table>
			<caption> <?=ucwords($user_name)?>'s Projects</caption>
			<col id="project_title_col"/>
			<colgroup id="entry_cols">
				<col /><col /><col />
				<col /><col /><col /><col />
			</colgroup>
			<tr><th></th>
				<th>Mon</th>
				<th>Tues</th>
				<th>Wed</th>
				<th>Thurs</th>
				<th>Fri</th>
				<th>Sat</th>
				<th>Sun</th>
			</tr>
			<?php include ("generate_grid.php"); ?>
		</table>

		<!-- include ("debugArray.php"); -->

	</div>

<?php require_once("php_includes/footer.php"); ?>
