<?php
session_start();
session_regenerate_id();
include '../../config/db.php';

if(isset($_POST['adminRegister']))
{
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);

        if($name=='' ||$email=='' ||$password=='' )
        {
           $_SESSION['r_msg']="all feilds are required";
           header('location:../admin_register'); 
        }
        else{
            $q="select * from admin where email='$email'";
            $run_query=mysqli_query($conn,$q);
            if(mysqli_num_rows($run_query)>0)
            {
                $_SESSION['r_msg']="Provide email is Already Exist";
           header('location:../admin_register'); 
            }
            else{
                $hash_password=password_hash($password,PASSWORD_BCRYPT);
                $q="insert into admin(name,email,password) values('$name','$email','$hash_password')";
            $run_query=mysqli_query($conn,$q);
            if($run_query)
            {
                $_SESSION['r_msg']="Admin Registered Successfully";
                header('location:../admin_register');
            }
            else{
                $_SESSION['r_msg']="Something went wrong";
                header('location:../admin_register');
            }
            }
        }
} 
if(isset($_POST['dltBtn']))
{
    $dltId=mysqli_real_escape_string($conn,$_POST['dltId']);
    $q="select * from admin where id='$dltId'";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
            $q="delete from admin where id='$dltId' ";
            $run_query=mysqli_query($conn,$q);
            if($run_query)
            {
                $_SESSION['r_msg']="delete successully";
                header('location:../admin_register'); 
            }
            else{
                $_SESSION['r_msg']="something went wrong";
                header('location:../admin_register'); 
            }
    }
    else{
        $_SESSION['r_msg']="Data not found";
        header('location:../admin_register'); 
    }
}

?>