  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="/instant/admin-panel/index.php">
          <i class="bi bi-grid"></i>
          <span>HOME</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      <!-- admin -->
      <?php
      if (isset($_SESSION['admin'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#admin-nav1" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>ADMIN</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="admin-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <?php
            if ($_SESSION['admin']['role'] == 1) :
            ?>
              <li>
                <a href="/instant/admin-panel/admin/add.php">
                  <i class="bi bi-circle"></i><span>Add Admin</span>
                </a>
              </li>
            <?php endif; ?>
            <li>
              <a href="/instant/admin-panel/admin/list.php">
                <i class="bi bi-circle"></i><span>List Admin</span>
              </a>
            </li>
            <?php
            if ($_SESSION['admin']['role'] == 1) :
            ?>
              <li>
                <a href="/instant/admin-panel/role/add.php">
                  <i class="bi bi-circle"></i><span>Roles</span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- end admin -->

      <!-- instractor -->
      <?php
      if (isset($_SESSION['admin'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#instractor-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>INSTRACTOR</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="instractor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/instant/admin-panel/instractor/add.php">
                <i class="bi bi-circle"></i><span>Add Instractor</span>
              </a>
            </li>
            <li>
              <a href="/instant/admin-panel/instractor/list.php">
                <i class="bi bi-circle"></i><span>List Instractor</span>
              </a>
            </li>
            <li>
              <a href="/instant/admin-panel/track/add.php">
                <i class="bi bi-circle"></i><span>Track</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- End instractor Nav -->

      <!-- diploma -->
      <?php
      if (isset($_SESSION['admin'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#diploma-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>DIPLOMA</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="diploma-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/instant/admin-panel/diploma/add.php">
                <i class="bi bi-circle"></i><span>Add Diploma</span>
              </a>
            </li>
            <li>
              <a href="/instant/admin-panel/diploma/list.php">
                <i class="bi bi-circle"></i><span>List Diploma</span>
              </a>
            </li>
            <li>
              <a href="/instant/admin-panel/dip_with_instractor/add.php">
                <i class="bi bi-circle"></i><span>Diploma with Isntractor</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- End diploma Nav -->

      <!-- student -->
      <?php
      if (isset($_SESSION['admin'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>STUDENT</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/instant/admin-panel/student/list.php">
                <i class="bi bi-circle"></i><span>List All Student</span>
              </a>
            </li>
            <li>
              <a href="/instant/admin-panel/student/listAll.php">
                <i class="bi bi-circle"></i><span>List All Accepted</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- End student Nav -->

      <!-- groups -->
      <?php
      if (isset($_SESSION['admin'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#groups-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>GROUPS</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="groups-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/instant/admin-panel/groups/add.php">
                <i class="bi bi-circle"></i><span>Add group</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- End groups Nav -->

      <!-- material -->
      <?php
      if (isset($_SESSION['admin'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#material-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>MATERIAL</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="material-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/instant/admin-panel/material/add.php">
                <i class="bi bi-circle"></i><span>Add Material</span>
              </a>
            </li>
            <li>
              <a href="/instant/admin-panel/material/list.php">
                <i class="bi bi-circle"></i><span>List Material</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- End material Nav -->

      <!-- content -->
      <?php
      if (isset($_SESSION['admin'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#content-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>CONTENT</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="content-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/instant/admin-panel/content/add.php">
                <i class="bi bi-circle"></i><span>Add Content</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- End content Nav -->

      <!-- task -->
      <?php
      if (isset($_SESSION['instractor'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#task-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>TSAKS</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="task-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/instant/admin-panel/tasks/add.php">
                <i class="bi bi-circle"></i><span>Add Task</span>
              </a>
            </li>
            <li>
              <a href="/instant/admin-panel/tasks/list.php">
                <i class="bi bi-circle"></i><span>List Tasks</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- End task Nav -->

      <?php
      if (isset($_SESSION['instractor'])) :
      ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#task-rate-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>TSAKS RATE</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="task-rate-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
              <a href="/instant/admin-panel/task_rate/list.php">
                <i class="bi bi-circle"></i><span>List Tasks</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>

      <!-- <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li> -->
      <!-- End Profile Page Nav -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="/instant/admin-panel/massages/list.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li> -->
      <!-- End Contact Page Nav -->
    </ul>
    <span class="circle green"></span>
    <span class="circle red"></span>
  </aside><!-- End Sidebar-->