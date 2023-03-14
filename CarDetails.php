<?php
include './inc/Header.php';
include './config/db.php';

?>
<script>
    document.body.style.backgroundColor = "aliceblue";
</script>
<div class="container my-3">

<?php

if(isset($_GET['uid']))
{
    $q="select * from category where uid='$_GET[uid]'";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
        $data=mysqli_fetch_assoc($run_query);

    }
    else{
        header('location:../index');
    }
}
            // echo $_GET['car_id'];

?>

<div class="row">
    <!-- details -->
    <div class="col-sm-12 col-md-8 col-lg-8 my-3">
        
    <div class="container">
        <img src="<?=base_url('./uploads/category/'.$data['image'])?>" class="w-100 img-fluid img-thumbnail " style="  height: 300px;
    object-fit: fill;" alt="">
    <div class="d-flex">
            <p class="h1 mx-3"> <?=$data['name']?> </p>
            <p class=" d-flex align-items-center px-3 mt-3 bg-<?=$data['is_rented']==0?'success text-white':'danger text-white'?>"> <?=$data['is_rented']==0?'Avilable':'Rented'?> </p>
    </div>
    <hr>
    <p>
        <?=$data['description']?>
    </p>
    </div>
    </div>

    <!-- form -->
    <div class="col-sm-12 col-md-4 col-lg-4 my-3">
        <h1 class="text-center">User Details</h1>

        <?php
         if(isset($_SESSION['user'] )  ){
           

           if($data['is_rented']){
            ?>
                    <div class="form-control">
                        <h1>Car Summury</h1>
                        <p>Already Rented wait some time</p>
                        <div class="text-center">
                            <a href="<?=base_url('')?>" class="btn btn-primary btn-sm px-3">Explore more car </a>
                        </div>
                    </div>
            <?php
           }else{
            ?>
            
               
        <form action="<?=base_url('code/rent')?>" method="post" class="form-control">
           <div class="row">
            <div class="mb-3">
                <?php
                        if(isset($_SESSION['m_msg']) && $_SESSION['m_msg'])
                        {
                            ?>
                                <div class="alert alert-primary" role="alert">
                                    <?=$_SESSION['m_msg']?>
</div>
                            <?php
                            unset($_SESSION['m_msg']);
                        }
?>
            </div>
           <div class="mb-3">
              <input type="hidden" name="c_id"  value="<?=$data['uid']?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Untill Rent</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Payment Methods</label>
                <select name="p_method" id="" class="form-control">
                    <option class="form-control" value="" class="form-control">select...</option>
                    <option class="form-control" value="upi" class="form-control">UPI</option>
                    <option class="form-control" value="Net Banking" class="form-control">Net Banking</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Transaction Id</label>
                <input type="text" name="txn" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Total Amound</label>
                <p> &#8377; <?=$data['price']?></p>
            </div>
            <div class="mb-3 d-flex justify-content-around">
                <button name="submitBtn" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
           </div>
        </form>
       
            <?php
           }
            
            }else{
        ?>
        <div class="form-control">
            <div class="mb-3 text-center">
                <h1 class="text-center h3">Plese login</h1>
                <a href="<?=base_url('login')?>" class="btn btn-success">login</a>
            </div>
        </div>
        <?php
        }?>
    </div>
</div>

</div>



<?php
include './inc/Footer.php';

?>