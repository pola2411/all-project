<?php
include './connection.php';
include './function.php';
session_start();
if(isset($_SESSION['user'])){
    if(isset($_GET['id'])){
        $dip_id = $_GET['id'];
        $std_id = $_SESSION['user']['id'];
        
        $insert = "INSERT INTO `diploma_with_student` VALUES (NULL,$dip_id,$std_id,default)";
        mysqli_query($con , $insert);
        go("index.php");
    }
}
?>