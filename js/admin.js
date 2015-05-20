$('#genre_button').on('click', function() {
	if ($('#genre_name').val().length > 0) {
		$.post('admin/add_genre.php', {name: $('#genre_name').val()})
			.done(function(data) {
				if (data == 1) {
					$('#genre_success').slideToggle(500);
					$('#genre_success').delay(3000).slideToggle(500);
					$('#genre_name').val('');
				} else {
					$('#genre_failure').slideToggle(500);
					$('#genre_failure').delay(3000).slideToggle(500);
				}
			});
	}
});

$('#band_button').on('click', function() {
	var namn = $('#band_namn').val();
	var genre = $('#band_genre option:selected').val();
	var land = $('#band_land').val();
	var kontaktperson = $('#band_kontaktperson option:selected').val();

	$.post('admin/add_band.php', { namn: namn, genre: genre, land: land, kontaktperson: kontaktperson })
		.done(function(data) {
			if (data == 1) {
				$('#band_success').slideToggle(500);
				$('#band_success').delay(3000).slideToggle(500);
				$('#band_name').val('');
				$('#band_land').val('');
			} else {
				alert(data);
				$('#band_failure').slideToggle(500);
				$('#band_failure').delay(3000).slideToggle(500);
			}
		})
});

$('#security_button').on('click', function() {
	var anstalld 	= $('#sec-anstalld option:selected').val();
	var scen 		= $('#sec-scen option:selected').val();
	var date 		= $('#sec-date').val();
	var time 		= $('#sec-time').val();

	$.post('admin/add_security.php', {anstalld: anstalld, scen: scen, date: date, time: time})
		.done(function(data) {
			if (data == 1) {
				$('#sec_success').slideToggle(500);
				$('#sec_success').delay(3000).slideToggle(500);
			} else {
				$('#sec_failure').slideToggle(500);
				$('#sec_failure').delay(3000).slideToggle(500);
			}
		});
});

$('#anstalld_button').on('click', function() {
	var namn = $('#anstalld_namn').val();
	var personnr = $('#anstalld_personnr').val();

	$.post('admin/add_anstalld.php', {namn: namn, personnr: personnr})
		.done(function(data) {
			if (data == 1) {
				$('#anstalld_success').slideToggle(500);
				$('#anstalld_success').delay(3000).slideToggle(500);
				$('#anstalld_name').val('');
				$('#anstalld_personnr').val('');
			}	else {
				$('#anstalld_failure').slideToggle(500);
				$('#anstalld_failure').delay(3000).slideToggle(500);
			}
		})
});

$('#schedule_button').on('click', function() {
	var band 	= $('#schedule-band option:selected').val();
	var scen 	= $('#schedule-scen option:selected').val();
	var date 	= $('#schedule-date').val();
	var time 	= $('#schedule-time').val();

	$.post('admin/add_speltid.php', {band: band, scen: scen, date: date, time: time})
		.done(function(data) {
			if (data == 1) {
				$('#schedule_success').slideToggle(500);
				$('#schedule_success').delay(3000).slideToggle(500);
			} else {
				$('#schedule_failure').slideToggle(500);
				$('#schedule_failure').delay(3000).slideToggle(500);
			}
		});
});


$('#show-genre').on('click', function() {
	$('.admin-panel').slideUp(500);
	$('#genre-panel').slideDown(500);
});

$('#show-band').on('click', function() {
	$('.admin-panel').slideUp(500);
	$('#band-panel').slideDown(500);
});

$('#show-staff').on('click', function() {
	$('.admin-panel').slideUp(500);
	$('#staff-panel').slideDown(500);
});

$('#show-security').on('click', function() {
	$('.admin-panel').slideUp(500);
	$('#security-panel').slideDown(500);
});

$('#show-schedule').on('click', function() {
	$('.admin-panel').slideUp(500);
	$('#schedule-panel').slideDown(500);
});