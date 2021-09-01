<?php 
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM park_type;
";

$destinations = $db->getRows($sql);

$db->Disconnect();

