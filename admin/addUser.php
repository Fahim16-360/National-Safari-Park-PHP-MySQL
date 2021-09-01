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
	      <li><a href="allUsers.php"> <span class="glyphicon glyphicon-backward"></span> Return </a></li>
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
			<form action="addUser.php" method="POST" class="form-horizontal" role="form" id="form-login">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Username:</label>
			    <div class="col-sm-10">
			      <input type="text" name="user_account" class="form-control" id="un" placeholder="Enter Username" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Email</label>
			    <div class="col-sm-10">
			      <input type="email" name="user_email" class="form-control" id="un" placeholder="Enter Email" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Phone</label>
			    <div class="col-sm-10">
			      <input type="number" name="user_phone" class="form-control" id="un" placeholder="Enter Phone" autofocus="" required="required">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Password:</label>
			    <div class="col-sm-10"> 
			      <input type="password" name="user_password" class="form-control" id="pwd" placeholder="Enter Password" required="required">
			    </div>
			  </div>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
                <label class="col-md-4 control-label">User type</label>
                        <div class="col-md-4">
                            <div class="radio">
                             <?php //echo $admin_account['admin_type'] ?>
                                <input type="radio" name="user_type" value="admin" required="required" <label class="control-label">Admin</label> </input>
                            </div>
                            <div class="radio">
                                <input type="radio" name="user_type" value="staff" required="required" <label class="control-label">Staff</label> </input>
                            </div>
                        </div>
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

    $insert_query = "INSERT INTO `user` (`user_account`,`user_email`,`user_phone`,`user_password`,`user_type`) VALUES ('$user_account','$user_email','$user_phone','".md5($user_password)."','$user_type')";
//    echo $insert_query;
    if(mysqli_query($con,$insert_query)){
        $_SESSION['successMessage'] = "New user created and stored into database";
        header("location: addUser.php");
    }else{
        echo "Error".mysqli_error($con);
    }
?>

<?php } ?>

