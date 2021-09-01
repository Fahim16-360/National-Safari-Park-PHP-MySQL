<?php
require_once('session_login.php');
include_once('../database/easyConnection.php');

if(isset($_GET['opening_id'])){
    //    echo $_GET['category_id'];
        $delete_query = "DELETE FROM `opening_time` WHERE `opening_id`=".$_GET['opening_id'];
        if(mysqli_query($con,$delete_query)){
            $_SESSION['successMessage']="Time deleted from database";
            header("location: allOpeningTimes.php");
        }else{
            echo "Something went wrong".mysqli_error($con);
        }
    }