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
$update = false;

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


//edit
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result =  $mysqli ->query ("SELECT  * FROM shows WHERE id=$id") or die($mysqli -> error());
    if(count($result) == 1){
        $row = $result ->fetch_array();
        $title = $row['title'];
        $performer = $row['performer'];
        $date = $row['date'];
        $showTypesId = $row['showTypesId'];
        $firstGenresId = $row['firstGenresId'];
        $secondGenreId = $row['secondGenreId'];
        $duration = $row['duration'];
        $startTime = $row['startTime'];
    }
}


//update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title= $_POST['title'];
    $performer= $_POST['performer'];
    $date= $_POST['date'];
    $showTypesId= $_POST['showTypesId'];
    $firstGenresId= $_POST['firstGenresId'];
    $secondGenreId= $_POST['secondGenreId'];
    $duration= $_POST['duration'];
    $startTime= $_POST['startTime'];
    $mysqli ->query ("UPDATE  shows SET 
                        title='$title', performer='$performer', date= '$date', showTypesId= '$showTypesId' ,firstGenresId= '$firstGenresId' ,
                        secondGenreId= '$secondGenreId' , duration= '$duration' ,startTime= '$startTime' 
                     WHERE id=$id ")or die($mysqli -> error);
    
    //send messge after update
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    
    header("location: exercice5.php");
    
}



?>