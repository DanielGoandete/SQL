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
    <?php require_once 'exercice4Action.php'; ?>
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
           $result =$mysqli -> query("select * from users") or die(mysqli_error($mysqli));
           // pre_r($result);
          // pre_r( $result -> fetch_assoc());
     ?>
    <div class="row justify-content-center"> 
            <table class="table">
                <thead>
                    <tr>
                         <th>Name:</th>
                        <th>Lastname:</th>
                        <th>Birthday:</th>
                        <th>Card</th>
                        <th>CardNumber</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result -> fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['birthday']; ?></td>
                            <td><?php echo $row['card']; ?></td>
                            <td><?php echo $row['cardNumber']; ?></td>
                            <td>
                                <a href="exercice4.php?edit=<?php echo $row['id'];?>"
                                    class="btn btn-info">Edit</a> 
                            
                            </td>
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
        <form action="exercice4Action.php" method="POST">
        	<input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div  style="width: 30%;height: 30%;position: relative;margin-left: auto;margin-right: auto;">
                <div class="form-group mb-2"> 
                    <label class="control-label" for="name">Name:</label>
                    <input type="text" id="name" required maxlength="48"  oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" 
                     name="name" class="form-control" value="<?php echo $name;?>" placeholder="Enter your Name"> 
                </div>
                <div class="form-group mb-2">
                    <label class="control-label" for="lastname">Lastname:</label>
                    <input type="text" id="lastname" required name="lastname" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                     maxlength="48" class="form-control" value="<?php echo $lastname;?>" placeholder="Enter your Lastname">
                </div>
                <div class="form-group mb-2"> 
                    <label class="control-label" for="birthday">Birthday:</label>
                    <input type="text" id="birthday" required maxlength="48"  
                     name="birthday" class="form-control" value="<?php echo $birthday;?>" placeholder="Enter your Date of Birthday"> 
                </div>
                <div class="form-group mb-2">
                    <label class="control-label"  for="card">Fidelity Card:</label>
                    <select class="form-select" name="card" id="card">
                        <option  value="<?php $card = true;
                                            echo $card;?>">Yes, I do</option>
                        <option  value="<?php $card = false;
                                            echo $card;?>">No, Thanks</option>
                    </select>
                </div>
                <div class="form-group mb-2"> 
                    <label class="control-label" for="cardNumber">cardNumber:</label>
                    <input type="text" id="cardNumber" required maxlength="48"  
                     name="cardNumber" class="form-control" value="<?php echo $cardNumber;?>" placeholder="Enter your cardNumber"> 
                </div>
                <div class="form-group">    
                    <?php 
                        if($update == true): ?>
                        <button type="submit"  class="btn btn-info" name="update">Update</button>
                        <?php else: ?>
                            <button type="submit"  class="btn btn-primary" name="save">Save</button>
                        <?php endif; ?>     
                </div>
            </div>
        </form>
      </div>
   </div> 
</body>
</html>
