<?php

session_start();
session_regenerate_id();
include '../../config/db.php';

if(isset($_POST['dltBtn']))
{
    $id=mysqli_real_escape_string($conn,$_POST['dltId']);
    $cid=mysqli_real_escape_string($conn,$_POST['carId']);
    $q="update category set is_rented='0' where uid='$cid' ";
    $run_query=mysqli_query($conn,$q);
    if($run_query)
    {
        $q="update rent set status='1' where id='$id' ";
        $run_query=mysqli_query($conn,$q);  
        if($run_query)
        {
            $_SESSION['c_msg'] = "Deleted Success";
        header('location:../orders');
        }
        else{
            $_SESSION['c_msg'] = "Deleted fail";
        header('location:../orders');
        }
    }
    else{
        $_SESSION['c_msg'] = "Data not found";
        header('location:../orders');
    }
}

?>