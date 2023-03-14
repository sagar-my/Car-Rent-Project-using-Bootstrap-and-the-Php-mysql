<?php
include 'inc/Header.php';
include '../config/db.php';


function car_find_id($id){
  global $conn;
  $q="select * from category where uid='$id' ";
  $run_query=mysqli_query($conn,$q);
  if(mysqli_num_rows($run_query)>0)
  {
    $data=mysqli_fetch_assoc($run_query);
    return strtoupper($data['name']);
  }
}
?>
<div class="container">
  <h1 class="text-center">Orders Pannel</h1>
  <?php
  if (isset($_SESSION['c_msg']) && $_SESSION['c_msg'] != '') :

  ?>
    <div class="alert alert-primary" role="alert">
      <?= $_SESSION['c_msg'] ?>
    </div>
  <?php
    unset($_SESSION['c_msg']);
  endif
  ?>





  <div class="mt-4">
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        category
      </div>
      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>id</th>
              <th>Order_id</th>
              <th>Car Name</th>
              <th>User</th>
              <th>action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>id</th>
              <th>Order_id</th>
              <th>Car Name</th>
              <th>User</th>
              <th>action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $q = "select * from rent ";
            $run_query = mysqli_query($conn, $q);
            if (mysqli_num_rows($run_query) > 0) :
                  $n=1;
              while ($row = mysqli_fetch_assoc($run_query)) :
            ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['order_id']?></td>
                    <td>

                    <?php
                
              echo  car_find_id($row['car_id']);
                    ?>

                    </td>
                    <td><?=$row['user_id']?> </td>
                    <td>
                   <?php
                          if($row['status']==='0'):
                            ?>
                             <div class="d-flex m-2">
<form method="post" action="code/car_deleted">
  <input type="hidden" name="dltId" value="<?=$row['id']?>" >
  <input type="hidden" name="carId" value="<?=$row['car_id']?>" >
  <button name="dltBtn" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
</form>
</div>
                            
                            <?php

endif;

   
                        
                   ?>

<?php
                          if($row['status']!=='0'):
                            ?>
                             <div class="d-flex m-2">
  <button name="dltBtn" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
</div>
                            
                            <?php

endif;

   
                        
                   ?>

                    </td>
                  </tr>
            <?php
            $n++;
              endwhile;

            endif
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
include 'inc/Footer.php';

?>

