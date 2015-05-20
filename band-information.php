<?php
include 'includes/header.php';
require_once 'lib/init.php';

$db = Database::getInstance();

$bands = $db->query("SELECT id, namn, land FROM band
					ORDER BY namn")->result();

?>

<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Band</td>
					<td>Nationalitet</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($bands as $band) {
						echo '
							<tr>
								<td><a href="band.php?id=' . $band->id . '">' . $band->namn . '</a></td>
								<td>' . $band->land . '</td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
	</div>
</div>
	

<?php include 'includes/footer.php'; ?>