<?php

session_start();
$mysqli = new mysqli('localhost','root','root','client') or die(mysqli_error($mysqli)); 
$name = '';
$id = 0;
$lastname= '';
$birthday='';
$card='true';
$cardNumber;
$update = false;

//save 
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $lastname= $_POST['lastname'];
    $birthday=$_POST['birthday'];
    $card = $_POST['card'];
    $cardNumber= $_POST['cardNumber'];
    //send messge after save
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    //return to main page
    header("location: exercice4.php");

    $mysqli ->query ("INSERT INTO users (name, lastname , birthday , card, cardNumber) VALUES('$name',' $lastname','$birthday', $card,$cardNumber)") or 
        die($mysqli -> error);
}


//edit
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result =  $mysqli ->query ("SELECT  * FROM users WHERE id=$id") or die($mysqli -> error());
    if(count($result) == 1){
        $row = $result ->fetch_array();
        $name = $row['name'];
        $lastname = $row['lastname'];
        $birthday = $row['birthday'];
        $card = $row['card'];
        $cardNumber = $row['cardNumber'];
    } 
}


//update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname= $_POST['lastname'];
    $birthday=$_POST['birthday'];
    $card = $_POST['card'];
    $cardNumber= $_POST['cardNumber'];
    $mysqli ->query ("UPDATE  users SET name='$name', lastname='$lastname',birthday='$birthday', card='$card',cardNumber='$cardNumber'
                     WHERE id=$id") or die($mysqli -> error);
    
    //send messge after update
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    
    header("location: exercice4.php");
    
}


?>