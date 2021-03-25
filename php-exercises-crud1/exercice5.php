<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   
</head>
  

<body>
   
  
  <div class="container-md">
    
     <?php $mysqli = new mysqli('localhost','root','root','colyseum') or die(mysqli_error($mysqli));
           $result =$mysqli -> query("select * from clients  where lastName like 'm%'  order by lastName asc") or die(mysqli_error($mysqli));
            //pre_r($result);
         //pre_r( $result -> fetch_assoc());
     ?>
    <div class="row justify-content-center"> 
           <h1>CLIENTS with lettre M on the beging</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Birthday</th>
                        <th>cards</th>
                        <th>card Number</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result -> fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['lastName']; ?></td>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['birthDate']; ?></td>
                            <td><?php echo $row['card']; ?></td>
                            <td><?php echo $row['cardNumber']; ?></td>
                        </tr>
                    <?php endwhile; ?>
            </table>
    </div>
    <?php
           function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
           }
     
     ?>
</body>
</html>
