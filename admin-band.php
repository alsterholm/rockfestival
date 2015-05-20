<?php

include 'includes/header.php';
require_once 'lib/classes/Database.php';

$db = Database::getInstance();

if (empty($_GET['id'])) {
	$bands = $db->query("SELECT id, namn, land FROM band ORDER BY namn")->result();
?>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Bandnamn</td>
					<td>Nationalitet</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($bands as $band) {
						echo '
							<tr>
								<td><a href="?id=' . $band->id . '">' . $band->namn . '</a></td>
								<td>' . $band->land . '</td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php
} else {
	$id = $_GET['id'];
	$band = $db->query("SELECT band.namn, band.land, anstalld.namn AS kontaktperson FROM band
						INNER JOIN anstalld ON anstalld.id = band.kontaktperson
						WHERE band.id = ?", array($id))->first();

	$members = $db->query("SELECT namn, fdatum FROM bandmedlem
							WHERE band_id = ?", array($id))->result();
?>
<div class="row">
	<div class="col-md-12">
		<h1><?php echo $band->namn ?></h1>
		<br>
		<table class="table table-striped">
			<tbody>
				<tr>
					<td><strong>Nationalitet:</strong></td>
					<td><?php echo $band->land ?><br></td>
				</tr>
				<tr>
					<td><strong>Kontaktperson:</strong></td>
					<td><?php echo $band->kontaktperson ?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<h3>Bandmedlemmar</h3>
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Namn</td>
					<td>Födelsedag</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($members as $member) {
						echo '
							<tr>
								<td>' . $member->namn . '</td>
								<td>' . $member->fdatum . '</td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
		<br>
		<h3>Lägg till medlem</h3>
	</div>
</div>
<?php
}

echo '</pre>';

include 'includes/footer.php';