<?php
  require_once '../lib/classes/Database.php';

  if (isset($_POST['namn']) && !empty($_POST['namn'])) {
    $db = Database::getInstance();

    $namn     = $_POST['namn'];
    $fdatum    = $_POST['fdatum'];
    $band_id  = $_POST['band'];

    $db->query("INSERT INTO bandmedlem (namn, fdatum, band_id) VALUES (?, ?, ?)", array($namn, $fdatum, $band_id));
    if (!$db->error()) {
      echo 1;
    } else {
      echo 0;
    }

  }
