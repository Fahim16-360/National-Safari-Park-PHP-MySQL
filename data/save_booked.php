<?php
require_once('../database/Database.php');
$db = new Database(); 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}


if(isset($_POST['bookBy'])){
	// echo 'yes';
	$bookBy = $_POST['bookBy'];
	$cont = $_POST['cont'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$postal = $_POST['postal'];
	$fN = $_POST['fN'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];

	$origin = $_SESSION['origin'];
	$dest = $_SESSION['destination'];
	$deptDate = $_SESSION['departure_date'];
	$acc = $_SESSION['accomodation'];

	$tracker = $_SESSION['tracker'];

	$sql = "INSERT INTO booked (book_by, book_contact, book_email, book_address, book_postal, book_name, book_age, book_gender,
			 book_departure, park_id, program_id, ticket_id, book_tracker)
			 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);
	";

$result = $db->insertRow($sql, [$bookBy, $cont, $email, $address, $postal, $fN, $age, $gender, $deptDate, $dest, $acc, $origin, $tracker]);

$return['valid'] = true;
$return['url'] = "payment.php";

echo json_encode($return);

}//if isset

					// bookBy : bookBy,
					// 	email : email,
					// 	address : address,
					// 	fN : fN,
					// 	age : age 

$db->Disconnect();
 ?>

