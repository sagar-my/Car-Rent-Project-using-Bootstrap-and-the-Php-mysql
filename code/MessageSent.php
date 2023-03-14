<?php
session_start();
session_regenerate_id();
include '../config/db.php';

            if(isset($_POST['messageSent']))
            {
                
                $name=mysqli_real_escape_string($conn,$_POST['name']);
                $email=mysqli_real_escape_string($conn,$_POST['email']);
                $messages=mysqli_real_escape_string($conn,$_POST['message']);
               
                if($name=='' || $email=='' || $messages == '')
                {
                    $_SESSION['m_msg']="All feilds are required";
                    header('location:../Contact');
                }
                else{
                    $q="INSERT INTO `contact`( `name`, `email`, `message`)
                     VALUES ('$name','$email','$messages')";
                     $run_query=mysqli_query($conn,$q);
                     if($run_query)
                     {
                        $_SESSION['m_msg']="Details Registered";
                        header('location:../Contact');
                     }
                     else{
                        $_SESSION['m_msg']="Something went wrong";
                        header('location:../Contact');
                     }
                }
            }


?>