<?php 
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM ticket;
";

$origins = $db->getRows($sql);

$db->Disconnect();

