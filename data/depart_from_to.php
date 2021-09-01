<?php 
require_once('database/Database.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}
$db = new Database();
$orig = $_SESSION['origin'];
$desti = $_SESSION['destination'];

$sqlOrig = "SELECT *
			FROM ticket
			WHERE ticket_id = ?;
";
$origin = $db->getRow($sqlOrig, [$orig]);

$sqlDest = "SELECT *
			FROM park_type
			WHERE park_id = ?;
";
$dest = $db->getRow($sqlDest, [$desti]);



$db->Disconnect();