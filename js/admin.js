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

	$.post('admin/add_band.php', { namn: namn, genre: genre, land: land })
		.done(function(data) {
			if (data == 1) {
				$('#band_success').slideToggle(500);
				$('#band_success').delay(3000).slideToggle(500);
				$('#band_name').val('');
				$('#band_land').val('');
			} else {
				$('#band_failure').slideToggle(500);
				$('#band_failure').delay(3000).slideToggle(500);
			}
		})
});