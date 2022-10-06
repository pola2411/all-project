<?php
include './connection.php';

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($_POST['user']=="admin"){
        $select="SELECT * FROM `admin` WHERE `email`= '$email' and `password`= $password";
        $result=mysqli_query($con , $select);
        $num = $result->num_rows;
        if($num>0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['admin']=[
                "id"=> $row['id'],
                "email"=> $row['email'],
                "role"=> $row['role_id'],
                "image"=> $row['image']
            ];
            echo "<script>
            window.location.replace('/instant/admin-panel/index.php')
            </script>
            ";
        }else{
            // go('login.php');
            echo "error";
        }
    }
    if($_POST['user']=="instractor"){
        $select="SELECT * FROM `instractor` where email='$email' and `password`=$password";
        $result=mysqli_query($con , $select);
        $num = $result->num_rows;
        if($num>0){
            $row = mysqli_fetch_assoc($result);
          
            $_SESSION['instractor']=[
                "id"=> $row['id'],
                "email"=> $row['email'],
                "name"=> $row['name'],
                "phone"=> $row['phone'],
                "address"=> $row['address'],
                "image"=> $row['image']
            ];
            echo "<script>
            window.location.replace('/instant/admin-panel/index.php')
            </script>
            ";
           
        }else{
            go('login.php');
        }
    }
}
?>