<?php
include 'includes/header.php';
require_once 'lib/init.php';

$db = Database::getInstance();
$genres = $db->query("SELECT * FROM genre")->result();
$anstallda = $db->query("SELECT * FROM anstalld")->result();
?>
<!-- GENRE -->
<div class="row">
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
</div>
<br>
<div class="row">
	<div class="col-md-12 alert alert-success admin-notice" id="genre_success">Genre tillagd</div>
	<div class="col-md-12 alert alert-danger admin-notice" id="genre_failure">Genre finns redan</div>
</div>
<br><br><br>

<!-- LÄGG TILL BAND -->
<div class="row">
	<div class="col-md-12">
		<h3>Lägg till band:</h3>
		<br><br>
		<div class="row">
			<div class="col-md-9">
				<label for="band_namn">Bandnamn:</label>
				<input class="form-control" id="band_namn" placeholder="Namn">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-9">
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
			<div class="col-md-9">
				<label for="band_land">Land:</label>
				<input type="text" id="band_land" class="form-control" placeholder="Land">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-9">
				<label for="band_land">Kontaktperson:</label>
				<select id="band_genre" class="form-control">
					<?php
						foreach($anstallda as $anstalld) {
							echo '<option value="' . $genre->id . '">' . $genre->namn . '</option>';
						}
					?>	
				</select>
			</div>
		</div>
		<br>
		<button type="button" class="btn btn-primary" id="band_button">Lägg till</button>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12 alert alert-success admin-notice" id="band_success">Band tillagt</div>
	<div class="col-md-12 alert alert-danger admin-notice" id="band_failure">Band finns redan</div>
</div>
<br><br><br>

<!-- LÄGG TILL PERSON -->
<div class="row">
	<div class="col-md-12">
	<h3>Lägg till anställd:</h3>
	<br><br>
	</div>
</div>
<div class="row">
	<div class="col-md-9">
		<label for="anstalld_namn">För- och efternamn:</label>
		<input type="text" id="anstalld_namn" class="form-control">
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-9">
		<label for="anstalld_personnr">Personnummer:</label>
		<input type="text" id="anstalld_personnr" class="form-control" placeholder="YYYYMMDD-XXXX">
	</div>
</div>
<br><br>
<div class="row">
	<div class="col-md-9">
		<button type="button" id="anstalld_button" class="btn btn-primary">Lägg till</button>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12 alert alert-success admin-notice" id="genre_success">Genre tillagd</div>
	<div class="col-md-12 alert alert-danger admin-notice" id="genre_failure">Genre finns redan</div>
</div>
<br><br><br>

<?php include 'includes/footer.php'; ?>
<script src="js/admin.js"></script>