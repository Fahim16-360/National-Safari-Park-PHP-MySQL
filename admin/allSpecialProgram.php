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
        <div class="page-action-links text-right">
            <a href="addprogram.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ADD NEW program</a>
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
            <!-- <th>SL</th> -->
            <th>ID</th>
	        <th>program Name</th>
			<th>Image</th>
			<th>Price</th>
			<th>Slot</th>
	        <th>Details</th>
	        <th><center>Action</center></th>
	    </tr>
	    </thead>
        <tbody>
        <?php
        // preparing select query for category table
        $query = "SELECT * FROM `special_program` ORDER BY `program_id` ASC";
        $special_program = mysqli_query($con,$query);
        ?>
        <?php foreach($special_program as $row): ?>
    		<tr>
    			<td><?php echo $row['program_id']; ?></td>
                <td><?php echo $row['program_name']; ?></td>
				<td><img alt="Avatar" class="" width="80 px" height="50" src="program_image/<?php echo $row['program_image']; ?>">
                    <?php echo $row['program_name']; ?>
				</td>
    			<td><?php echo $row['program_price']; ?></td>
				<td><?php echo $row['program_slot']; ?></td>
				<td><?php echo $row['program_details']; ?></td>
    			<td>
    				<center>
						<a href="deleteprogram.php?program_id=<?php echo $row['program_id']; ?>&operation=delete" class="btn btn-danger delete_btn"><i class="glyphicon glyphicon-trash"></i></a>
    					&nbsp;
                        <a href="editprogram.php?program_id=<?php echo $row['program_id']; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
    				</center>
    			</td>
    		</tr>
        <?php endforeach; ?>
        </tbody>
    </table>
	</div>
	    <div class="col-md-1"></div>
</div>
