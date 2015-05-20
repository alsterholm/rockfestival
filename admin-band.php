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
		<br>
		<h3>Lägg till medlem</h3>
		<br>
		<input type="hidden" id="member_band" value="<?php echo $id; ?>">
		<div class="col-md-12">
			<label for="member_namn">Namn:</label>
			<input type="text" id="member_namn" class="form-control">
			<br>
		</div>
		<div class="col-md-12">
			<label for="member_fdatum">Födelsedatum:</label>
			<input type="text" id="member_fdatum" class="form-control" placeholder="YYYY-MM-DD">
			<br>
		</div>
		<div class="col-md-12">
			<button type="button" id="member_button" class="btn btn-primary">Lägg till</button>
		</div>
		<br>
		<div class="col-md-12 alert alert-success admin-notice" id="member_success">Bandmedlem tillagd</div>
		<div class="col-md-12 alert alert-danger admin-notice" id="member_failure">Det gick inte att lägga till bandmedlemmen</div>
	</div>
</div>
<br><br>
<?php
}
include 'includes/footer.php';
?>
<script src="js/admin.js"></script>
