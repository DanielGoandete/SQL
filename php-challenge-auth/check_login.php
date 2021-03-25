<?php
//Check if credentials are valid




$mysqli = new mysqli('localhost','root','root','challenge_auth') or die(mysqli_error($mysqli)); 
$username = '';
$password = '';



//edit
if(isset($_POST['button'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result =  $mysqli ->query ("SELECT  * FROM user WHERE username='$username'") or die($mysqli -> error());
    
    if($result->fetch_assoc() == true){
       header("location: logged.php");
    }else{
        header("location: problem.php");
     }
    
  
}




?>
