<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/Sidebar.php";
include "../general/connection.php";
include "../general/function.php";
$id=$_SESSION['user']['id'];
$s = "SELECT  material.id,material.title ,material.content,material.link, material.created_at ,instractor.name,groups.id as group_id,groups.status,groups.days FROM `material` JOIN instractor ON material.instractor_id=instractor.id JOIN groups ON material.group_id JOIN student_all_accepted on groups.id=student_all_accepted.group_id WHERE student_all_accepted.student_id=$id ";
$q_s = mysqli_query($con, $s);
?>

<div class="home-profile">
    <div class="title-home">
        <i class="fa-solid fa-user-graduate"></i>
        <h2>Material Courses</h2>
    </div>
    <div class="img-bg">
        <h2> Fullstack Sat-Tue </h2>
    </div>
    <!-- =========================== material ===================== -->
    <?php foreach($q_s as $data){ ?>
    <div class="material">
        <div class="post">
            <div class="post-title">
                <i class="fa-sharp fa-solid fa-file-invoice"></i>
                <div class="title">
                    <h2><?= $data['title'] ?></h2>
                    <p><span class="time"></span> <span class="date"><?= $data['created_at'] ?></span></p>
                </div>
            </div>
            <div class="post-content">
                <p><?= $data['content'] ?> 
                </p>
                <div class="link">
                    <a href="<?= $data['link'] ?>"><?= $data['link'] ?></a>
                </div>
            </div>
        </div>
        <div class="all-comment">
            <div class="count-comment">
                <i class="fa-solid fa-user-group"></i>
                <p>4 comment</p>
            </div>

            <div class="comment">
                <div class="head-comment">
                    <div class="img-comment">
                        <img src="/instant/user/image/p2.jpg" alt="">
                        <div class="name">
                            <h2>Ahmed S.elfran</h2>
                            <p><span class="time">Time:12:44 </span> <span class="date"> Date:22-10-2022</span></p>
                        </div>
                    </div>
                    <i class="fa-solid fa-align-justify"></i>
                </div>
                <div class="post-content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    veniam pariatur et sed minus obcaecati Veritatis nihil 
                    amet dignissimos distinctio necessitatibus nostrum voluptas 
                </p>
                <div class="link">
                    <a href="https://www.facebook.com/a7med.elfran/">https://www.facebook.com/a7med.elfran/</a>
                </div>
            </div>
            </div>

            <div class="comment">
                <div class="head-comment">
                    <div class="img-comment">
                        <img src="/instant/user/image/p2.jpg" alt="">
                        <div class="name">
                            <h2>Ahmed S.elfran</h2>
                            <p><span class="time">Time:12:44 </span> <span class="date"> Date:22-10-2022</span></p>
                        </div>
                    </div>
                    <i class="fa-solid fa-align-justify"></i>
                </div>
                <div class="post-content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    veniam pariatur et sed minus obcaecati Veritatis nihil 
                    amet dignissimos distinctio necessitatibus nostrum voluptas 
                </p>
                <div class="link">
                    <a href="https://www.facebook.com/a7med.elfran/">https://www.facebook.com/a7med.elfran/</a>
                </div>
            </div>
            </div>
            <div class="add-comment">
                <img src="/instant/user/image/p2.jpg" alt="">
                <form>
                    <input type="text" placeholder="add comment ">
                    <button><i class="fa-solid fa-paper-plane"></i></button>
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