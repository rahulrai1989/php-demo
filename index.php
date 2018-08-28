<?php
include_once('header.php');

    $conn = pg_connect("host=".getenv('HOST')." dbname=".getenv('DBNAME')." user=".getenv('USER')." password=".getenv('PASSWORD')." port=5432");
    if($conn) {
       echo 'connected';
    } else {
        Rollbar::log(Level::info(), 'DB not connected');
    } 

    $create_table = pg_query($conn, "CREATE TABLE customers (
                                        id SERIAL PRIMARY KEY,
                                        customer_name CHARACTER VARYING(255) NOT NULL,
                                        address CHARACTER VARYING(255) NOT NULL,
                                        city CHARACTER VARYING(255) NOT NULL,
                                        state CHARACTER VARYING(255) NOT NULL
                                    );");

    $select =  pg_query($conn, "Select * from customers");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>

<body style="color:red;">
    <table>
      <tr>
          <th>Customer name</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
      </tr>
      <?php foreach(pg_fetch_all($select) as $data){ 
      echo '<tr>
            <td>'.$data['customer_name'].'</td>
            <td>'.$data['address'].'</td>
            <td>'.$data['city'].'</td>
            <td>'.$data['state'].'</td>
          </tr>';
        } ?>

    </table>

</body>

</html>