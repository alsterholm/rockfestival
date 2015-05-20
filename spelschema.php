<?php
	include 'includes/header.php';
	require_once 'lib/init.php';

	$db = Database::getInstance();

	$sql = "SELECT band.id, band.namn, starttid, sluttid FROM spelschema
				INNER JOIN band ON band.id = spelschema.band_id
				INNER JOIN scen ON scen.id = spelschema.scen_id 
				WHERE scen.namn = ?
				ORDER BY starttid
			";

	$mallorca = $db->query($sql, array('Mallorcascenen'))->result();
	$diesel = $db->query($sql, array('Dieseltältet'))->result();
	$forum = $db->query($sql, array('Forumscenen'))->result();

?>

	<h1>Spelschema</h1>
	
	<h2>Mallorcascenen</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<td>Band</td>
				<td>Starttid</td>
				<td>Sluttid</td>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($mallorca as $band) {
					echo '
						<tr>
							<td><a href="band.php?id=' . $band->id . '">' . $band->namn . '</a></td>
							<td>' . $band->starttid . '</td>
							<td>' . $band->sluttid . '</td>
						</tr>
					';
				}
			?>
		</tbody>
	</table>
	<br><br>
	<h2>Dieseltältet</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<td>Band</td>
				<td>Starttid</td>
				<td>Sluttid</td>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($diesel as $band) {
					echo '
						<tr>
							<td><a href="band.php?id=' . $band->id . '">' . $band->namn . '</a></td>
							<td>' . $band->starttid . '</td>
							<td>' . $band->sluttid . '</td>
						</tr>
					';
				}
			?>
		</tbody>
	</table>
	<br><br>	
	<h2>Forumscenen</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<td>Band</td>
				<td>Starttid</td>
				<td>Sluttid</td>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($forum as $band) {
					echo '
						<tr>
							<td><a href="band.php?id=' . $band->id . '">' . $band->namn . '</a></td>
							<td>' . $band->starttid . '</td>
							<td>' . $band->sluttid . '</td>
						</tr>
					';
				}
			?>
		</tbody>
	</table>
<?php include 'includes/footer.php'; ?>
<script>

</script>
