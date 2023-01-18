<?php include("includes/lock.php"); ?>
<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/damsashs.jpg" rel="icon">
  <title>Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php if ($usertype == 'Faculty' || $usertype == 'Student') {
?>


  <body id="page-top">
    <div id="wrapper">
      <!-- Sidebar -->

      <!-- Sidebar -->
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <!-- TopBar -->
          <br>
          <br>
          <br>
          <br><br>
          <br>
          <!-- Topbar -->

          <!-- Container Fluid-->
          <div class="container-fluid" id="container-wrapper">
            <div class="text-center">
              <img src="img/error.svg" style="max-height: 100px;" class="mb-3">
              <h3 class="text-gray-800 font-weight-bold">Oopss!</h3>
              <p class="lead text-gray-800 mx-auto">404 Page Not Found</p>

            </div>

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
                    <a href="login.html" class="btn btn-primary">LogOut</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Logout -->


          </div>
          <!---Container Fluid-->
        </div>
        <!-- Footer -->

        <!-- Footer -->
      </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


  </body>

</html>
<?php
  die();
}
?>

<body id="page-top">

  <?php
  // this api gets tvlcounts
  $json = file_get_contents("http://localhost/damsashs/_apiTVL.php/_getRequestTVL");
  $data = json_decode($json);

  // this api gets academictrack counts
  $_json = file_get_contents("http://localhost/damsashs/_apiAT.php/_getRequestAcademicTrack");
  $_data = json_decode($_json);
  ?>
  <input type="text" value="<?= $data->TVLcounts[0]; ?>" id="_piechart" hidden>
  <input type="text" value="<?= $_data->AcademicTrackCounts[0]; ?>" id="_piechart_AT" hidden>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include("includes/sidebar.php"); ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include("includes/topbar.php"); ?>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">

            </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
          <?php

          ?>
          <div class="row mb-3">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Faculty</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $result = mysqli_query($conn, "SELECT count(*) as totalfac from faculty");
                        $data = mysqli_fetch_assoc($result);

                        echo $data['totalfac']; ?>
                      </div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- <input type="text" value="maylamanako" id="hiddenValue" hidden> -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Students</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $result = mysqli_query($conn, "SELECT count(*) as totalstud from students");
                        $data = mysqli_fetch_assoc($result);

                        echo $data['totalstud']; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tracks</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $result = mysqli_query($conn, "SELECT count(*) as totaltrack from track");
                        $data = mysqli_fetch_assoc($result);

                        echo $data['totaltrack']; ?>
                      </div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book-open fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Strands</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $result = mysqli_query($conn, "SELECT count(*) as totalstra from strand");
                        $data = mysqli_fetch_assoc($result);

                        echo $data['totalstra']; ?>
                      </div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <div class="row">

            <!-- Bar Chart -->
            <div class="col-lg-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Student Enrolled Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>

                </div>
              </div>
            </div>
            <!-- Donut Chart -->
            <div class="col-lg-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Number of Student per Track</h6>
                </div>
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                  Delfin Albano(Magsaysay) Stand Alone Senior High School

                </div>
              </div>
            </div>

          </div>

        </div>
        <!---Container Fluid-->
      </div>


    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->

  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>





  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

  <script type="text/javascript">
    function editxid(x) {
      $.post('functions/get_track.php', {
          postid: x
        },
        function(data) {
          $('#result').html(data);
        });
    }
  </script>


  <script type="text/javascript">
    function deletexid(z) {
      document.getElementById("zid").value = z;

    }
  </script>



</body>

</html>