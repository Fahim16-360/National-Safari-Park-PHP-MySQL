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
	      <li><a href="allUsers.php"> <span class="glyphicon glyphicon-backward"></span> Return </a></li>
	    </ul>
	</div>
</nav>

<?php
if(isset($_GET['user_id'])){
        $u_id = $_GET['user_id'];
        $query = "SELECT * from `user` WHERE `user_id`= ".$_GET['user_id'];
        //$result = mysqli_query($con,$query);
        if($result=mysqli_query($con,$query)){

            $users = mysqli_fetch_array($result);
        }
    }
?>

<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">User Info Here</h3>
		</div>
		<div class="panel-body">
			<form action="editUser.php" method="POST" class="form-horizontal" role="form" id="form-login">
			  <div class="form-group">
                <input type="hidden" name="user_id" value="<?php echo $users['users_id']; ?>">
			    <label class="control-label col-sm-2" for="un">Username:</label>
			    <div class="col-sm-10">
			      <input value="<?php echo $users['user_account']; ?>" type="text" name="user_account" class="form-control" id="un" placeholder="Enter Username" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Email</label>
			    <div class="col-sm-10">
			      <input value="<?php echo $users['user_email']; ?>" type="email" name="user_email" class="form-control" id="un" placeholder="Enter Username" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Phone</label>
			    <div class="col-sm-10">
			      <input value="<?php echo $users['user_phone']; ?>" type="number" name="user_phone" class="form-control" id="un" placeholder="Enter Username" autofocus="" required="required">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Password:</label>
			    <div class="col-sm-10"> 
			      <input value="<?php echo $users['user_password']; ?>" type="password" name="user_password" class="form-control" id="pwd" placeholder="Enter password" required="required">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">User Type</label>
			    <div class="col-sm-10"> 
			      <input value="<?php echo $users['user_type']; ?>" type="password" name="user_type" class="form-control" id="pwd" placeholder="Enter password" required="required">
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
			      <button name="update" type="submit" class="btn btn-default">Update
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
    if(isset($_POST['update'])){
        extract($_REQUEST);
        $update_query = "UPDATE `user` SET `user_account`='$user_account',`user_email`='$user_email',`user_password`='$user_password',`user_phone`='$user_phone',`user_type`='$user_type' WHERE `user_id`='$user_id'";
        if(mysqli_query($con,$update_query)){
            $_SESSION['successMessage'] = "Admin information updated into database";
            header("location: allUsers.php");
        }else{
            echo "You have ans error ".mysqli_error($con);
        }
    }
?>

