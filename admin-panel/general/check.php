<?php
include './connection.php';
include '../shared/head.php';
if (isset($_POST['login'])) {
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $new_password =sha1($password);
    if(isset($_POST['user'])){
        if ($_POST['user'] == "admin") {
            $select = "SELECT * FROM `admin` WHERE `email`= '$email' and `password`= '$new_password'";
            $result = mysqli_query($con, $select);
            $num = $result->num_rows;
            if ($num > 0) {
                $row = mysqli_fetch_assoc($result);
                
                $_SESSION['admin'] = [
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "email" => $row['email'],
                    "role" => $row['role_id'],
                    "image" => $row['image']
                ];
                echo "<script>
                window.location.replace('/instant/admin-panel/index.php')
                </script>
                ";
            } else {                
                echo "<script>
                window.location.replace('/instant/admin-panel/login.php')
                </script>
                ";
            }
        }
        if ($_POST['user'] == "instractor") {
            $select = "SELECT * FROM `instractor` where email='$email' and `password`='$new_password'";
            $result = mysqli_query($con, $select);
            $num = $result->num_rows;
            if ($num > 0) {
                $row = mysqli_fetch_assoc($result);
                
                $_SESSION['instractor'] = [
                    "id" => $row['id'],
                    "email" => $row['email'],
                    "name" => $row['name'],
                    "phone" => $row['phone'],
                    "address" => $row['address'],
                    "image" => $row['image']
                ];
                echo "<script>
                window.location.replace('/instant/admin-panel/index.php')
                </script>
                ";
            } else {
                echo "<script>
                window.location.replace('/instant/admin-panel/login.php')
                </script>
                ";
            }
        }
    }else {
        echo "<script>
        window.location.replace('/instant/admin-panel/login.php')
        </script>
        ";
    }
}