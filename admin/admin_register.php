<?php
include 'inc/Header.php';
?>
<div class="container">
  <h1 class="text-center">Admin Pannel</h1>
  <?php
  if (isset($_SESSION['r_msg']) && $_SESSION['r_msg'] != '') :

  ?>
    <div class="alert alert-primary" role="alert">
      <?= $_SESSION['r_msg'] ?>
    </div>
  <?php
    unset($_SESSION['r_msg']);
  endif
  ?>

  <div class="bg-dark py-2 d-flex justify-content-end px-3 ms-auto">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Admin <i class="fas fa-plus"></i>
    </button>

  </div>



  <div class="mt-4">
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Admins
      </div>
      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>email</th>
              <th>action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>email</th>
              <th>action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $q = "select * from admin ";
            $run_query = mysqli_query($conn, $q);
            if (mysqli_num_rows($run_query) > 0) :
                  $n=1;
              while ($row = mysqli_fetch_assoc($run_query)) :
            ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td>
                      <form method="post" action="code/admin">
                        <input type="hidden" name="dltId" value="<?=$row['id']?>" >
                        <button name="dltBtn" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                      </form>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="code/admin" class="form-group">
          <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control">
          </div>
          <div class="mb-3">
            <button name="adminRegister" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>