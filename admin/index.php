<?php
include 'inc/Header.php';

?>


            <div class="container">
                <div class="h1 text-center">Dashboard</div>
                <div class="row">
                    <div class="col-md-4 my-2">
                        <div class="card shadow">
                            <div class="card-heading text-center px-3">
                                Admin
                            </div>
                           <div class="card-body text-center">
                           <a href="<?=admin_url('admin_register')?>" class="btn btn-success btn-sm">Admin Page &rarr;</a>
                           </div>
                        </div>
                    </div>

                    <div class="col-md-4 my-2">
                        <div class="card shadow">
                            <div class="card-heading text-center px-3">
                                Car Category
                            </div>
                           <div class="card-body text-center">
                           <a href="<?=admin_url('category')?>" class="btn btn-primary btn-sm">Category Page &rarr;</a>
                           </div>
                        </div>
                    </div>


                    <div class="col-md-4 my-2">
                        <div class="card shadow">
                            <div class="card-heading text-center px-3">
                            Users
                            </div>
                           <div class="card-body text-center">
                           <a href="<?=admin_url('user_page')?>" class="btn btn-secondary btn-sm">Users Page &rarr;</a>
                           </div>
                        </div>
                    </div>


                    <div class="col-md-4 my-2">
                        <div class="card shadow">
                            <div class="card-heading text-center px-3">
                            Orders
                            </div>
                           <div class="card-body text-center">
                           <a href="<?=admin_url('orders')?>" class="btn text-light btn-warning btn-sm">Orders Page &rarr;</a>
                           </div>
                        </div>
                    </div>

                    <div class="col-md-4 my-2">
                        <div class="card shadow">
                            <div class="card-heading text-center px-3">
                            Help Desk
                            </div>
                           <div class="card-body text-center">
                           <a href="<?=admin_url('contact')?>" class="btn text-light btn-info btn-sm">Help Desk Page &rarr;</a>
                           </div>
                        </div>
                    </div>
                </div>
            </div>

<?php
include 'inc/Footer.php';

?>