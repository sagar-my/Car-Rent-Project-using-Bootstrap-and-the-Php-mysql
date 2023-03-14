<?php

session_start();
session_regenerate_id();
include '../../config/db.php';



if(isset($_POST['deactiveId']))
{
    $id=mysqli_real_escape_string($conn,$_POST['did']);
    $q="select * from users where id='$id' ";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
    $q="update users set status='1' where id='$id'";
    $run_query=mysqli_query($conn,$q);
    if($run_query)
    {
        $_SESSION['c_msg'] = "deactivated";
        header('location:../user_page');
    }
    else{

        $_SESSION['c_msg'] = "something went wrong";
        header('location:../user_page');

    }
    }
    else{
        $_SESSION['c_msg'] = "Data not found ";
        header('location:../user_page');
    }
}

if(isset($_POST['activeId']))
{
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $q="select * from users where id='$id' ";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
    $q="update users set status='0' where id='$id'";
    $run_query=mysqli_query($conn,$q);
    if($run_query)
    {
        $_SESSION['c_msg'] = "Activated...";
        header('location:../user_page');
    }
    else{

        $_SESSION['c_msg'] = "something went wrong";
        header('location:../user_page');

    }
    }
    else{
        $_SESSION['c_msg'] = "Data not found";
        header('location:../user_page');
    }
}


if(isset($_POST['dltBtn']))
{
    $id=mysqli_real_escape_string($conn,$_POST['dltId']);
    $q="delete from users where id='$id'";
    $run_query=mysqli_query($conn,$q);
    
    if($run_query)
    {
        $_SESSION['c_msg'] = "deleted Users successfully.....";
        header('location:../user_page');
    }
    else{
        $_SESSION['c_msg'] = "Something went wrong";
        header('location:../user_page');
    }
}

