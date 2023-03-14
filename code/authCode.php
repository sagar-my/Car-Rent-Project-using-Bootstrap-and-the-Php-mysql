<?php
session_start();
session_regenerate_id();
include '../config/db.php';

if(isset($_POST['registerBtn']))
{
    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= mysqli_real_escape_string($conn,$_POST['password']);

    if($name == '' || $email == '' || $password == '')
    {
        $_SESSION['r_msg']=' All Feilds Are required';
        header('location:../register');
    }
    else{
        $q="select * from users where email='$email'";
        $run_query=mysqli_query($conn,$q);
        if(mysqli_num_rows($run_query)>0)
        {
            $_SESSION['r_msg']='Email Already Exist';
            header('location:../register');
        }
        else{
            $pass_hash=password_hash($password,PASSWORD_BCRYPT);
            $q="INSERT INTO `users`( `name`, `email`, `password`)
             VALUES ('$name','$email','$pass_hash')";
             $run_query=mysqli_query($conn,$q);
             if($run_query)
             {
                $_SESSION['r_msg']='Registration Success fully';
                header('location:../register');
             }
             else{
                $_SESSION['r_msg']='Something went wrong';
                header('location:../register');
             }
        }
    }
}
if(isset($_POST['loginBtn']))
{
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);

        if($email == '' ||  $password == '')
        {
            $_SESSION['l_msg']="Plese fill valid Credential";
            header('location:../login'); 
        }
        else{
                $q="select * from users where email='$email'";
                $run_query=mysqli_query($conn,$q);
                if(mysqli_num_rows($run_query) >0)
                {
                        $db_data=mysqli_fetch_assoc($run_query);
                        $db_pass=$db_data['password'];
                        $verify=password_verify($password,$db_pass);
                        if($verify)
                        {
                                $_SESSION['user']=$email;
                                header('location:../index');
                        }
                        else{
                            $_SESSION['l_msg']="No account found";
                            header('location:../login'); 
                        }
                }
                else{
                    $_SESSION['l_msg']="plese enter valid credential";
    header('location:../login'); 
                }
        }
}
if(isset($_POST['logoutBtn']))
{
    unset($_SESSION['user']);
    session_destroy();
    header('location:../index');
    
}

?>