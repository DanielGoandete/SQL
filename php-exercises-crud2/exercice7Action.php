<?php

session_start();
$mysqli = new mysqli('localhost','root','root','colyseum') or die(mysqli_error($mysqli)); 
$name = '';
$id = 0;
$lastname= '';
$birthday='';
$card='true';
$cardNumber;
$update = false;

//save 
if(isset($_POST['save'])){
    $name = $_POST['firstName'];
    $lastname= $_POST['lastName'];
    $birthday=$_POST['birthDate'];
    $card = $_POST['card'];
    $cardNumber= $_POST['cardNumber'];
    //send messge after save
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    //return to main page
    header("location: exercice7.php");

    $mysqli ->query ("INSERT INTO clients (firstName, lastName , birthDate , card, cardNumber) VALUES('$name',' $lastname','$birthday', $card,$cardNumber)") or 
        die($mysqli -> error);
}

//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    
    $mysqli ->query ("DELETE FROM clients WHERE id=$id") or die($mysqli -> error());
    
    //send messge after delete
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    
    //return to main page
    header("location: exercice7.php");
}




//edit
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result =  $mysqli ->query ("SELECT  * FROM clients WHERE id=$id") or die($mysqli -> error());
    if(count($result) == 1){
        $row = $result ->fetch_array();
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $birthDate = $row['birthDate'];
        $card = $row['card'];
        $cardNumber = $row['cardNumber'];
    } 
}


//update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['firstName'];
    $lastname= $_POST['lastName'];
    $birthday=$_POST['birthDate'];
    $card = $_POST['card'];
    $cardNumber= $_POST['cardNumber'];
    $mysqli ->query ("UPDATE  clients SET firstName='$name', lastName='$lastname',birthDate='$birthday', card='$card',cardNumber='$cardNumber'
                     WHERE id=$id") or die($mysqli -> error);
    
    //send messge after update
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    
    header("location: exercice7.php");
    
}


?>