<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/Sidebar.php";
include "../general/connection.php";
include "../general/function.php";
$id = $_SESSION['user']['id'];



?>
<div class="home-profile">
    <div class="title-home">
        <i class="fa-solid fa-user"></i>
        <h2>Members</h2>
    </div>

    <div class="members">
        <div class="instructor">
            <div class="title-instructor">
                <h2>Instructor</h2>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="data">
                <img src="/instant/user/image/p2.jpg" alt="">
                <h2> Ahmed S.Elfran </h2>
            </div>
        </div>
        <div class="student">
            <div class="title-student">
                <h2>Student</h2>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="data">
                <img src="/instant/user/image/p2.jpg" alt="">
                <h2> Ahmed S.Elfran </h2>
            </div>
            <div class="data">
                <img src="/instant/user/image/p2.jpg" alt="">
                <h2> Ahmed S.Elfran </h2>
            </div>
            <div class="data">
                <img src="/instant/user/image/p2.jpg" alt="">
                <h2> Ahmed S.Elfran </h2>
            </div>
            <div class="data">
                <img src="/instant/user/image/p2.jpg" alt="">
                <h2> Ahmed S.Elfran </h2>
            </div>
        </div>
    </div>
</div>






<?php
include "../shared/script.php"
?>