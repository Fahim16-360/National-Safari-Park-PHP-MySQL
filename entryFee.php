<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Entry Fee</title>

<!-- [ FONT-AWESOME ICON ] 
        
=========================================================================================================================-->
	
<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

	
<!-- [ PLUGIN STYLESHEET ]
        
=========================================================================================================================-->
	
<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">     
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	
<!-- [ Boot STYLESHEET ]
        
=========================================================================================================================-->
	
<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
       
<!-- [ DEFAULT STYLESHEET ] 
        
=========================================================================================================================-->
	
<link rel="stylesheet" type="text/css" href="css/style.css">  
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/color/rose.css">
        

</head>
<body>

<!-- [ LOADERs ]

================================================================================================================================-->
	
<div class="preloader">
<div class="loader theme_background_color"> 
<span></span>
</div>
</div>
<!-- [ /PRELOADER ]

=============================================================================================================================-->

<!-- [WRAPPER ]

=============================================================================================================================-->

<div class="wrapper">

<?php
include_once('includes/navbar.php');
include_once('database/easyConnection.php');
?>
 
<!-- [/MAIN-HEADING]
 
============================================================================================================================--> 


<section class="main-heading" id="home">

<div class="overlay">     
<div class="container">        
<div class="row">           
<div class="main-heading-content col-md-12 col-sm-12 text-center">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
        
<h1 class="main-heading-title"><span class="main-element themecolor" data-elements=" National Safari Park, National Safari Park, National Safari Park"></span></h1>
<h1 class="main-heading-title"><span class="main-element themecolor" data-elements="  Entry Ticket Price, Entry Ticket Price, Entry Ticket Price"></span></h1>
       
<!-- <p class="main-heading-text">You are most welcome to visit a national land like National Safari Park. <br/> It will be a great pleasure for us while you and your family spend your valuable time in this park for <br/> study tour, picnic, family get-together or memorable event. <br/> Hoping to fulfill the aim we have established a special National Safari Park near the capital city Dhaka.<br/></p> -->


<br>
<br>
<br>
<div class="container-fluid ">
<div class="container">
<div class="col-md-1">
    </div>
	<div class="col-md-10">
        <br>
		<div id="book-table"></div>
		<table id="myTable-book" class="table table-bordered table-hover" cellspacing="0" width="100%">
	    <thead>
	    <tr>
	        <th>Ticket Name</th>
			<th>Price</th>
			<th>Ticket Season</th>
	    </tr>
	    </thead>
        <tbody>
        <?php
        // preparing select query for category table
        $query = "SELECT * FROM `ticket` ORDER BY `ticket_id` ASC";
        $tickets = mysqli_query($con,$query);
        ?>
        <?php foreach($tickets as $row): ?>
    		<tr>
                <td><?php echo $row['ticket_name']; ?></td>
    			<td><?php echo $row['ticket_price']; ?></td>
				<td><?php echo $row['season']; ?></td>
    		</tr>
        <?php endforeach; ?>
        </tbody>
    </table>
	</div>
	<div class="btn-bar">
		<a href="reserved.php" class="btn btn-custom theme_background_color">Book Your Ticket Now</a>
    </div>
</div>  
</div>

</div>   
</div>
</div>
</div>
</div>   
</div>
</div>
</div>
</div>   
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</section>
</body>


<?php
include_once('includes/footer.php');
?>

<!-- [ /WRAPPER ]

=============================================================================================================================-->

<!-- [ DEFAULT SCRIPT ] -->
<script src="library/modernizr.custom.97074.js"></script>
<script src="library/jquery-1.11.3.min.js"></script>
<script src="library/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<!-- [ PLUGIN SCRIPT ] -->
<script src="library/vegas/vegas.min.js"></script>
<script src="js/plugins.js"></script>
    
<!-- [ TYPING SCRIPT ] -->
<script src="js/typed.js"></script>
         
<!-- [ COUNT SCRIPT ] -->
<script src="js/fappear.js"></script>
<script src="js/jquery.countTo.js"></script>
	
<!-- [ SLIDER SCRIPT ] -->  
        
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
        
        
<!-- [ COMMON SCRIPT ] -->
	<script src="js/common.js"></script>
  
</body>
</html>
