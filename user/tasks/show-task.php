<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/Sidebar.php";
include "../general/connection.php";
include "../general/function.php";
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
                    <h2>Assignment 1</h2>
                    <p><span class="time">Time:12:44 </span> <span class="date"> Date:22-10-2022</span></p>
                    <div class="task-content">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis delectus alias, numquam aliquam quia voluptatibus et quaerat, harum, sunt sapiente ullam non expedita odit facere aspernatur consequatur provident eveniet necessitatibus saepe? Dolor quas maxime animi obcaecati numquam omnis est voluptate?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="add-assi">
            <h2>YOUR WORK</h2>
            <form>
                <input type="file">
                <button><i class="fa-solid fa-plus"></i> add assignment</button>
            </form>
        </div>
    </div>
    <div class="my-task">
        <div class="my-task-title">
            <i class="fa-brands fa-github"></i>
            <h2> Link GitHub </h2>
        </div>
        <div class="my-task-link">
            <a href="https://www.facebook.com/a7med.elfran/">https://www.facebook.com/a7med.elfran/</a>
        </div>
    </div>
</div>

<?php
include "../shared/script.php"
?>