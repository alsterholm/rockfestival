<?php
	require_once '../lib/classes/Database.php';

	if (isset($_POST['name']) && !empty($_POST['name'])) {
		$db = Database::getInstance();
		$name = $_POST['name'];

		$db->query("INSERT INTO genre VALUES (?)", array($name));
		if (!$db->error()) {
			echo 1;
		} else {
			echo 0;
		}

	}
