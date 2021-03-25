<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  
    <?php require_once 'check_login.php'; ?>
    <?php $mysqli = new mysqli('localhost','root','root','challenge_auth') or die(mysqli_error($mysqli)); 
         $result =  $mysqli ->query ("SELECT  * FROM user") or die($mysqli -> error());
         //pre_r( $result  -> fetch_assoc());
     ?>
    
    <form action="check_login.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $id;?>"/>
      <div>
        <label for="username">username</label>
        <input type="text" name="username" id="username" value="<?php echo $username;?>">
      </div>
      <div>
        <label for="password">password </label>
        <input type="password" name="password" id="password" value="<?php echo $password;?>">
      </div>
      <div>
        <button type="submit" name="button" id="button">Se connecter</button>
      </div>
    </form>
    <?php
         

         function pre_r($array){
              echo '<pre>';
              print_r($array);
              echo '</pre>';
         }
   
   ?>
  </body>
</html>
