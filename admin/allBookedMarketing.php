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
		<title>Email</title>

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
        <!-- <div class="page-action-links text-right">
            <a href="addUser.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ADD NEW USER</a>
        </div> -->
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
            <!-- <th>SL</th> -->
            <th>Booked ID</th>
	        <th>Booked Name</th>
			<th>Email</th>
			<th>Contact</th>
	        <th>Address</th>
			<th>Postal Code</th>
	        <th>Booking Date</th>
	        <th><center>Action</center></th>
	    </tr>
	    </thead>
        <tbody>
        <?php
        // preparing select query for category table
        $query = "SELECT * FROM `booked` ORDER BY `book_id` ASC";
        $bookings = mysqli_query($con,$query);
        ?>
        <?php foreach($bookings as $row): ?>
    		<tr>
    			<td><?php echo $row['book_id']; ?></td>
                <td><?php echo $row['book_by']; ?></td>
				<td><?php echo $row['book_email']; ?></td>
    			<td><?php echo $row['book_contact']; ?></td>
    			<td><?php echo $row['book_address']; ?></td>
				<td><?php echo $row['book_postal']; ?></td>
				<td><?php echo $row['book_departure']; ?></td>
    			<td>
    				<center>
                        <a href="#?book_id=<?php echo $row['book_id']; ?>&operation=send" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i></a>
    				</center>
    			</td>
    		</tr>
        <?php endforeach; ?>
        </tbody>
    </table>
	</div>
	    <div class="col-md-1"></div>
</div>
