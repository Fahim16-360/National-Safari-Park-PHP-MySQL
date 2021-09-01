<?php 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(isset($_SESSION['departure_date'])){
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Medallion</title>

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

	</head>
<body style="background-color: lightblue;">

<?php
include_once('includes/bookingSteps.php');
?>

<div class="container-fluid">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
			 <h2>
			 	<center>Speacial Programs</center>
			 </h2>
				<div class="container-fluid">
					<div><h4>We provide speacial programs.</h4></div>
					<form class="form-horizontal" role="form" id="form-acc">
					  <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
							    <tr>
							        <th> <span class="glyphicon glyphicon-record" aria-hidden="true"></span> 
							        Special Program
							        </th>
							        <th>
							        	<center>
							        		Slots
							        	</center>
						        	</th>
							        <th>
							        	<center>
							        		Prince in Taka
							        	</center>
						        	</th>
							    </tr>
							</thead>
						    <tbody>
						   		<?php require_once('data/get_all_accomodations.php'); ?>
						   		<tr>
						   			<td>
						   				<input value="<?= $getSit['program_id']; ?>" type="radio" name="acc">
						   				<?= $getSit['program_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getSit['program_slot'] - $totalSit['sit']; ?>
						   			</td>
						   			<td align="center"><?= $getSit['program_price']; ?> Taka</td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getEcoA['program_id']; ?>" type="radio" name="acc">
						   				<?= $getEcoA['program_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getEcoA['program_slot'] - $totalEcoA['ecoA']; ?>
						   			</td>
						   			<td align="center"><?= $getEcoA['program_price']; ?> Taka</td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getEcoB['program_id']; ?>" type="radio" name="acc">
						   				<?= $getEcoB['program_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getEcoB['program_slot'] - $totalEcoB['ecoB']; ?>
						   			</td>
						   			<td align="center"><?= $getEcoB['program_price']; ?> Taka</td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getTour['program_id']; ?>" type="radio" name="acc">
						   				<?= $getTour['program_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getTour['program_slot'] - $totalTour['ecoT']; ?>
						   			</td>
						   			<td align="center"><?= $getTour['program_price']; ?> Taka</td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getCab['program_id']; ?>" type="radio" name="acc">
						   				<?= $getCab['program_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getCab['program_slot'] - $totalCab['ecoC']; ?>
						   			</td>
						   			<td align="center"><?= $getCab['program_price']; ?> Taka</td>
						   		</tr>
						   		<tr>
						   			<td>
						   				<input value="<?= $getDel['program_id']; ?>" type="radio" name="acc">
						   				<?= $getDel['program_name']; ?>
						   			</td>
						   			<td align="center">
						   				<?= $getDel['program_slot'] - $totalDel['ecoD']; ?>
						   			</td>
						   			<td align="center"><?= $getDel['program_price']; ?> Taka</td>
						   		</tr>
						    </tbody>
					    </table>
				      <div class="form-group">
					    <label for="">Total # of Passenger:</label>
					    <input type="number" min="1" class="form-control" name="totalPass" plactreholder="Total # of Person" autocomplete="off">
					  </div>
					  <button type="submit" class="btn btn-success">NEXT
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	$(document).on('submit', '#form-acc', function(event) {
		event.preventDefault();
		/* Act on the event */
		var acc = $('input[name="acc"]:checked').val();
		var totalPass = $('input[name="totalPass"]').val();

		if(acc == null){
			alert('Please Select Pakcage!');
		}else{
			// console.log(acc);
			if(totalPass.length == 0){
				alert('Please Enter Number of Passenger!');
			}else{
				$.ajax({
						url: 'data/session_accomodation.php',
						type: 'post',
						dataType: 'json',
						data: {
							acc : acc,
							tp : totalPass
						},
						success: function (data) {
							console.log(data.slot);
							// 	window.location = "passenger.php";
							if(data.slot >= 0){
								window.location = "passenger.php";
							}else{
								alert('Not Enough Slot!');
							}
						},
						error: function(){
							alert('Error: L175+');
						}
					});
			}//end totalPass
		}//end acc == null
	});

</script>

</body>
</html>


<?php
}else{
	echo '<strong>';
	echo 'Page Not Exist';
	echo '</strong>';
}//end if else isset

 ?>