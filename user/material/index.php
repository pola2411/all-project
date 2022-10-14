<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/Sidebar.php";
include "../general/connection.php";
include "../general/function.php";
$id = $_SESSION['user']['id'];
$s = "SELECT  material.id,material.title ,material.content,material.link, material.created_at ,instractor.name,groups.id as group_id,groups.status,groups.days FROM `material` JOIN instractor ON material.instractor_id=instractor.id JOIN groups ON material.group_id JOIN student_all_accepted on groups.id=student_all_accepted.group_id WHERE student_all_accepted.student_id=$id ";
$q_s = mysqli_query($con, $s);

$s_diploma = "SELECT * FROM `student_all_accepted` JOIN groups ON student_all_accepted.group_id=groups.id JOIN diplomas
ON groups.diploma_id=diplomas.id JOIN track on diplomas.track_id=track.id WHERE student_all_accepted.student_id=$id";
$q_s_diploma = mysqli_query($con, $s_diploma);
$row_diploma = mysqli_fetch_assoc($q_s_diploma);



if(isset($_POST['send'])){
    $m_id=$_POST['send'];
    $content=$_POST['content'];

$i="INSERT INTO `comments`VALUES (null,$m_id,$id,'$content',default)";
$q_i=mysqli_query($con,$i);
}


?>

<div class="home-profile ">
    <div class="title-home">
        <i class="fa-solid fa-user-graduate"></i>
        <h2>Material Courses</h2>
    </div>

    <div class="img-bg">
        
        <h2><?= $row_diploma['title'] ?></h2>
    </div>
    <!-- =========================== material ===================== -->
    <?php foreach ($q_s as $data) { ?>
        <div class="material ">
            <div class="post">
                <div class="post-title">
                    <i class="fa-sharp fa-solid fa-file-invoice"></i>
                    <div class="title">
                        <h2><?= $data['title'] ?></h2>
                        <p><span class="time"></span> <span class="date"><?= $data['created_at'] ?></span></p>
                    </div>
                </div>
                <div class="post-content">
                    <p>aaaaaaaaaaaaaaaaaaa<?= $data['content'] ?>
                    </p>
                    <div class="link">
                        <a href="<?= $data['link'] ?>"><?= $data['link'] ?></a>
                    </div>
                </div>
            </div>
            <div class="all-comment">
                <?php 
                $count_id=$data['id'];
                $count="SELECT COUNT(id) AS c FROM `comments` WHERE material_id=$count_id ";
                $q_count=mysqli_query($con,$count);
                foreach($q_count as $data2){
                ?>
                <div class="count-comment">
                    <i class="fa-solid fa-user-group"></i>
                    <p> <?= $data2['c'] ?> comment</p>
                </div>

                <?php
                }
                $c_id=$data['id'];
                $s_coment="SELECT  `create_time`,`material_id`, `student_accept`, `content`,student.first_name,student.last_name,student.image FROM `comments` JOIN student ON comments.student_accept=student.id WHERE material_id=$c_id";
                $q_s_c=mysqli_query($con,$s_coment); 
                
                foreach($q_s_c as $data1){ ?>

                <div class="comment">
                    <div class="head-comment">
                        <div class="img-comment">
                            <img src="/instant/user/upload/<?= $data1['image'] ?>" alt="">
                            <div class="name">
                                <h2><?= $data1['first_name'] ?> <?= $data1['last_name'] ?></h2>
                                <p><span class="time"> </span> <span class="date"> <?= $data1['create_time'] ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <p><?= $data1['content'] ?>
                        </p>
                    </div>
                </div>
                    <?php }
                    $img=$_SESSION['user']['image'];
                    ?>

                
                <div class="add-comment">
                    <img src="/instant/user/upload/<?= $img ?>" alt="">
                    <form method="POST">
                        <input type="text" name="content" placeholder="add comment ">
                        <button name="send" value="<?= $data['id'] ?>"><i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- =========================== material ===================== -->


</div>
















<?php
include "../shared/script.php"
?>