<?php
include 'inc/Header.php';
include '../config/db.php';
?>
<div class="container">
  <h1 class="text-center">Contact Pannel</h1>
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
        Contact
      </div>
      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Message</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Message</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $q = "select * from contact ";
            $run_query = mysqli_query($conn, $q);
            if (mysqli_num_rows($run_query) > 0) :
                  $n=1;
              while ($row = mysqli_fetch_assoc($run_query)) :
            ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['message']?></td>
                   
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

