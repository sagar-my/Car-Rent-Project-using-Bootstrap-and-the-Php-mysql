<?php
include 'inc/Header.php';
include '../config/db.php';
?>
<div class="container">
  <h1 class="text-center">Users Pannel</h1>
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
        Users
      </div>
      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>email</th>
              <th>Status</th>
              <th>action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>id</th>
              <th>Name</th>
              <th>email</th>
              <th>Status</th>
              <th>action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $q = "select * from users ";
            $run_query = mysqli_query($conn, $q);
            if (mysqli_num_rows($run_query) > 0) :
                  $n=1;
              while ($row = mysqli_fetch_assoc($run_query)) :
            ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['status'] ==0 ? 'Active':'DeActive' ?></td>
                    <td>
                    <div class="d-flex m-2">

                    <?php
                                if($row['status']==0):
                                  ?>
                                     <form method="post" action="code/users" class="mx-2">
                        <input type="hidden" name="did" value="<?=$row['id']?>" >
                        <button name="deactiveId" class="btn btn-danger btn-sm"><i class="fas fa-eye-slash"></i></button>
                      </form>
                                  <?php
                              endif;
                              if($row['status']==1):
                                ?>
                                   <form method="post" action="code/users" class="mx-2">
                      <input type="hidden" name="id" value="<?=$row['id']?>" >
                      <button name="activeId" class="btn btn-danger btn-sm"><i class="fas fa-eye"></i></button>
                    </form>
                                <?php
                            endif


                    ?>
                 



                      <form method="post" action="code/users">
                        <input type="hidden" name="dltId" value="<?=$row['id']?>" >
                        <button name="dltBtn" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                      </form>
                    </div>
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

