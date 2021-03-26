<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   
</head>
  

<body>
     <?php require_once 'exercice3Action.php'; ?>
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
           $result =$mysqli -> query("select * from shows ") or die(mysqli_error($mysqli));
            //pre_r($result);
         //pre_r( $result -> fetch_assoc());
     ?>
    <div class="row justify-content-center"> 
           <h1>Show</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>performer</th>
                        <th>date</th>
                        <th>showTypesId</th>
                        <th>firstGenresId</th>
                        <th>secondGenreId</th>
                        <th>duration</th>
                        <th>startTime</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result -> fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['performer']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['showTypesId']; ?></td>
                            <td><?php echo $row['firstGenresId']; ?></td>
                            <td><?php echo $row['secondGenreId']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
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
     <div class="row justify-content-center">
        <form action="exercice3Action.php" method="POST">
            <div  style="width: 30%;height: 30%;position: relative;margin-left: auto;margin-right: auto;">
                <div class="form-group mb-2"> 
                    <label class="control-label" for="title">title:</label>
                    <input type="text" id="title" required maxlength="48"  
                     name="title" class="form-control" value="<?php echo $title;?>" placeholder="Enter the title"> 
                </div>
                <div class="form-group mb-2">
                    <label class="control-label" for="performer">performer:</label>
                    <input type="text" id="performer" required name="performer" 
                     maxlength="48" class="form-control" value="<?php echo $performer;?>" placeholder="Enter the performer of  the show">
                </div>
                 <div class="form-group mb-2"> 
                    <label class="control-label" for="date">date:</label>
                    <input type="text" id="date" required maxlength="48" 
                     name="date" class="form-control" value="<?php echo $date;?>" placeholder="Enter the date of the Show yyyy/mm/dd"> 
                </div>
                <div class="form-group mb-2">
                    <label class="control-label" for="showTypesId">showTypesId:</label>
                    <input type="text" id="showTypesId" required name="showTypesId" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                     maxlength="48" class="form-control" value="<?php echo $showTypesId;?>" placeholder="Enter the showTypesId ">
                </div>
                <div class="form-group mb-2"> 
                    <label class="control-label" for="firstGenresId">firstGenresId:</label>
                    <input type="text" id="firstGenresId" required maxlength="48"  oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" 
                     name="firstGenresId" class="form-control" value="<?php echo $firstGenresId;?>" placeholder="Enter the  firstGenresId"> 
                </div>
                <div class="form-group mb-2">
                    <label class="control-label" for="secondGenreId">secondGenreId:</label>
                    <input type="text" id="secondGenreId" required name="secondGenreId" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                     maxlength="48" class="form-control" value="<?php echo $secondGenreId;?>" placeholder="Enter secondGenreId">
                </div>
                <div class="form-group mb-2"> 
                    <label class="control-label" for="duration">duration:</label>
                    <input type="text" id="duration" required maxlength="48"  
                     name="duration" class="form-control" value="<?php echo $duration;?>" placeholder="Enter  the duration of Show"> 
                </div>
                <div class="form-group mb-2">
                    <label class="control-label" for="startTime">startTime:</label>
                    <input type="text" id="startTime" required name="startTime"
                     maxlength="48" class="form-control" value="<?php echo $startTime;?>" placeholder="Enter the startTime of the show">
                </div>
                <div class="form-group">    
                    <button type="submit"  class="btn btn-primary" id="save" name="save">Save</button>      
                </div>
            </div>
        </form>
      </div>
</body>
</html>
