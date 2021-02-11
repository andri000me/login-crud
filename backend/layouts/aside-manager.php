<?php
if ($level['id'] <> 2) {
  header('location: ../logout.php');
} else { ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?= $abs; ?>/assets/logo.png" alt="Morillo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Morillo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if ($img_profile) {
            $img_profile=$abs."/assets/uploads/images/user/".$sesi['acak']."-1.jpg";
          } else {
            $img_profile=$abs."/assets/logo.png";
          }
          ?>
          <img src="<?=$img_profile;?>" class="img-circle elevation-2" alt="<?= $sesi['username']; ?>">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $sesi['nama_pengguna']; ?>/<?= $level['nama']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header"><?= $level['nama']; ?></li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= $abs; ?>/backend/pages/index.php?page=level" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level</p>
                  </a>
                </li>
              </ul>
            </li> -->
              <li class="nav-item">
                <a href="<?= $abs; ?>/backend/pages/index.php?page=main-menu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Menu</p>
                </a>
              </li>

              <!-- <li class="nav-item">
              <a href="<?= $abs; ?>/backend/pages/index.php?page=user" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li> -->

              <!-- <li class="nav-item">
              <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey-methods" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Site Survey Methods</p>
              </a>
            </li> -->
              <!-- <li class="nav-item">
              <a href="<?= $abs; ?>/backend/pages/index.php?page=job-methods" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Job Methods</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $abs; ?>/backend/pages/index.php?page=job-status" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Job Status</p>
              </a>
            </li> -->
              <li class="nav-item">
                <a href="<?= $abs; ?>/backend/pages/index.php?page=customers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $abs; ?>/backend/pages/index.php?page=site-survey" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Survey</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $abs; ?>/backend/pages/index.php?page=req-material" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Material Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $abs; ?>/backend/pages/index.php?page=req-survey" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Survey Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $abs; ?>/backend/pages/index.php?page=projects" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <!-- <li class="nav-item">
              <a href="<?= $abs; ?>/backend/pages/index.php?page=projects-progress" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Progress</p>
              </a>
            </li> -->
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php } ?>