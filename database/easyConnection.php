<?php
    $con = mysqli_connect("localhost","root","","safari");

    if(!$con){
        die("There is an error please try again later".mysqli_connect_error());
    }
?>