<?php require 'config/config.php'; ?>

<?php
  if (isset($_GET['upd'])) {
    $id = $_GET['upd'];
    $query ="SELECT * FROM users WHERE id=$id";
    $fire = mysqli_query($con,$query);
    $user = mysqli_fetch_assoc($fire);
  }
 ?>

<?php
    if (isset($_POST['update'])) {

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      if (!empty($password)) {
        $password = md5($_POST['password']);
        $query = "UPDATE users SET firstname = '$firstname' ,lastname = '$lastname' ,username = '$username' ,email = '$email' ,password = '$password' WHERE id=$id";
      }else {
        $query = "UPDATE users SET firstname = '$firstname' ,lastname = '$lastname' ,username = '$username' ,email = '$email' WHERE id=$id";
      }
        $fire = mysqli_query($con,$query) or die('UPDTE_ERR'.mysqli_error($con));
        if ($fire) {echo "Updated Successfuly";

            header("Location:index.php");

        };


    }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CrudApp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container ">
      <div class="row">
        <!--- - - - -update form- - - - - --->
        <div class="col-lg-4"></div>
        <div class="col-lg-4"><br><br>
          <h3>Update Data</h3>
          <hr>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input value="<?php echo @$user['firstname'] ?>" type="text" name="firstname" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
              <label for="lastname">Last Name</label>
              <input value="<?php echo @$user['lastname'] ?>" type="text" name="lastname" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input value="<?php echo @$user['username'] ?>" type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input value="<?php echo @$user['email'] ?>" type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="fomr-group">
              <label for="password">New Password</label>
              <input type="password" name="password" class="form-control" placeholder="New Password"><br>
            </div>
            <div class="form-group">
              <input type="submit" name="update" class="btn btn-primary btn-block" value="Update">
            </div>
          </form>
        </div>
        <div class="col-lg-4"></div>
      </div>
    </div>
  </body>
</html>
