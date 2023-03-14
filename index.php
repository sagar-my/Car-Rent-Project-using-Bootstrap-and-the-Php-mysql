<?php

include './inc/Header.php';
include './config/db.php';
?>
<script>
    document.body.style.backgroundColor = "aliceblue";
</script>
<div class="container my-3">


    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('inc/media/dff.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('inc/media/lambrogini.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('inc/media/lab2.jpg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

        <div class="my-3">
            <h1 class="text-dark text-center ">:- Avliable Car :-</h1>
            
    <div class="row">
    <?php

                // $q="SELECT `id`, `uid`, `name`, `description`, `price`, `image`, `status`, `is_rented`, `created_at` FROM `category` WHERE 1";
$q="SELECT * FROM `category` where status='0' ";
$run_query=mysqli_query($conn,$q);
if(mysqli_num_rows($run_query)>0):
    while($row = mysqli_fetch_assoc($run_query)):

?>

<div class="col-sm-4 mb-2 px-3 py-1">
            <div class="card ">
                <img src="./uploads/category/<?=$row['image']?>" style="" class="w-75 m-auto card-img-top img-thumbnail img-fluid " alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$row['name']?></h5>
                    <div class="d-flex justify-content-evenly align-items-center">
                        <p>&#8377; <?= $row['price'] ?></p>
                        <a href="<?=base_url("CarDetails/$row[uid]")?>" class="btn btn-primary">Rent</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
           
?>
    </div>

        </div>




</div>



<?php
include './inc/Footer.php';

?>