<?php

require_once '../lib/classes/Database.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$db = Database::getInstance();
	$db->query("DELETE FROM band WHERE id = ?", [$id]);
	header('Location: /rockfestival/admin.php');
	exit();
}
