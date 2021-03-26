<?php

session_start();
$mysqli = new mysqli('localhost','root','root','client') or die(mysqli_error($mysqli)); 
$name = '';
$id = 0;
$lastname= '';
$birthday='';
$card='true';


//save 
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $lastname= $_POST['lastname'];
    $birthday=$_POST['birthday'];
    $card = $_POST['card'];
    
    //send messge after save
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    //return to main page
    header("location: exercice1.php");

    $mysqli ->query ("INSERT INTO user (name, lastname , birthday , card) VALUES('$name',' $lastname','$birthday', $card)") or 
        die($mysqli -> error);
}





?>