<?php
include_once('../database/easyConnection.php');

if(isset($_GET['book_id'])){
    //    echo $_GET['category_id'];
        $delete_query = "DELETE FROM `booked` WHERE `book_id`=".$_GET['book_id'];
        if(mysqli_query($con,$delete_query)){
            $_SESSION['successMessage']="Booking deleted from database";
            header("location: cancelBooking.php");
        }else{
            echo "Something went wrong".mysqli_error($con);
        }
    }