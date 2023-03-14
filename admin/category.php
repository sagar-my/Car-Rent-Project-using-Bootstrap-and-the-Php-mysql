<?php
include 'inc/Header.php';
include '../config/db.php';
?>
<div class="container">
  <h1 class="text-center">Category Pannel</h1>
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

  <div class="bg-dark py-2 d-flex justify-content-end px-3 ms-auto">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Category <i class="fas fa-plus"></i>
    </button>

  </div>



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
              <th>Name</th>
              <th>price</th>
              <th>Status</th>
              <th>action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>price</th>
              <th>Status</th>
              <th>action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $q = "select * from category ";
            $run_query = mysqli_query($conn, $q);
            if (mysqli_num_rows($run_query) > 0) :
              $n = 1;
              while ($row = mysqli_fetch_assoc($run_query)) :
            ?>
                <tr>
                  <td><?= $n ?></td>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['price'] ?></td>
                  <td><?= $row['status'] == 0 ? 'Active' : 'DeActive' ?></td>
                  <td>
                    <div class="d-flex m-2">

                      <?php
                      if ($row['status'] == 0) :
                      ?>
                        <form method="post" action="code/category" class="mx-2">
                          <input type="hidden" name="did" value="<?= $row['id'] ?>">
                          <button name="deactiveId" class="btn btn-danger btn-sm"><i class="fas fa-eye-slash"></i></button>
                        </form>
                      <?php
                      endif;
                      if ($row['status'] == 1) :
                      ?>
                        <form method="post" action="code/category" class="mx-2">
                          <input type="hidden" name="id" value="<?= $row['id'] ?>">
                          <button name="activeId" class="btn btn-danger btn-sm"><i class="fas fa-eye"></i></button>
                        </form>
                      <?php
                      endif
                      ?>
                      <form method="post" action="code/category">
                        <input type="hidden" name="dltId" value="<?= $row['id'] ?>">
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Car</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="code/category" class="form-group" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Image</label>
            <input type="file" accept="image/*" name="image" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Price - &#8377; <small>per day /-</small></label>
            <input type="text" name="price" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">description</label>
            <textarea name="desciption" id="" cols="3" rows="2" class="form-control"></textarea>
          </div>
          <div class="mb-3">
            <button name="cateRegister" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>