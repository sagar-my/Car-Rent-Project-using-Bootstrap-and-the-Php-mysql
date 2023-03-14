<?php

include './config/db.php';
        function base_url($url){
            echo "http://localhost/car%20rent/".$url;
        }

            if(isset($_SESSION['user']))
            {
                    $q="select * from users where email='$_SESSION[user]'";
                    $run_query=mysqli_query($conn,$q);
                    if(mysqli_num_rows($run_query)>0)
                    {
                        $_SESSION['data_user']=mysqli_fetch_assoc($run_query);
                    }else{
                        unset($_SESSION['user']);
                        session_destroy();
                    }

            }else{
                unset($_SESSION['user']);
                session_destroy();
            }

?>