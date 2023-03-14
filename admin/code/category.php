<?php

session_start();
session_regenerate_id();
include '../../config/db.php';


if (isset($_POST['cateRegister'])) {
    $name = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $price = trim(mysqli_real_escape_string($conn, $_POST['price']));
    $desciption = trim(mysqli_real_escape_string($conn, $_POST['desciption']));
    $image = trim(mysqli_real_escape_string($conn, $_FILES['image']['name']));

    $img_array = array('gif', 'jpg', 'jpeg', 'png','webp');
    $img_extension = pathinfo($image, PATHINFO_EXTENSION);

    if ($name == '' || $price == '' || $desciption == '' || $image == '') {
        $_SESSION['c_msg'] = "All feilds are required";
        header('location:../category');
    } else {
        if (!in_array($img_extension, $img_array)) {
            $_SESSION['c_msg'] = "Plese enter valid Extension Image";
            header('location:../category');
        }else{
                    $uid=bin2hex(random_bytes(6)).substr(time(),6);
                    $newImageName=bin2hex(random_bytes(6)).substr(time(),6).".".$img_extension;

                    $q="INSERT INTO `category`( `uid`, `name`, `description`, `price`, `image`) VALUES ('$uid','$name','$desciption','$price','$newImageName')";
                    $run_query=mysqli_query($conn,$q);
                    if($run_query)
                    {
                                move_uploaded_file($_FILES['image']['tmp_name'],'../../uploads/category/'.$newImageName);
                                $_SESSION['c_msg'] = "Category Created successfully";
                                header('location:../category');

                    }
                    else{
                        $_SESSION['c_msg'] = "something went wrong";
                        header('location:../category');
                    }
        }
    }
}
if(isset($_POST['deactiveId']))
{
    $id=mysqli_real_escape_string($conn,$_POST['did']);
    $q="select * from category where id='$id' ";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
    $q="update category set status='1' where id='$id'";
    $run_query=mysqli_query($conn,$q);
    if($run_query)
    {
        $_SESSION['c_msg'] = "deactivated";
        header('location:../category');
    }
    else{

        $_SESSION['c_msg'] = "something went wrong";
        header('location:../category');

    }
    }
    else{
        $_SESSION['c_msg'] = "Data not found";
        header('location:../category');
    }
}

if(isset($_POST['activeId']))
{
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $q="select * from category where id='$id' ";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
    $q="update category set status='0' where id='$id'";
    $run_query=mysqli_query($conn,$q);
    if($run_query)
    {
        $_SESSION['c_msg'] = "deactivated";
        header('location:../category');
    }
    else{

        $_SESSION['c_msg'] = "something went wrong";
        header('location:../category');

    }
    }
    else{
        $_SESSION['c_msg'] = "Data not found";
        header('location:../category');
    }
}


if(isset($_POST['dltBtn']))
{
    $id=mysqli_real_escape_string($conn,$_POST['dltId']);
    $q="select * from category where id='$id' ";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
        $data=mysqli_fetch_assoc($run_query);
        $imageName=$data['image'];
        $q="delete from category where id='$id'";
    $run_query=mysqli_query($conn,$q);
    if($run_query)
    {
        if(file_exists("../../uploads/category/$imageName"))
        {
                unlink("../../uploads/category/$imageName");
                $_SESSION['c_msg'] = "deleted with file";
                header('location:../category');
        }
        else{
            $_SESSION['c_msg'] = "delete";
            header('location:../category');
        }
    }
    else{

        $_SESSION['c_msg'] = "something went wrong";
        header('location:../category');

    }
    }
    else{
        $_SESSION['c_msg'] = "Data not found";
        header('location:../category');
    }
}

