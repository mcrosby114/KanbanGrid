<?php
//Redirect if not logged in
if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"])) {
	header("Location: login.php");
	die;
}
?>

<?php $thisPage = 'Main'; ?>

<?php require_once("php_includes/header.php"); ?>

<body>
	<div class="grid-pg-background">
		<table>
			<caption> <?=$_SESSION["username"]?>'s KanbanGrid</caption>
			<col id="project_title_col"/>
			<colgroup id="entry_cols">
				<col /><col /><col />
				<col /><col /><col />
			</colgroup>
			<tr><th></th>
				<th>Mon</th>
				<th>Tues</th>
				<th>Wed</th>
				<th>Thurs</th>
				<th>Fri</th>
				<th>Sat</th>
			</tr>
			<tr>
				<td>blank</td>
				<td><div>Test Data...<p>Hello, this is a line</p><p>Follow me to the next line...</p><h6>Heading woohoo</h6><p>Followed by this line</p><hr><p>The end</p></div></td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
			</tr>
			<tr>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
			</tr>
			<tr>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
			</tr>
			<tr>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
				<td>blank</td>
			</tr>
		</table>
	</div>
</body>

<?php require_once("php_includes/footer.php"); ?>
