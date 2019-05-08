<?php
    require 'config/config.php';

    if (isset($_POST['submit'])) {

      $firstname = strip_tags(trim($_POST['firstname']));
      $lastname = $_POST['lastname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);

        $query = "INSERT INTO users(firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$password')";

        $fire = mysqli_query($con,$query) or die('SIGNUP_ERR'); mysqli_error($con);
        if ($fire) echo "successfully  signed up";

    }

 ?>

  <?php

    if (isset($_GET['del'])) {
      $id = $_GET['del'];
      $query = "DELETE  FROM users WHERE id=$id";
      $fire = mysqli_query($con,$query);
      if ($fire) echo "Data Delete successfully";
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

        <!--- - - - -Show Data- - - - - - --->
        <div class="col-lg-9">
          <h3>User Data</h3>
          <hr>
              <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>FirstName</th>
                      <th>LastName</th>
                      <th>UserName</th>
                      <th>Email</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM users";
                      $fire = mysqli_query($con,$query) or die('ERR_FIR'); mysqli_error($con);
                      $rows = mysqli_num_rows($fire);
                      if ($rows>0){
                        while ($user = mysqli_fetch_assoc($fire)){?>
                    <tr>
                      <td><?php echo $user['id'] ?></td>
                      <td><?php echo $user['firstname'] ?></td>
                      <td><?php echo $user['lastname'] ?></td>
                      <td><?php echo $user['username'] ?></td>
                      <td><?php echo $user['email'] ?></td>
                      <td>
                        <a href="update.php?upd=<?php echo $user['id'] ?>" class="btn btn-sm btn-warning">Update</a>
                      </td>
                      <td>
                        <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                      </td>

                   </tr>
                   <?php
                 }
               }
               else {
                ?>
                  <tr>
                    <td colspan="3" class="text-center">
                      <h2 class="text-muted text-center">There Is No Data To Show !!  </h2>
                    </td>
                  </tr>
                <?php } ?>
                  </tbody>
                </table>
        </div>

        <!--- - - - -signup form- - - - - --->
        <div class="col-lg-3"><br><br>
          <h3>SignUP</h3>
          <hr>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input type="text" name="firstname" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
              <label for="lastname">Last Name</label>
              <input type="text" name="lastname" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="fomr-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password"><br>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-primary btn-block" value="Signup">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
