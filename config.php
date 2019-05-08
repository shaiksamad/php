<?php

      define('HOSTNAME', 'localhost');
      define('USERNAME', 'root');
      define('PASSWORD', '');
      define('DBNAME', 'crudapp');

      $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die(DB_CONN_ERR); mysqli_error($con);







 ?>
