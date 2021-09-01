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
		<a class="navbar-brand" href="#">National Safari Park Add User</a>
		<ul class="nav navbar-nav">
			<li>
				<a href="#"></a>
			</li>
			<li>
				<a href="#"></a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	      <li><a href="allOpeningTimes.php"> <span class="glyphicon glyphicon-backward"></span> Return </a></li>
	    </ul>
	</div>
</nav>

<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Please Info Here</h3>
		</div>
		<div class="panel-body">
			<form action="addTime.php" method="POST" class="form-horizontal" role="form" id="form-login">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Opening Name:</label>
			    <div class="col-sm-10">
			      <input type="text" name="opening_name" class="form-control" id="un" placeholder="Enter Opening Name" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Opening Time:</label>
			    <div class="col-sm-10">
			      <input type="text" name="opening_time" class="form-control" id="un" placeholder="Enter Opening Time" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Closing Time:</label>
			    <div class="col-sm-10">
			      <input type="text" name="closing_time" class="form-control" id="un" placeholder="Enter Closing Time" autofocus="" required="required">
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

    $insert_query = "INSERT INTO `opening_time` (`opening_name`,`opening_time`,`closing_time`) VALUES ('$opening_name','$opening_time','$closing_time')";
    if(mysqli_query($con,$insert_query)){
        $_SESSION['successMessage'] = "New Opning name, time, closing time created and stored into database";
        header("location: addTime.php");
    }else{
        echo "Error".mysqli_error($con);
    }
?>

<?php } ?>

