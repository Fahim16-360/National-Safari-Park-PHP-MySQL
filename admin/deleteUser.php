<?php
require_once('session_login.php');
include_once('../database/easyConnection.php');

if(isset($_GET['user_id'])){
    //    echo $_GET['category_id'];
        $delete_query = "DELETE FROM `user` WHERE `user_id`=".$_GET['user_id'];
        if(mysqli_query($con,$delete_query)){
            $_SESSION['successMessage']="User deleted from database";
            header("location: allUsers.php");
        }else{
            echo "Something went wrong".mysqli_error($con);
        }
    }