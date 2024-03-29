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
  <title>Student Final Grade</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
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
            <h1 class="h3 mb-0 text-gray-800">Final Grades</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">Sections</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grade list</h6>

                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light" align="center">
                      <tr>
                        <th>Subject</th>
                        <th>Final Grade</th>


                      </tr>
                    </thead>
                    <tbody align="center">
                      <?php
                      $studlrn = $_GET['studlrn'];
                      $_SESSION['awardeelrn'] = $studlrn;
                      ?>
                      <?php $sum = 0; ?>
                      <?php $query = mysqli_query($conn, "SELECT * FROM grades INNER JOIN class ON grades.Class_ID=class.ClassCode INNER JOIN subjects ON class.Subject=subjects.ID WHERE grades.Stud_ID='$studlrn' AND grades.Schoolyear='$SYID'");

                      while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?= $rows['SubjectDescription'] ?></td>
                          <td><?php echo $rows['Final_Grade']; ?></td>

                          <?php
                          $final = $rows['Final_Grade'];
                          $sum += $final;
                          ?>
                        </tr>
                      <?php  } ?>

                      <tr>
                        <?php
                        $countsubject = mysqli_num_rows($query);
                        $average = $sum / $countsubject;
                        ?>

                        <td colspan="2" align="right"><?= "<b>" . "Average: " .  $average . "</b>"; ?></td>
                      </tr>
                      <tr>
                        <td colspan="3" align="right">
                          <form action="functions/get_average.php" method="POST">
                            <input type="hidden" name="average" value="<?= $average; ?>">
                            <input type="hidden" name="LRN" value="<?= $studlrn; ?>">

                            <button type="submit" name="submit" class="btn btn-primary">Finalize</button>

                          </form>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->



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

  <script src="vendor/jquery/jquery.min.js"></script>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

  <script type="text/javascript">
    function editxid(x) {
      $.post('functions/get_section.php', {
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
<?php include("includes/alerts.php"); ?>