<?php
    $con=mysqli_connect('localhost', 'root', '', 'cvsuadmissionsystem');

    if(!$con){
        die('Please Check Your Connection'.mysqli_error($con));
    }
?>