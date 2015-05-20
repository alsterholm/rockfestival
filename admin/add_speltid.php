<?php

require_once '../lib/classes/Database.php';

$date 		= $_POST['date'];
$time 		= $_POST['time'];

$starttid 	= $date . ' ' . $time;
$sluttid 	= date('Y-m-d H:i:s', strtotime("$starttid + 3 hours"));

$band 		= $_POST['band'];
$scen 		= $_POST['scen'];
$starttid 	= $starttid;
$sluttid 	= $sluttid;

$db = Database::getInstance();
$db->query("INSERT INTO spelschema (band_id, scen_id, starttid, sluttid) VALUES (?, ?, ?, ?)", array($band, $scen, $starttid, $sluttid));
if (!$db->error()) {
	echo 1;
} else {
	echo 0;
}