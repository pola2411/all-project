<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/Sidebar.php";
include "../general/connection.php";
include "../general/function.php";
?>
<div class="home-profile">
    <div class="title-home">
        <i class="fa-solid fa-headphones"></i>
        <h2>Contact us</h2>
    </div>

    <div class="all-contact">
        <div class="content">
            <h5>Need information fill form and send us</h5>
            <form action="">
                <input type="text" placeholder="name" class="form-control">
                <input type="email" placeholder="email" class="form-control">
                <input type="text" placeholder="subject" class="form-control">
                <textarea rows="4" cols="71" placeholder="comment"></textarea>
                <button>Send</button>
            </form>
        </div>
        <div class="data-content">
            <div class="single-data">
                <i class="fa-solid fa-house"></i>
                <h6> 143 cairo eldoki </h6>
            </div>
            <div class="single-data">
                <i class="fa-solid fa-phone-flip"></i>
                <h6> +201554945711 </h6>
            </div>
            <div class="single-data">
                <i class="fa-solid fa-envelope"></i>
                <h6> hr@instant-ss.com </h6>
            </div>
        </div>
    </div>
</div>




<?php
include "../shared/script.php"
?>