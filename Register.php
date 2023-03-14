<?php

include './inc/Header.php';
if(isset($_SESSION['user'])){
    header('location:index');
}


?>
<script>
    document.body.style.backgroundColor = "aliceblue";
</script>
<div class="container d-md-flex d-lg-flex my-3">

    <div class=" d-none d-md-block  d-lg-block col-sm-12 col-md-8 ">
        <img src="https://cdni.autocarindia.com/utils/imageresizer.ashx?n=https://cms.haymarketindia.net/model/uploads/modelimages/LSModelImage.jpg&w=872&h=578&q=75&c=1" class="w-100  " style="  height: 500px;
    object-fit: contain;" alt="">
    </div>
    <div class="col-sm-12 py-5 mx-3 col-md-4 col-lg-4">
   <form action="code/authCode" method="post" class="form-control">
   <div class="mb-3">
        <h1 class="text-center">Register</h1>
        </div>
        <div class="mb-3">
                <?php

                        if(isset($_SESSION['r_msg']) && $_SESSION['r_msg']!=''):
         ?>
                <div class="alert alert-primary" role="alert">
                      <?=$_SESSION['r_msg']?>          
</div>
         <?php
                            unset($_SESSION['r_msg']);
                        endif;

                ?>
        </div>

        <div class="mb-3">
        <label for="">User Name</label>
                    <input type="text" name="name" class="form-control" >
        </div>
        <div class="mb-3">
        <label for="">Email</label>
                    <input type="text" name="email" class="form-control" >
        </div>
       <div class="d-flex col-sm-12">
       <div class="mb-3 col-sm-11" style="width:90%;">
        <label for="">Passsword</label>
                    <input type="password" name="password" id="password" class="form-control" >
        </div>
        <div class="mb-3 col-sm-1">
            <button type="button" id="toggle" class="btn mt-4"><i class="fa fa-eye"></i></button>
        </div>
       </div>
        <div class="mb-3 d-flex justify-content-evenly">
            <button type="submit" name="registerBtn" class="btn btn-primary">Register</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        <div class="mb-3">
            <a href="<?=base_url('Login')?>" class="nav-link text-center">Already Have An account &rarr;</a>
        </div>
    </div>
   </form>

</div>



<?php
include './inc/Footer.php';

?>
<script>
    let a=0;
    $("#toggle").click(function(){
        console.log('clicked');
          if(a==0)
          {
            $("#password").attr("type","text")
            $("#toggle").html('<i class="fa fa-eye-slash"></i>');
            a=1
          }
          else{
            $("#password").attr("type","password");
            $("#toggle").html('<i class="fa fa-eye"></i>');
            

            a=0

          }
    })
</script>