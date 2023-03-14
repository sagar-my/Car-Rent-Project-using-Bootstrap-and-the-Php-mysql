<?php
session_start();
session_regenerate_id();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <script>
        document.body.style.backgroundColor = "aliceblue";
    </script>
    <div class="container mx-5 d-flex justify-content-center align-items-center" style="min-height:100vh">
        <form action="code/auth" method="post" class="form-group py-3 bg-light p-5 shadow col-sm-5 px-2">
            <div class="mb-3">
                <h1 class="bg-danger text-center text-white">Login</h1>
            </div>
            <div class="mb-3">
                <?php
                if (isset($_SESSION['l_admin']) && $_SESSION['l_admin'] != '') :
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['l_admin'] ?>
                    </div>
                <?php
                    unset($_SESSION['l_admin']);
                endif

                ?>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 d-flex justify-content-evenly">
                <button name="loginbtn" type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>