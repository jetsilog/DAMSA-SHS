<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon">
      <img src="img/logo/damsashsbg.png">
    </div>

    <?php if ($usertype == 'Administrator' || $usertype == 'Co-admin') { ?>
      <div class="sidebar-brand-text mx-3"><?php echo $usertype; ?></div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Features
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="far fa-fw fa-window-maximize"></i>
      <span>Files</span>
    </a>
    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Library files</h6>
        <a class="collapse-item" href="teacher.php">Faculty</a>
        <a class="collapse-item" href="studentprof.php">Students</a>
        <a class="collapse-item" href="track.php">Track</a>
        <a class="collapse-item" href="strand.php">Strand</a>
        <a class="collapse-item" href="subjects.php">Subjects</a>
        <a class="collapse-item" href="section.php">Sections</a>
        <a class="collapse-item" href="class.php">Classes</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-user"></i>
      <span>Accounts</span>
    </a>
    <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="studentacc.php">Student Accounts</a>
        <a class="collapse-item" href="teacheracc.php">Teacher Accounts</a>
        <?php if ($usertype == 'Co-admin') { ?>

        <?php } else { ?>
          <a class="collapse-item" href="adminacc.php">Admin Accounts</a>
        <?php } ?>
      </div>
    </div>
  </li>







  <li class="nav-item">
    <a class="nav-link collapsed" href="directenroll.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-users"></i>
      <span>Enrollees</span>
    </a>
  </li>



  <li class="nav-item">
    <a class="nav-link collapsed" href="checklist.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-check-square"></i>
      <span>Checklist</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Enlistment" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-calendar"></i>
      <span>Enlistment</span>
    </a>
    <div id="Enlistment" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="newstudenlistment.php">New Students</a>
        <a class="collapse-item" href="enlistmentcards.php">Cards</a>
        <a class="collapse-item" href="enlistment.php">Old Students</a>

      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Studgrade" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-award"></i>
      <span>Student Grades</span>
    </a>
    <div id="Studgrade" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="gradesadmin.php">Grades</a>
        <a class="collapse-item" href="awardeesview.php">Awardees</a>
        <a class="collapse-item" href="getaverage.php">Average per section</a>


      </div>
    </div>
  </li>



  <li class="nav-item">
    <a class="nav-link collapsed" href="schoolyear.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-graduation-cap"></i>
      <span>School Year</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="form137.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-file"></i>
      <span>Form 137</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="activitylog.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-history"></i>
      <span>Activity Log</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#archive" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-archive"></i>
      <span>Archive</span>
    </a>
    <div id="archive" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="student_archive.php">Student Archive</a>
        <a class="collapse-item" href="faculty_archive.php">Faculty Archive</a>



      </div>
    </div>
  </li>

<?php } else if ($usertype == 'Student') { ?>
  <div class="sidebar-brand-text mx-3"><?php echo $usertype; ?></div>
  </a>

  <li class="nav-item">
    <a class="nav-link collapsed" href="studentenlistment.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-calendar"></i>
      <span>Enlistment</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="stud_checklist.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-check-square"></i>
      <span>Checklist</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="genpdf.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-file-pdf"></i>
      <span>Generate</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="display_form137.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-file"></i>
      <span>Form137</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="student_sched.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-calendar"></i>
      <span>Schedule</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="adminprof.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-pen"></i>
      <span>Account</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="changepass.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-cog"></i>
      <span>Change Password</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="studentownprofile.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-user"></i>
      <span>Profile</span>
    </a>
  </li>
<?php } else { ?>
  <div class="sidebar-brand-text mx-3"><?php echo $usertype; ?></div>
  </a>

  <li class="nav-item">
    <a class="nav-link collapsed" href="teacherclass.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-calendar"></i>
      <span>Classes</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="adminprof.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-pen"></i>
      <span>Account</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="changepass.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-cog"></i>
      <span>Change Password</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="teacherownprofile.php" aria-expanded="true" aria-controls="collapseForm">
      <i class="fa fa-user"></i>
      <span>Profile</span>
    </a>
  </li>
<?php } ?>
</ul>