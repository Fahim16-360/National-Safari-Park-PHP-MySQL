<?php
require_once('session_login.php');
include_once('../database/easyConnection.php');

if(isset($_GET['image_id'])){
    //    echo $_GET['category_id'];
        $delete_query = "DELETE FROM `gallery` WHERE `image_id`=".$_GET['image_id'];
        if(mysqli_query($con,$delete_query)){
            $_SESSION['successMessage']="Image deleted from database";
            header("location: allGalleryImages.php");
        }else{
            echo "Something went wrong".mysqli_error($con);
        }
    }