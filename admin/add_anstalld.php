<?php
  require_once '../lib/classes/Database.php';

  if (isset($_POST['namn']) && !empty($_POST['namn'])) {
    $db = Database::getInstance();

    $namn = $_POST['namn'];
    $personnr = $_POST['personnr'];

    $db->query("INSERT INTO anstalld (namn, personnummer) VALUES (?, ?)", array($namn, $personnr));
    if (!$db->error()) {
      echo 1;
    } else {
      echo 0;
    }

  }
