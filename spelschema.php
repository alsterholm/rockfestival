<?php
	include 'includes/header.php';
	require_once 'lib/init.php';

	$db = Database::getInstance();

	$scener = $db->query("SELECT * FROM scen")->result();
	$spelschema = $db->query("SELECT starttid, band.namn FROM spelschema 
							INNER JOIN band
							ON band.id = spelschema.band_id 
							ORDER BY starttid")->result();
?>

	<h1>Spelschema</h1>
	<br>
	<h3 class="center">Torsdag 18/6 | Fredag 19/6 | Lördag 20/6</h3>
	<br>
	<table class="table table-striped center">
		<thead>
			<tr>
				<td>Tid</td>
				<?php
					foreach ($scener as $scen) {
						echo '<td>' . $scen->namn . '</td>';
					}
				?>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($spelschema as $spelning) {
					echo '
						<tr>
							<td>' . $spelning-> . '</td>
						</tr>
					';
				}

			?>
			
		</tbody>
	</table>
	<br>
	<br>

<?php include 'includes/footer.php'; ?>
<script>

</script>
