<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/Sidebar.php";
include "../general/connection.php";
include "../general/function.php";
$id=$_SESSION['user']['id'];
$s="SELECT  tasks.id as id,tasks.title as task_name,track.title as tr_title,groups.status ,groups.id as group_id  FROM `tasks` JOIN groups on tasks.group_id=groups.id JOIN diplomas on groups.diploma_id=diplomas.id JOIN track on diplomas.track_id=track.id JOIN student_all_accepted on student_all_accepted.group_id=groups.id WHERE student_all_accepted.student_id=$id";
$s_q=mysqli_query($con,$s);
?>
<div class="home-profile">
    <div class="title-home">
        <i class="fa-sharp fa-solid fa-file-invoice"></i>
        <h2>Tasks</h2>
    </div>
    <!-- =========== tasks =============== -->
    <?php foreach($s_q as $data){ ?>
    <div class="tasks">
        <div class="title-task">
            <i class="fa-sharp fa-solid fa-file-invoice"></i>
            <h2><?= $data['task_name'] ?></h2>
        </div>
        <div class="btn-showtask">
            <a href="/instant/user/tasks/show-task.php?task_id=<?= $data['id'] ?>">Show Task</a>
        </div>
    </div>
    <?php } ?>
    <!-- =========== tasks =============== -->



</div>    

<?php
include "../shared/script.php"
?>