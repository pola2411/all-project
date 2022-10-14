<?php
if (isset($_GET['sign_out'])) {
  session_unset();
  session_destroy();
}
if (isset($_SESSION['admin'])) {
  $email=$_SESSION['admin']['email'];
  $name=$_SESSION['admin']['name'];
  $image = "/instant/admin-panel/admin/upload/" . $_SESSION['admin']['image'];
  $user="admin";
}
if (isset($_SESSION['instractor'])) {
  $email=$_SESSION['instractor']['email'];
  $name=$_SESSION['instractor']['name'];
  $image = "/instant/admin-panel/instractor/upload/" . $_SESSION['instractor']['image'];
  $user="instractor";
}
?>
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="#" class="logo d-flex align-items-center">
      <!-- <img src="/instant/admin-panel/assets/img/logo.png" alt=""> -->
      <span class="d-none d-lg-block">Instant</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

    

     

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= $image ?>" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= $email ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= $email ?></h6>
            <span><?= $user ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

     
          <li>
            <hr class="dropdown-divider">
          </li>

      
          <li>
            <hr class="dropdown-divider">
          </li>

         
          <li>
            <hr class="dropdown-divider">
          </li>

          <form action="">
            <li>
              <button name="sign_out" class="sign_btn btn btn-danger"> <span class="sign">Sign Out </span><i class="bi bi-box-arrow-right"></i> </button>
            </li>
          </form>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->