<?php
    $conn = pg_connect("host=ec2-54-217-245-9.eu-west-1.compute.amazonaws.com
 dbname=d9523pcuei9f07 user=siacleshmwueiz password=0ea73a672d701a7a410b9f5662331de93d232c3240c5af9a80bc6a8505b389f1 port=5432");
    if($conn) {
       echo 'connected';
    } else {
        echo 'there has been an error connecting';
    } 
    $create_table = pg_query($conn, "CREATE TABLE IF NOT EXISTS table1 (
                                        id SERIAL PRIMARY KEY,
                                        column1 CHARACTER VARYING(255) NOT NULL UNIQUE
                                    );");
    $insert = pg_query($conn, "INSERT INTO table1(column1) VALUES('My first deployment!')");
    $select =  pg_query($conn, "Select * from table1");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>

<body style="color:red;">
  <?php  print_r($select);
    
    echo "<br/>";
    print_r(var_dump(pg_fetch_all($select)));
    echo 'exit!';
    ?>
</body>

</html>