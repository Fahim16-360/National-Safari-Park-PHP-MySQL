<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cancel Book</title>

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
        
<h1 class="main-heading-title"><span class="main-element themecolor" data-elements=" National Safari Park, National Safari Park, National Safari Park"></span></h1>
<h1 class="main-heading-title"><span class="main-element themecolor" data-elements="  Cancel booking ticket, Cancel booking ticket, Cancel booking ticket"></span></h1>
       
<!-- <p class="main-heading-text">You are most welcome to visit a national land like National Safari Park. <br/> It will be a great pleasure for us while you and your family spend your valuable time in this park for <br/> study tour, picnic, family get-together or memorable event. <br/> Hoping to fulfill the aim we have established a special National Safari Park near the capital city Dhaka.<br/></p> -->


<br>
<br>
<br>
<div class="container-fluid ">
<div class="container">
   <h2 align="center">Search Booked ID, Name or Email:</h2><br/>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
        </div>
   </div>
   <h3>Keep your booked ID to cancel booking...</h3>
<br/>
   <div id="result"></div>
</div>
    <div class="btn-bar">
		<h4>Request a form for cancel booking...</h4>
        <br>
		<a href="requestCancelBooking.php" class="btn btn-custom theme_background_color">Request cancel ticket booking</a>
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
</section>
</body>


<?php
include_once('includes/footer.php');
?>

<!-- [ /WRAPPER ]

=============================================================================================================================-->

<!-- [ SEARCH SCRIPT ] -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- [ RUNNING SCRIPT ] -->
<script>
        $(document).ready(function(){
        load_data();

        function load_data(query) {
            $.ajax({
                url:"showBookedProcess.php",
                method:"POST",
                data:{query:query},
                success:function(data) {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>


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
