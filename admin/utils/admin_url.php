<?php

            function admin_url($url){
                echo "http://localhost/car%20rent/admin/".$url;
            }
                if(!isset($_SESSION['admin_user']))
                {
                        header('location:login');
                }else{
                    $e=$_SESSION['admin_user'];
                    $q="select * from admin where email ='$e'";
                    $run_query=mysqli_query($conn,$q);
                    if(mysqli_num_rows($run_query)>0)
                    {

                    }
                    else{
                        header('location:login');
                    }
                }

?>