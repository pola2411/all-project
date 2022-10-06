<?php
include './connection.php';
include "../shared/head.php";
  

    if(isset($_GET['id'])){
        $dip_id = $_GET['id'];
      $user_id=$_SESSION['user']['id'];

      $s_student="SELECT * FROM `student_all_accepted` where student_id=$user_id";
      $q=mysqli_query($con,$s_student);
      $num=mysqli_num_rows($q);
     
      
        
        if($num==0){
        $insert = "INSERT INTO `diploma_with_student` VALUES (NULL,$dip_id,$user_id,default)";
        mysqli_query($con , $insert);
        echo "<script> window.location.replace('/instant/user/') </script>
        ";
        }
        else{
            echo "<script>
            alert('you are booking diploma aready ')
            
            </script>";
            echo "<script> window.location.replace('/instant/user/') </script>
            ";

        }
        
    }

?>