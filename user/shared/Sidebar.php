<div class="Sidebar">
<button class="nav-toggle-btn" id="nav-toggle-close"><i class="fa-solid fa-xmark"></i></button>
        <!-- -------- img and name ------------ -->
        <div class="img-Sidebar">
            <div class="back-img-xl">
                <div class="back-animate">
                </div>
                <div class="back-img-lg">
                    <img src="/instant/user/upload/<?= $_SESSION['user']['image']?> " alt="">
                </div>
            </div>
            <div class="name-profile">
                <h1><?= $_SESSION['user']['first_name']?> <?=$_SESSION['user']['last_name']?></h1>
                <p>full stack developer</p>
            </div>
        </div>
        <!-- -------- links -------------->
        <div class="Sidebar-links">
            <ul>
                <li><a href="/instant/user/"><i class="fa-solid fa-house"></i> <span>Instant</span></a></li>
                <li><a href="/instant/user/material/"><i class="fa-solid fa-user-graduate"></i> <span>material</span></a></li>
                <li><a href="/instant/user/tasks/"><i class="fa-sharp fa-solid fa-file-invoice"></i> <span>Tasks</span></a></li>
                <li><a href="/instant/user/members/"><i class="fa-solid fa-user"></i> <span>Members</span></a></li>
                <li><a href="/instant/user/contact/"><i class="fa-solid fa-headphones"></i> <span>Contact</span></a></li>
            </ul>
        </div>
</div>