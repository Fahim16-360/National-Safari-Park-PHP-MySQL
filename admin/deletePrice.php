<?php
require_once('session_login.php');
include_once('../database/easyConnection.php');

if(isset($_GET['ticket_id'])){
    //    echo $_GET['category_id'];
        $delete_query = "DELETE FROM `ticket` WHERE `ticket_id`=".$_GET['ticket_id'];
        if(mysqli_query($con,$delete_query)){
            $_SESSION['successMessage']="Price deleted from database";
            header("location: allPrices.php");
        }else{
            echo "Something went wrong".mysqli_error($con);
        }
    }