<?php
require_once('session_login.php');
include_once('../database/easyConnection.php');

if(isset($_GET['program_id'])){
    //    echo $_GET['category_id'];
        $delete_query = "DELETE FROM `special_program` WHERE `program_id`=".$_GET['program_id'];
        if(mysqli_query($con,$delete_query)){
            $_SESSION['successMessage']="program deleted from database";
            header("location: allSpecialProgram.php");
        }else{
            echo "Something went wrong".mysqli_error($con);
        }
    }