<?php

session_start();
$mysqli = new mysqli('localhost','root','root','client') or die(mysqli_error($mysqli)); 
$numero;
$type;


//save 
if(isset($_POST['save'])){
    $numero = $_POST['numero'];
    $type= $_POST['type'];

    
    //send messge after save
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    //return to main page
    header("location: exercice2.php");

    $mysqli ->query ("INSERT INTO cards (numero, type ) VALUES($numero, $type)") or 
        die($mysqli -> error);
    
        

}





?>