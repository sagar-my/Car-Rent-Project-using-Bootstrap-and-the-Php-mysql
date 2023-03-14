<?php

session_start();
session_regenerate_id();
include '../../config/db.php';

            if(isset($_POST['loginbtn']))
            {
                    $email=mysqli_real_escape_string($conn,$_POST['email']);
                    $password=mysqli_real_escape_string($conn,$_POST['password']);

                    if($email == '' ||  $password == '')
                    {
                        $_SESSION['l_admin']="Plese fill valid Credential";
                        header('location:../login'); 
                    }
                    else{
                            $q="select * from admin where email='$email'";
                            $run_query=mysqli_query($conn,$q);
                            if(mysqli_num_rows($run_query) >0)
                            {
                                    $db_data=mysqli_fetch_assoc($run_query);
                                    $db_pass=$db_data['password'];
                                    $verify=password_verify($password,$db_pass);
                                    if($verify)
                                    {
                                            $_SESSION['admin_user']=$email;
                                            header('location:../index');
                                    }
                                    else{
                                        $_SESSION['l_admin']="No account found";
                                        header('location:../login'); 
                                    }
                            }
                            else{
                                $_SESSION['l_admin']="plese enter valid credential";
                header('location:../login'); 
                            }
                    }
            }

                    if(isset($_POST['logoutBtn']))
                    {
                        unset($_SESSION['admin_user']);
                        session_destroy();
                        header('location:../login');
                    }

?>