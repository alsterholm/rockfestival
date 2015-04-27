<?php
	require_once '../lib/classes/Database.php';

	if (isset($_POST['namn']) && !empty($_POST['namn'])) {
		$db = Database::getInstance();

		$namn = $_POST['namn'];
		$genre = $_POST['genre'];
		$land = $_POST['land'];

		$db->query("INSERT INTO band (namn, genre, land) VALUES (?, ?, ?)", array($namn, $genre, $land));
		if (!$db->error()) {
			echo 1;
		} else {
			echo 0;
		}
	}