<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">National Safari Park Dashboard</a>
		<ul class="nav navbar-nav">
			<li class="<?php echo (basename($_SERVER['PHP_SELF'])=="reservation.php")?"active":""?>"><a href="reservation.php">Reserved
			<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
			</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF'])=="transaction.php")?"active":""?>"><a href="transaction.php">Transaction
			<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
			</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF'])=="allUsers.php")?"active":""?>"><a href="allUsers.php">Admins and Staffs
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF'])=="allRequestedCancelBooking.php")?"active":""?>"><a href="allRequestedCancelBooking.php">Booked Cancel Requested
			<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
			</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF'])=="allBookedMarketing.php")?"active":""?>"><a href="allBookedMarketing.php">Booked Marketing
			<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
			</a></li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF'])=="allSpecialProgram.php")?"active":""?>"><a href="allSpecialProgram.php">Post Special Program
			<span class="glyphicon glyphicon-text-size" aria-hidden="true"></span>
			</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF'])=="allPrices.php")?"active":""?>"><a href="allPrices.php">Ticket Prices
			<span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span>
			</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF'])=="allOpeningTimes.php")?"active":""?>"><a href="allOpeningTimes.php">Opening Times
			<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
			</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF'])=="allGalleryImages.php")?"active":""?>"><a href="allGalleryImages.php">Gallery Images
			<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
			</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
	      <li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	    </ul>
	</div>
</nav>