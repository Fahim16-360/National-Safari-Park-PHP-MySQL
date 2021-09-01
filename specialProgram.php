<?php 
include_once('database/easyConnection.php');
?>

<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>National Safari Park</title>

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
<body >

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
?>
 
<br>
<br>
<br>
<br>
<br>

<!-- [/SERVICES]
 
============================================================================================================================-->

<section class="services white-background black" id="seven">
     
<div class="container-fluid">

<div class="container">
<?php
    $latest_query = "SELECT * FROM `special_program` ORDER BY `program_id` ASC";
    $result = mysqli_query($con,$latest_query);
?>
    <?php
    while ($latest_program = mysqli_fetch_array($result))
        { ?>
<div class="list-view list-view1">       
    <div class="col-sm-6 col-md-6 col-xs-6">
            <div class="col-sm-6 col-md-6 col-xs-12 image-container">
            <br>
            <br>
            <img alt="" class="" width="180 px" height="150 px" src="admin/program_image/<?php echo $latest_program['program_image']; ?>">
                <br>
                <br>
                <h4><a href="programDetails.php?program_id=<?php echo $latest_program['program_id'] ?>" class="blog-desc"> <?php echo $latest_program['program_price']; ?> Taka</a></h4>
            </div>  
            <br>
            <br>
            <div class="col-sm-6 col-md-6">
                <h2><a href="programDetails.php?program_id=<?php echo $latest_program['program_id'] ?>" class="blog-desc"> <?php echo $latest_program['program_name']; ?></a></h2>
            </div>
            <br>
            <br>
            <div class="col-sm-6 col-md-6">
                <h4><p><?php echo substr($latest_program['program_details'],0,200); ?>..</p></h4>
                <a href="programDetails.php?program_id=<?php echo $latest_program['program_id'] ?>">Read more</a>
            </div>
    </div>
</div>
    <?php } ?>

</div>
</div>
</div>  <!-- container-fluid -->

</section>

<?php
include_once('includes/footer.php');
?>


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