<?php

session_start();
$mysqli = new mysqli('localhost','root','root','colyseum') or die(mysqli_error($mysqli)); 
$clientId = '';
$price;
$id = 0;

$update = false;

//save 
if(isset($_POST['save'])){
    $price = $_POST['price'];
    $bookingsId = $_POST['bookingsId'];
   
    //send messge after save
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    //return to main page
    header("location: exercice9.php");

    $mysqli ->query ("INSERT INTO tickets (price,bookingsId) VALUES($price,$bookingsId)") or 
        die($mysqli -> error);
}

//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    
    $mysqli ->query ("DELETE FROM tickets WHERE id=$id") or die($mysqli -> error());
    
    //send messge after delete
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    
    //return to main page
    header("location: exercice9.php");
}




//edit
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result =  $mysqli ->query ("SELECT  * FROM tickets WHERE id=$id") or die($mysqli -> error());
    if(count($result) == 1){
        $row = $result ->fetch_array();
        $price = $row['price'];
        $bookingsId= $row['bookingsId'];
      
    } 
}


//update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $price = $_POST['price'];
    $bookingsId = $_POST['bookingsId'];
    
    $mysqli ->query ("UPDATE  tickets SET price='$price',bookingsId='$bookingsId' WHERE id=$id") or die($mysqli -> error);
    
    //send messge after update
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    
    header("location: exercice9.php");
    
}


?>