<?php
session_start();
session_regenerate_id();
include '../config/db.php';
                if(isset($_POST['submitBtn']))
                {
                        $c_id= mysqli_real_escape_string($conn,$_POST['c_id']);
                        $date= mysqli_real_escape_string($conn,$_POST['date']);
                        $p_method= mysqli_real_escape_string($conn,$_POST['p_method']);
                        $txn= mysqli_real_escape_string($conn,$_POST['txn']);
                        if( $date=='' || $date=='' || $p_method=='' || $txn=='')
                        {
                            $_SESSION['m_msg']="All feilds are required";
                            header('location:../CarDetails/'.$c_id);
                        }else{
                                $q="select * from rent where user_id='$_SESSION[user]' and car_id='$c_id'";
                                $run_query=mysqli_query($conn,$q);
                                if(mysqli_num_rows($run_query)>0)
                                {
                                    $_SESSION['m_msg']="You already rented this car";
                                    header('location:../CarDetails/'.$c_id);
                                }else{
                                    $order_id="RENT".rand(00,99).substr($c_id,3);
                                    $q="INSERT INTO `rent`( `user_id`, `order_id`, `car_id`, `date`, `p_method`, `txn_id`) VALUES ('$_SESSION[user]','$order_id','$c_id','$date','$p_method','$txn')";
                                    $run_query=mysqli_query($conn,$q);
                                    if($run_query)
                                {
                                   $q="update category set is_rented='1' where uid='$c_id'";
                                   $run_query=mysqli_query($conn,$q);
                                   if($run_query)
                                   {
                                    $_SESSION['m_msg']="Order placed with <br/> order id =>  $order_id";
                                    header('location:../CarDetails/'.$c_id);
                                   }else{
                                    $_SESSION['m_msg']="Server unable";
                                    header('location:../CarDetails/'.$c_id);
                                   }
                                }else{
                                    $_SESSION['m_msg']="Something went wrong";
                                    header('location:../CarDetails/'.$c_id);
                                }
                                }
                        }

                }

?>