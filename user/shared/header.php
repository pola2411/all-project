<?php 

if(isset($_GET['log_out'])){

    session_unset();
    session_destroy();
}

?>

<div class="navbar">
        <ul>
            <li class="nav-left">
                <i class="fa-solid fa-bars-staggered" id="btn-opne"></i>
                <div class="searsh">
                    <input type="search" placeholder="Search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </li>
            <li class="nav-right">
                <i class="fa-regular fa-message"></i>
                <i class="fa-regular fa-bell"></i>
                <form action="">
                <Button name="log_out" > <i class="fa-solid fa-power-off"></i></Button>
                </form>
                
            </li>
        </ul>
    </div>