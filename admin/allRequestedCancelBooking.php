<?php
require_once('session_login.php');
require_once('../database/Connection.php');
include_once('../database/easyConnection.php');
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Specials</title>

		<!-- Bootstrap CSS -->
   	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">

     <!-- Custom CSS -->
    <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

	</head>
<body>

<?php
include_once('includes/navbar.php');
?>

<br/>

<div class="container-fluid">
	<div class="col-md-1">
    </div>
	<div class="col-md-10">
        <div class="col-md-10">
            <h3>First check booking info from "Reserved" page.</h3>
        </div>
        <br>
        <div class="col-md-1">
        <h5 <?php
        if(isset($_SESSION['successMessage'])){
            echo $_SESSION['successMessage'];
            unset($_SESSION['successMessage']);
        }?>
        </h5>
        </div>
		<div id="book-table"></div>
		<table id="myTable-book" class="table table-bordered table-hover" cellspacing="0" width="100%">
	    <thead>
	    <tr>
            <th>SL</th>
            <th>Booked Name</th>
	        <th>Booked ID</th>
			<th>Booked Date</th>
	        <th><center>Action</center></th>
	    </tr>
	    </thead>
        <tbody>
        <?php
        // preparing select query for category table
        $query = "SELECT * FROM `cancel_booked` ORDER BY `booked_id` ASC";
        $cancel_booked = mysqli_query($con,$query);
        ?>
        <?php foreach($cancel_booked as $row): ?>
    		<tr>
    			<td><?php echo $row['booked_id']; ?></td>
                <td><?php echo $row['booked_name']; ?></td>
                <td><?php echo $row['booked_tracker']; ?></td>
    			<td><?php echo $row['booked_date']; ?></td>
    			<td>
    				<center>
						<a href="cancelRequestedBooking.php?booked_id=<?php echo $row['booked_id']; ?>&operation=delete" class="btn btn-danger delete_btn"><i class="glyphicon glyphicon-remove"></i></a>
    				</center>
    			</td>
    		</tr>
        <?php endforeach; ?>
        </tbody>
    </table>
	</div>
	    <div class="col-md-1"></div>
</div>
