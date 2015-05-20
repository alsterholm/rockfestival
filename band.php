<?php

include 'includes/header.php';
require_once 'lib/init.php';

if (!isset($_GET['id'])) {
	exit('<div class="center">Sidan kan inte visas<br><br><a href="index.php">&laquo; Tillbaka till startsidan</a></div>');
}

$db = Database::getInstance();
$id = $_GET['id'];

$band = $db->query("SELECT namn, land FROM band
			WHERE id = ?", array($id))->first();

if (!$db->count()) {
	exit('<div class="center">Sidan kan inte visas<br><br><a href="index.php">&laquo; Tillbaka till startsidan</a></div>');
}

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
			</tbody>
		</table>
		<br>
		<h3>Speltid</h3>
		<?php
			$speltider = $db->query("SELECT scen.namn, spelschema.starttid FROM spelschema
							INNER JOIN scen ON scen.id = spelschema.scen_id
							WHERE spelschema.band_id = ?", array($id))->result();

			if (!$db->count()) {
				echo '<em>Bandet har inte fått någon speltid än</em><br><br>';
			} else {
		?>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Scen</td>
						<td>Tid</td>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($speltider as $speltid) {
							echo '
								<tr>
									<td>' . $speltid->namn . '</td>
									<td>' . $speltid->starttid . '</td>
								</tr>
							';
						}
					?>
				</tbody>
			</table>
		<?php
			}
		?>
		<br>
		<h3>Bandmedlemmar</h3>
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Namn</td>
					<td>Födelsedag</td>
				</tr>
			</thead>
			<tbody id="bandmember-table">
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

<br><br>
<?php
include 'includes/footer.php';