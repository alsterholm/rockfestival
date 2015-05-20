<?php
	require_once '../lib/classes/Database.php';

	if (isset($_POST['namn']) && !empty($_POST['namn'])) {
		$db = Database::getInstance();

		$namn 			= $_POST['namn'];
		$genre 			= $_POST['genre'];
		$land 			= $_POST['land'];
		$kontaktperson 	= $_POST['kontaktperson'];

		$db->query("INSERT INTO band (namn, genre, land, kontaktperson) VALUES (?, ?, ?, ?)", array($namn, $genre, $land, $kontaktperson));
		if (!$db->error()) {
			echo 1;
		} else {
			echo 0;
		}
	}
