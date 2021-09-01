<?php
require_once('session_login.php');
include_once('../database/easyConnection.php');

if(isset($_GET['booked_id'])){
    //    echo $_GET['category_id'];
        $delete_query = "DELETE FROM `cancel_booked` WHERE `booked_id`=".$_GET['booked_id'];
        if(mysqli_query($con,$delete_query)){
            $_SESSION['successMessage']="Booking cancellation properly done from database";
            header("location: allRequestedCancelBooking.php");
        }else{
            echo "Something went wrong".mysqli_error($con);
        }
    }