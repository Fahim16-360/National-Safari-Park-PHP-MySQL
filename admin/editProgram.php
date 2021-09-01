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

<?php
include_once('includes/navbar.php');
?>

<?php

    if(isset($_POST['update'])){

        extract($_REQUEST);
        $uploaded_image = $_FILES['program_image']['tmp_name'];
        $update_query ='';
        if(file_exists($uploaded_image)){
            $target_directory = "program_image/";
            $ext = pathinfo($_FILES['program_image']['name'],PATHINFO_EXTENSION);
            $image_name = $program_name.".".$ext;
            if(move_uploaded_file($uploaded_image,"program_image/".$image_name)){
                $update_query = "UPDATE `special_program` SET `program_name`='$program_name', `program_image`='$image_name', `program_price`='$program_price', `program_slot`='$program_slot', `program_details`='$program_details' WHERE `program_id`=$program_id";
            }
        }else{
            $update_query = "UPDATE `special_program` SET `program_name`='$program_name', `program_price`='$program_price', `program_slot`='$program_slot', `program_details`='$program_details' WHERE `program_id`=$program_id";
        }
        if(mysqli_query($con,$update_query)){
            $_SESSION['successMessage'] = "program updated and stored into database";
            header("location: specialProgram.php");
        }else{
            echo "You have ans error ".mysqli_error($con);
        }
    }
?>

<?php
if (isset($_GET['program_id'])){
$program_id = $_GET['program_id'];
?>

<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">program Info Here</h3>
		</div>

		<?php
   		$query = "SELECT * FROM `program` WHERE `program_id`=$program_id";
    	$result = mysqli_query($con,$query);
    	$special_program = mysqli_fetch_array($result);
    	?>

		<div class="panel-body">
			<form action="editprogram.php" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form" id="form-login">
            <input type="hidden" name="program_id" value="<?php echo $program_id; ?>">
			<div class="form-group">
			    <label class="control-label col-sm-2" for="un">program Title</label>
			    <div class="col-sm-10">
			      <input value="<?php echo $special_program['program_name']; ?>" type="text" name="program_name" class="form-control" id="un" placeholder="Enter program Title" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">program Image</label>
			    <div class="col-sm-10">
					<img src="program_image/<?php echo $special_program['program_image']; ?>" alt="Avatar" class="" width="80 px" height="50">
			      	<input type="file" name="program_image" class="form-control" id="un" placeholder="Enter program Image" autofocus="" required="none">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">program Price</label>
			    <div class="col-sm-10">
			      <input value="<?php echo $special_program['program_price']; ?>" type="number" name="program_price" class="form-control" id="pwd" placeholder="Enter Price" required="required">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">program Slot</label>
			    <div class="col-sm-10"> 
				<input value="<?php echo $special_program['program_slot']; ?>" type="number" name="program_slot" class="form-control" id="pwd" placeholder="Enter Slot" required="required">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Details</label>
			    <div class="col-sm-10"> 
					<textarea type="text" name="program_details" class="form-control" id="pwd" placeholder="Enter Details" required="none" ><?php echo $special_program['program_details']; ?></textarea>
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

<?php } ?>