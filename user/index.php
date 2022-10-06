<?php
include "./shared/head.php";
include "./shared/header.php";
include "./shared/Sidebar.php";
include "./general/connection.php";
include "./general/function.php";
?>
<div class="home-profile" id="home">
    <div class="title-home">
        <i class="fa-solid fa-house"></i>
        <h2>Instant Courses</h2>
    </div>
    <div class="hero-features">
        <div class="single-hero-feature-One">
            <i class="fa-solid fa-graduation-cap"></i>
            <h5>+2000 Developer</h5>
            <div class="round-1"></div>
            <div class="round-2"></div>
        </div>
        <div class="single-hero-feature-two">
            <i class="fa-solid fa-chalkboard"></i>
            <h5>2 Months Training</h5>
            <div class="round-1"></div>
            <div class="round-2"></div>
        </div>
        <div class="single-hero-feature-three">
            <i class="fa-solid fa-chalkboard-user"></i>
            <h5>Qualified Instructors</h5>
            <div class="round-1"></div>
            <div class="round-2"></div>
        </div>
        <div class="single-hero-feature-four">
            <i class="fa-solid fa-earth-americas"></i>
            <h5>Online , Offline</h5>
            <div class="round-1"></div>
            <div class="round-2"></div>
        </div>
    </div>
    <div class="Services">
        <h2> Courses</h2>
        <div class="line"></div>
        <div class="container">

            <div class="card-services row">
                <?php
                $select = "SELECT `diplomas`.`id` dipId , `diplomas`.`price` price , `diplomas`.`start_time` dipStart , `diplomas`.`period` dipPeriod ,
                `diplomas`.`dip_image` dipImage , `content`.`description` content , `track`.`title` track FROM `diplomas` INNER JOIN `content` ON `diplomas`.`content_id`= `content`.`id`
                INNER JOIN `track` ON `diplomas`.`track_id` = `track`.`id` ORDER BY dipId ASC";
                $result = mysqli_query($con , $select);
                // $row = mysqli_fetch_assoc($result);
                foreach($result as $data){
                    $id = $data['dipId'];
                    $track = $data['track'];
                    $price = $data['price'];
                    $start = $data['dipStart'];
                    $period = $data['dipPeriod'];
                    $image = $data['dipImage'];
                ?>
                <!-- start diploma -->
                <div class="card-body col-3">
                    <div class="img-top">
                        <img src="/instant/admin-panel/diploma/<?= $image ?>" alt="">
                    </div>
                    <div class="content-body">
                        <h4><?= $track ?></h4>
                        <p>Price : <?= $price ?></p>
                        <p> Start at :<?= $start ?></p>
                        <p>Duration : <?= $period ?></p>
                    </div>
                    <button type="button" data-toggle="modal" data-target="#exampleModal<?= $id ?>">
                        <h6>booking</h6>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure about booking</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h6>name diploma <?= $id ?></h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-model" data-dismiss="modal">Close</button>
                                    <a href="/instant/user/general/book.php?id=<?= $id ?>" class="btn btn-model">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end model -->
                </div>
                <!-- end diploma -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
include "./shared/script.php"
?>