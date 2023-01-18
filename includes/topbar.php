<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
  <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>
  <ul class="navbar-nav ml-auto">


    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
        if ($rows['Image'] != '') {
          echo '<img class="img-profile rounded-circle" src="data:image/jpeg;base64,' . base64_encode($rows[5]) . '"style="max-width: 60px">';
        } else { ?>

          <img src="img/default-user.png" alt="Image" class="img-profile rounded-circle" style="max-width: 60px" />

        <?php } ?>
        <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $accountname; ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <?php if ($usertype == 'Administrator' || $usertype == 'Co-admin') { ?>
          <a class="dropdown-item" href="adminprof.php">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Account profile
          </a>


          <div class="dropdown-divider"></div>
        <?php } ?>
        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>



<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to logout?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
        <a href="includes/logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>