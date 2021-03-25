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
           $result =$mysqli -> query("select * from shows order by title asc ") or die(mysqli_error($mysqli));
            //pre_r($result);
         //pre_r( $result -> fetch_assoc());
     ?>
    <div class="row justify-content-center"> 
           <h1>title of spetacule</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>performer</th>
                        <th>date</th>
                        <th>startTime</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result -> fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['performer']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['startTime']; ?></td>
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
