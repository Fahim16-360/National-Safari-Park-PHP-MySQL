<?php
require_once('session_login.php');
include_once('../database/easyConnection.php');
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>National Safari Park Admin</title>

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">

	</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">National Safari Park Login</a>
		<ul class="nav navbar-nav">
			<li>
				<a href="#"></a>
			</li>
			<li>
				<a href="#"></a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	      <li><a href="allSpecialProgram.php"> <span class="glyphicon glyphicon-backward"></span> Return </a></li>
	    </ul>
	</div>
</nav>


<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Post Special Program</h3>
		</div>
		<div class="panel-body">
			<form action="addprogram.php" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form" id="form-login">
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">program Title</label>
			    <div class="col-sm-10">
			      <input type="text" name="program_name" class="form-control" id="un" placeholder="Enter program Title" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">program Image</label>
			    <div class="col-sm-10">
			      <input type="file" name="program_image" class="form-control" id="un" placeholder="Enter program Image" autofocus="" required="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">program Price</label>
			    <div class="col-sm-10"> 
			      <input type="number" name="program_price" class="form-control" id="pwd" placeholder="Enter Price" required="required">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">program Slot</label>
			    <div class="col-sm-10"> 
			      <input type="number" name="program_slot" class="form-control" id="pwd" placeholder="Enter Slot" required="required">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Details</label>
			    <div class="col-sm-10"> 
				<textarea type="text" name="program_details" class="form-control" id="pwd" placeholder="Enter Details" required=""></textarea>
			    </div>
			  </div>
			  
              <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <h3>
                        <?php
                        if(isset($_SESSION['successMessage'])){
                        echo $_SESSION['successMessage'];
                        unset($_SESSION['successMessage']);
                        }?>
                    </h3>
			        </div>
                </div>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button name="save" type="submit" class="btn btn-default">Submit
			      <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
			      </button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</div>
</body>
</html>

<?php
if(isset($_POST['save'])){
    extract($_REQUEST);

	$target_directory = "program_image/";
	$uploaded_image = $_FILES['program_image']['tmp_name'];
	$ext = pathinfo($_FILES['program_image']['name'],PATHINFO_EXTENSION);
    $image_name = $program_name.".".$ext;

	if(move_uploaded_file($uploaded_image,"program_image/".$image_name)){
		$insert_query = "INSERT INTO `special_program` (`program_name`,`program_image`,`program_price`,`program_slot`,`program_details`) VALUES ('$program_name','$image_name',$program_price,'$program_slot','$program_details')";
	//  echo $insert_query;
		if(mysqli_query($con,$insert_query)){
			$_SESSION['successMessage'] = "New program created and stored into database";
		header("location: addprogram.php");
		}else{
			echo "You have ans error ".mysqli_error($con);
		}
	}
?>

<?php } ?>