<?php

session_start();
$mysqli = new mysqli('localhost','root','root','client') or die(mysqli_error($mysqli)); 
$title;
$performer;
$date;
$showTypesId;
$firstGenresId;
$secondGenreId;
$duration;
$startTime;

//save 
if(isset($_POST['save'])){
    $title= $_POST['title'];
    $performer= $_POST['performer'];
    $date= $_POST['date'];
    $showTypesId= $_POST['showTypesId'];
    $firstGenresId= $_POST['firstGenresId'];
    $secondGenreId= $_POST['secondGenreId'];
    $duration= $_POST['duration'];
    $startTime= $_POST['startTime'];
    

    
    //send messge after save
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    //return to main page
    header("location: exercice3.php");

    $mysqli ->query ("INSERT INTO shows (title,performer,date,showTypesId,firstGenresId,secondGenreId,duration,startTime ) 
                    VALUES('$title', '$performer', '$date', $showTypesId, $firstGenresId, $secondGenreId, $duration, $startTime)") or 
        die($mysqli -> error);
    
        

}





?>