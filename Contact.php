<?php
include './inc/Header.php';

?>
<script>
    document.body.style.backgroundColor = "aliceblue";
</script>
<div class="container my-3">

    <h1 class="text-center">
        Contact Details
    </h1>
    <div class="container ">
        <form method="post" action="code/MessageSent" class="row d-flex justify-content-center">
            <div class="col-sm-10 col-md-7 ">
                <div class="mb-3">
                    <?php

                    if (isset($_SESSION['m_msg']) && $_SESSION['m_msg'] != '') :
                    ?>

                        <div class="alert alert-primary" role="alert">
                            <?= $_SESSION['m_msg'] ?>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?php
                                                            if (isset($_SESSION['user'])) :
                                                                echo $_SESSION['data_user']['name'];
                                                            endif;

                                                            ?>" placeholder="Enter Name..." class="form-control">
                </div>
            </div>

            <div class="col-sm-10 col-md-7 ">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" value="<?php
                                                            if (isset($_SESSION['user'])) :
                                                                echo $_SESSION['data_user']['email'];
                                                            endif;

                                                            ?>" placeholder="Enter Email..." class="form-control">
                </div>
            </div>
            <div class="col-sm-10 col-md-7 ">
                <div class="mb-3">
                    <label for="">Message</label>
                    <textarea id="" cols="10" rows="3" name="message" placeholder="Enter Message..." class="form-control"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-evenly">
                <button type="submit" name="messageSent" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>


</div>



<?php
include './inc/Footer.php';

?>