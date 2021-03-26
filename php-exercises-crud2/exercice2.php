<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
  

<body>
    <?php require_once 'exercice2Action.php'; ?>
     <?php 
        if(isset($_SESSION['message'])):?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>  
  
  <div class="container-md">
    
     <?php $mysqli = new mysqli('localhost','root','root','client') or die(mysqli_error($mysqli));
           $result =$mysqli -> query("select * from cards") or die(mysqli_error($mysqli));
           // pre_r($result);
          // pre_r( $result -> fetch_assoc());
     ?>
    <div class="row justify-content-center"> 
            <table class="table">
                <thead>
                    <tr>
                         <th>numero:</th>
                        <th>type:</th>
                        
                    </tr>
                </thead>
                <?php
                    while ($row = $result -> fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['numero']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                       
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
     <div class="row justify-content-center">
        <form action="exercice2Action.php" method="POST">
            <div  style="width: 30%;height: 30%;position: relative;margin-left: auto;margin-right: auto;">
                <div class="form-group mb-2"> 
                    <label class="control-label" for="numero">numero:</label>
                    <input type="text" id="numero" required maxlength="48"  oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" 
                     name="numero" class="form-control" value="<?php echo $numero;?>" placeholder="Enter your Number"> 
                </div>
                <div class="form-group mb-2">
                    <label class="control-label" for="type">type:</label>
                    <input type="text" id="type" required name="type" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                     maxlength="48" class="form-control" value="<?php echo $type;?>" placeholder="Enter the type of your card">
                </div>
         
                <div class="form-group">    
                    <button type="submit"  class="btn btn-primary" id="save" name="save">Save</button>      
                </div>
            </div>
        </form>
      </div>
   </div> 
</body>
</html>
