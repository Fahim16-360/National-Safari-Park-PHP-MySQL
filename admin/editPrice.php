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
	      <li><a href="allPrices.php"> <span class="glyphicon glyphicon-backward"></span> Return </a></li>
	    </ul>
	</div>
</nav>

<?php
if(isset($_GET['origin_id'])){
        $u_id = $_GET['origin_id'];
        $query = "SELECT * from `origin` WHERE `origin_id`= ".$_GET['origin_id'];
        //$result = mysqli_query($con,$query);
        if($result=mysqli_query($con,$query)){

            $tickets = mysqli_fetch_array($result);
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
			<form action="editPrice.php" method="POST" class="form-horizontal" role="form" id="form-login">
			  <div class="form-group">
                <input type="hidden" name="origin_id" value="<?php echo $tickets['origin_id']; ?>">
			    <label class="control-label col-sm-2" for="un">Ticket Name:</label>
			    <div class="col-sm-10">
			      <input value="<?php echo $tickets['origin_desc']; ?>" type="text" name="origin_desc" class="form-control" id="un" placeholder="Enter Ticket Name" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Ticket Price</label>
			    <div class="col-sm-10">
			      <input value="<?php echo $tickets['ticket_price']; ?>" type="number" name="ticket_price" class="form-control" id="un" placeholder="Enter Ticket Price" autofocus="" required="required">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Ticket Type</label>
			    <div class="col-sm-10"> 
				<select name="season" id="season" class="form-control" required>
					<option disabled selected>-- Select Season --</option>
                        <?php
                            $query = "SELECT * FROM `origin` ORDER BY `season` ASC";
                            $seasons = mysqli_query($con,$query);
                            while ($season = mysqli_fetch_array($seasons)){
                        ?>
                    <option <?php echo "<option value='". $season['season'] ."'>" .$season['season'] ."</option>";  // displaying data in option menu ?>
                        <?php } ?>
                </select>
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
        $update_query = "UPDATE `origin` SET `origin_desc`='$origin_desc',`ticket_price`='$ticket_price',`season`='$season' WHERE `origin_id`='$origin_id'";
        if(mysqli_query($con,$update_query)){
            $_SESSION['successMessage'] = "Ticket information updated into database";
            header("location: editPrice.php");
        }else{
            echo "You have ans error ".mysqli_error($con);
        }
    }
?>

