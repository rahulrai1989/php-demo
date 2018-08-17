<?php
    $conn = pg_connect("host=ec2-54-217-245-9.eu-west-1.compute.amazonaws.com
 dbname=d9523pcuei9f07 user=siacleshmwueiz password=0ea73a672d701a7a410b9f5662331de93d232c3240c5af9a80bc6a8505b389f1 port=5432");
    if($conn) {
       echo 'connected';
    } else {
        echo 'there has been an error connecting';
    } 
    /*$create_table = pg_query($conn, "CREATE TABLE IF NOT EXISTS table1 (
                                        id SERIAL PRIMARY KEY,
                                        column1 CHARACTER VARYING(255) NOT NULL UNIQUE
                                    );");*/

    $create_table = pg_query($conn, "CREATE TABLE customers (
                                        id SERIAL PRIMARY KEY,
                                        customer_name CHARACTER VARYING(255) NOT NULL,
                                        address CHARACTER VARYING(255) NOT NULL,
                                        city CHARACTER VARYING(255) NOT NULL,
                                        state CHARACTER VARYING(255) NOT NULL
                                    );");

    //$insert = pg_query($conn, "INSERT INTO table1(column1) VALUES('My first deployment!')");
    /*$insert = pg_query($conn, "INSERT INTO customers(customer_name, address, city, state) VALUES('Sahil sharma', 'Mohali', 'Chandigarh', 'punjab')");
    $insert = pg_query($conn, "INSERT INTO customers(customer_name, address, city, state) VALUES('Rahul sharma', 'Mohali', 'Mohali', 'punjab')");
    $insert = pg_query($conn, "INSERT INTO customers(customer_name, address, city, state) VALUES('Rahul rai', 'Mohali', 'Gurdaspur', 'punjab')");
    $insert = pg_query($conn, "INSERT INTO customers(customer_name, address, city, state) VALUES('chandan kumar', 'Mohali', 'Kurali', 'punjab')");*/
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