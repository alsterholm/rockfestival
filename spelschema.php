<?php
	include 'includes/header.php';
	require_once 'lib/init.php';

	$db = Database::getInstance();

	$spelschema = $db->query("SELECT * FROM spelschema")->result();
?>

	<h1>Spelschema</h1>
	<br>
	<h3 class="center">Torsdag 18/6 | Fredag 19/6 | Lördag 20/6</h3>
	<br>
	<table class="table table-striped center">
		<thead>
			<tr>
				<td>Tid</td>
				<td>Mallorcascenen</td>
				<td>Dieseltältet</td>
				<td>Forumscenen</td>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<br>
	<br>

<?php include 'includes/footer.php'; ?>
<script>

</script>