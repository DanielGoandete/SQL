<?php

session_start();
$mysqli = new mysqli('localhost','root','root','colyseum') or die(mysqli_error($mysqli)); 
$clientId = '';
$id = 0;

$update = false;

//save 
if(isset($_POST['save'])){
    $clientId = $_POST['clientId'];
   
    //send messge after save
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    //return to main page
    header("location: exercice8.php");

    $mysqli ->query ("INSERT INTO bookings (clientId) VALUES($clientId)") or 
        die($mysqli -> error);
}

//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    
    $mysqli ->query ("DELETE FROM bookings WHERE id=$id") or die($mysqli -> error());
    
    //send messge after delete
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    
    //return to main page
    header("location: exercice8.php");
}




//edit
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result =  $mysqli ->query ("SELECT  * FROM bookings WHERE id=$id") or die($mysqli -> error());
    if(count($result) == 1){
        $row = $result ->fetch_array();
        $clientId = $row['clientId'];
      
    } 
}


//update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $clientId = $_POST['clientId'];
    
    $mysqli ->query ("UPDATE  bookings SET clientId=$clientId WHERE id=$id") or die($mysqli -> error);
    
    //send messge after update
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    
    header("location: exercice8.php");
    
}


?>