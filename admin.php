<?php
include 'includes/header.php';
require_once 'lib/init.php';

$db = Database::getInstance();
$genres 	= $db->query("SELECT * FROM genre")->result();
$anstallda 	= $db->query("SELECT * FROM anstalld")->result();
$scener 	= $db->query("SELECT * FROM scen")->result();

$ansvar 	= $db->query("SELECT anstalld.namn AS anstalld, anstalld.personnummer, scen.namn AS scen, sakerhetsansvar.starttid, sakerhetsansvar.sluttid FROM sakerhetsansvar
							INNER JOIN anstalld ON anstalld.id=sakerhetsansvar.anstalld_id
							INNER JOIN scen ON scen.id=sakerhetsansvar.scen_id
							ORDER BY scen.id, sakerhetsansvar.starttid")->result();

$bands 		= $db->query("SELECT band.id, band.namn, band.land, anstalld.namn AS kontaktperson FROM band
							INNER JOIN anstalld ON anstalld.id=band.Kontaktperson
							ORDER BY band.land, band.namn")->result();

$personal 	= $db->query("SELECT anstalld.namn, anstalld.personnummer, count(bandmedlem.id) AS ansvar FROM anstalld
							INNER JOIN band ON band.kontaktperson = anstalld.id
							INNER JOIN bandmedlem ON bandmedlem.band_id = band.id
							GROUP BY anstalld.namn
							ORDER BY ansvar DESC
						")->result();
?>

<nav>
	<ul class="nav nav-pills">
		<li role="presentation"><a id="show-band" href="#">Band</a></li>
		<li role="presentation"><a id="show-staff" href="#">Personal</a></li>
		<li role="presentation"><a id="show-security" href="#">Säkerhetsansvar</a></li>
		<li role="presentation"><a id="show-schedule" href="#">Spelschema</a></li>
		<li role="presentation"><a id="show-genre" href="#">Genre</a></li>
	</ul>
</nav>

<!-- GENRE -->
<div class="row admin-panel" id="genre-panel">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr><td>Genre</td></tr>
			</thead>
			<tbody id="genre-table">
				<?php
					foreach ($genres as $genre) {
						echo '
							<tr><td>' . $genre->namn . '</td></tr>
						';
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-md-12">
	<h3>Lägg till genre:</h3>
	<br><br>
	</div>
	<div class="col-md-9">
		<input type="text" id="genre_name" class="form-control">
	</div>
	<div class="col-md-3">
		<button type="button" id="genre_button" class="btn btn-primary">Lägg till</button>
	</div>
	<br>	
	<div class="col-md-12 alert alert-success admin-notice" id="genre_success">Genre tillagd</div>
	<div class="col-md-12 alert alert-danger admin-notice" id="genre_failure">Genre finns redan</div>
</div>

<!-- LÄGG TILL BAND -->
<div class="row admin-panel" id="band-panel">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Band</td>
					<td>Nationalitet</td>
					<td>Kontaktperson</td>
				</tr>
			</thead>
			<tbody id="band-table">
				<?php
					foreach ($bands as $band) {
						echo '
							<tr>
								<td><a href="admin-band.php?id=' . $band->id . '">' . $band->namn . '</a></td>
								<td>' . $band->land . '</td>
								<td>' . $band->kontaktperson . '</td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-md-12">
		<h3>Lägg till band:</h3>
		<br><br>
		<div class="row">
			<div class="col-md-12">
				<label for="band_namn">Bandnamn:</label>
				<input class="form-control" id="band_namn" placeholder="Namn">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label for="band_genre">Genre:</label>
				<select id="band_genre" class="form-control">
					<?php
						foreach($genres as $genre) {
							echo '<option value="' . $genre->namn . '">' . $genre->namn . '</option>';
						}
					?>
				</select>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label for="band_land">Land:</label>
				<input type="text" id="band_land" class="form-control" placeholder="Land">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label for="band_kontaktperson">Kontaktperson:</label>
				<select id="band_kontaktperson" class="form-control">
					<?php
						foreach($anstallda as $anstalld) {
							echo '<option value="' . $anstalld->id . '">' . $anstalld->namn . '</option>';
						}
					?>
				</select>
			</div>
		</div>
		<br>
		<button type="button" class="btn btn-primary" id="band_button">Lägg till</button>
	</div>
	<div class="col-md-12 alert alert-success admin-notice" id="band_success">Band tillagt</div>
	<div class="col-md-12 alert alert-danger admin-notice" id="band_failure">Band finns redan</div>
</div>

<!-- LÄGG TILL ANSTÄLLD -->
<div class="row admin-panel" id="staff-panel">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Namn</td>
					<td>Personnummer</td>
					<td class="pull-right">Antal bandmedlemmar</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($personal as $person) {
						echo '
							<tr>
								<td>' . $person->namn . '</td>
								<td>' . $person->personnummer . '</td>
								<td class="pull-right">' . $person->ansvar . '</td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
	</div>
	<br><br>
	<div class="col-md-12">
		<h3>Lägg till anställd:</h3>
		<br><br>
	</div>
	<div class="col-md-12">
		<label for="anstalld_namn">För- och efternamn:</label>
		<input type="text" id="anstalld_namn" class="form-control">
		<br>
	</div>
	<div class="col-md-12">
		<label for="anstalld_personnr">Personnummer:</label>
		<input type="text" id="anstalld_personnr" class="form-control" placeholder="YYYYMMDD-XXXX">
		<br>
	</div>
	<div class="col-md-12">
		<button type="button" id="anstalld_button" class="btn btn-primary">Lägg till</button>
	</div>
	<br>
	<div class="col-md-12 alert alert-success admin-notice" id="anstalld_success">Person tillagd</div>
	<div class="col-md-12 alert alert-danger admin-notice" id="anstalld_failure">Person finns redan</div>
</div>

<!-- SÄKERHETSANSVAR -->
<div class="row admin-panel" id="security-panel">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Namn</td>
					<td>Pers.nr</td>
					<td>Scen</td>
					<td>Starttid</td>
					<td>Sluttid</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($ansvar as $ansvarig) {
						echo '
						<tr>
							<td>' . $ansvarig->anstalld . '</td>
							<td>' . $ansvarig->personnummer . '</td>
							<td>' . $ansvarig->scen . '</td>
							<td>' . $ansvarig->starttid . '</td>
							<td>' . $ansvarig->sluttid . '</td>
						</tr>
						';
					}
				?>	
			</tbody>
		</table>
		<br><br><br>
	</div>
	<div class="col-md-12">
		<h3>Lägg till säkerhetsansvar:</h3>
		<br><br>
	</div>
	<div class="col-md-12">
		<label for="sec-anstalld">Anställd:</label>
		<select type="text" id="sec-anstalld" class="form-control">	
			<?php
				foreach($anstallda as $anstalld) {
					echo '<option value="' . $anstalld->id . '">' . $anstalld->namn . '</option>';
				}
			?>
		</select>
		<br>
	</div>
	<div class="col-md-12">
		<label for="sec-scen">Scen:</label>
		<select type="text" id="sec-scen" class="form-control">
			<?php
				foreach($scener as $scen) {
					echo '<option value="' . $scen->id . '">' . $scen->namn . '</option>';
				}
			?>
		</select>
		<br>
	</div>
	<div class="col-md-6">
		<label for="sec-date">Dag:</label>
		<input type="date" class="form-control" value="2015-06-18" min="2015-06-18" max="2015-06-20" id="sec-date">
	</div>
	<div class="col-md-6">
		<label for="sec-time">Starttid:</label>
		<input type="time" class="form-control" value="12:00:00" step="14400" id="sec-time">
	</div>
	<div class="col-md-12">
		<br>
		<em>Säkerhetsansvaret varar i fyra timmar från starttiden</em>
		<br><br>
	</div>
	<div class="col-md-12">
		<button type="button" id="security_button" class="btn btn-primary">Lägg till</button>
		<br><br>
	</div>
	<br><br>
	<div class="col-md-12 alert alert-success admin-notice" id="sec_success">Säkerhetsansvar tillagt</div>
	<div class="col-md-12 alert alert-danger admin-notice" id="sec_failure">Det gick inte att lägga till säkerhetsansvaret</div>
</div>

<!-- SPELSCHEMA -->
<div class="row admin-panel" id="schedule-panel">
	<div class="col-md-12">
		<br><br>
		<h4 class="center"><a href="spelschema.php">&laquo; Visa spelschemat</a></h4>
		<h2>Lägg till speltid</h2><br>
		<label for="schedule-band">Band:</label>
		<select type="text" id="schedule-band" class="form-control">	
			<?php
				foreach($bands as $band) {
					echo '<option value="' . $band->id . '">' . $band->namn . '</option>';
				}
			?>
		</select>
		<br>
	</div>
	<div class="col-md-12">
		<label for="schedule-scen">Scen:</label>
		<select type="text" id="schedule-scen" class="form-control">
			<?php
				foreach($scener as $scen) {
					echo '<option value="' . $scen->id . '">' . $scen->namn . '</option>';
				}
			?>
		</select>
		<br>
	</div>
	<div class="col-md-6">
		<label for="schedule-date">Dag:</label>
		<input type="date" class="form-control" value="2015-06-18" min="2015-06-18" max="2015-06-20" id="schedule-date">
	</div>
	<div class="col-md-6">
		<label for="schedule-time">Starttid:</label>
		<input type="time" class="form-control" value="12:00:00" step="10800" id="schedule-time">
	</div>
	<div class="col-md-12">
		<br>
		<em>Speltiden varar i tre timmar</em>
		<br><br>
	</div>
	<div class="col-md-12">
		<button type="button" id="schedule_button" class="btn btn-primary">Lägg till</button>
		<br><br>
	</div>
	<br><br>
	<div class="col-md-12 alert alert-success admin-notice" id="schedule_success">Speltid tillagd</div>
	<div class="col-md-12 alert alert-danger admin-notice" id="schedule_failure">Speltiden är upptagen</div>
</div>
<br><br>
<?php include 'includes/footer.php'; ?>
<script src="js/admin.js"></script>
