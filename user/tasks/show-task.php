<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/Sidebar.php";
include "../general/connection.php";
include "../general/function.php";

$id = $_GET['task_id'];
$stud_id = $_SESSION['user']['id'];

$s = "SELECT tasks.id,tasks.title as task_name,tasks.deadline,tasks.content,tasks.group_id,tasks.created_at,track.title as tr_title,groups.status ,groups.id as group_id FROM `tasks` JOIN groups on tasks.group_id=groups.id JOIN diplomas on groups.diploma_id=diplomas.id JOIN track on diplomas.track_id=track.id  WHERE tasks.id=$id";
$q_s = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($q_s);
$errors=[];



if (isset($_POST['send'])) {
    
    $title = $_POST['link'];
    if( trim($title)==""){
        $errors[]="plase enter link";
    }
    if(empty($errors)){
    
    $i = "INSERT INTO `task_rate`(`id`, `task_id`, `student_id`, `assignment`, `rate`) VALUES (NULL,$id,$stud_id,'$title',default)";
    $q_i = mysqli_query($con, $i);
    }}

    if (isset($_POST['update'])) {
        
        $title = $_POST['link'];
        if( trim($title)==""){
            $errors[]="plase enter link";
        }
        if(empty($errors)){
        
        $u= "UPDATE `task_rate` SET `assignment`='$title' WHERE task_id=$id";
        $q_u= mysqli_query($con, $u);
        }
}

$s_t = "SELECT `id`, `task_id`, `student_id`, `assignment`, `rate` FROM `task_rate` WHERE student_id=$stud_id AND task_id=$id";
$q_s_t = mysqli_query($con, $s_t);
$r = mysqli_fetch_assoc($q_s_t);
$nu = mysqli_num_rows($q_s_t);

?>

<div class="home-profile">
    <div class="title-home">
        <i class="fa-sharp fa-solid fa-file-invoice"></i>
        <h2> Show Task</h2>
    </div>
    <!-- =========== tasks =============== -->
    <div class="show">
        <div class="task-show">
            <div class="title-task">
                <i class="fa-sharp fa-solid fa-file-invoice"></i>
                <div class="title-assi">
                    <h2><?= $row['task_name'] ?></h2>
                    <p><span class="time"><?= $row['created_at'] ?> </span> --- <span class="date"><?= $row['deadline'] ?> </span></p>
                </div>
            </div>
            <div class="task-content">
                <p><?= $row['content'] ?></p>
            </div>
        </div>
        <div class="add-assi">
            <h2>YOUR WORK</h2>
            <form method="POST">
                <input type="text" name="link">
                <?php if($nu == 0){ ?>
                
                <button name="send"><i class="fa-solid fa-plus"></i> add assignment</button>
                    <?php } else { ?>
                        <button name="update"><i class="fa-solid fa-plus"></i> edit assignment</button>
                        <?php }?>
            </form>
        </div>
    </div>
    <div class="my-task">
        <div class="my-task-title">
            <i class="fa-brands fa-github"></i>
            <h2> Link GitHub </h2>
        </div>
        <div class="my-task-link">
            <?php if ($nu == 0) { ?>
                <a href="">not send</a>
            <?php } else { ?>

                <a href="<?= $r['assignment'] ?>"><?= $r['assignment'] ?></a>
            <?php } ?>
        </div>
    </div>
</div>

<?php
include "../shared/script.php"
?>