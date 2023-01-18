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
  <title>Checklist</title>
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
            <h1 class="h3 mb-0 text-gray-800">Checklist</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">Cheklist</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Subject list</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>Remarks</th>
                        <th>SubjectCode</th>
                        <th>Description</th>
                        <th>Semester</th>
                        <th>Prerequisite</th>
                        <th>FirstGrade</th>
                        <th>SecondGrade</th>
                        <th>ThirdGrade</th>
                        <th>FinalGrade</th>
                        <th>Teacher</th>




                      </tr>
                    </thead>
                    <tbody>
                      <?php $querystud = mysqli_query($conn, "SELECT * FROM students WHERE StudentID='$username'");
                      $rowstud = mysqli_fetch_array($querystud);
                      $mytrack = $rowstud['TrackID'];
                      $mystrand = $rowstud['StrandID'];
                      $query2 = mysqli_query($conn, "SELECT * FROM checklist INNER JOIN subjects ON checklist.SubjectID=subjects.ID WHERE Track='$mytrack' AND Strand='$mystrand'");

                      while ($rows2 = mysqli_fetch_array($query2)) {
                        $subid = $rows2['ID'];
                        $query3 = mysqli_query($conn, "SELECT * FROM grades INNER JOIN class ON grades.Class_ID=class.ClassCode INNER JOIN subjects ON class.Subject=subjects.ID INNER JOIN faculty ON class.Teacher=faculty.FacultyID WHERE class.Subject='$subid' AND grades.Stud_ID='$username'");
                        $rows3 = mysqli_fetch_array($query3);

                      ?>
                        <tr>
                          <td><?php echo $rows3['Remarks'] ?? null; ?></td>
                          <td><?php echo $rows2['SubjectCode']; ?></td>
                          <td><?php echo $rows2['SubjectDescription']; ?></td>
                          <td><?php echo $rows2['Semester']; ?></td>
                          <td><?php echo $rows2['prerequisite']; ?></td>
                          <?php
                          $first = $rows3['First_Grade'] ?? null;
                          if ($first == '' || $first == 0) { ?>
                            <td>No Grade</td>
                          <?php } else { ?>

                            <td><?php echo $rows3['First_Grade'] ?? null; ?></td>
                          <?php } ?>

                          <?php
                          $second = $rows3['Second_Grade'] ?? null;
                          if ($second == '' || $second == 0) { ?>
                            <td>No Grade</td>
                          <?php } else { ?>

                            <td><?php echo $rows3['Second_Grade'] ?? null; ?></td>
                          <?php } ?>

                          <?php
                          $third = $rows3['Third_Grade'] ?? null;
                          if ($third == '' || $third == 0) { ?>
                            <td>No Grade</td>
                          <?php } else { ?>

                            <td><?php echo $rows3['Third_Grade'] ?? null; ?></td>
                          <?php } ?>
                          <?php
                          $final = $rows3['Final_Grade'] ?? null;
                          if ($final == '' || $final == 0) { ?>
                            <td>No Grade</td>
                          <?php } else { ?>

                            <td><?php echo $rows3['Final_Grade'] ?? null; ?></td>
                          <?php } ?>
                          <?php $lastname = $rows3['LastName'] ?? null;
                          $firstname =  $rows3['FirstName'] ?? null;
                          $wholename = $lastname . " "  . $firstname;
                          ?>
                          <?php
                          $studremarks =  $rows3['Remarks'] ?? null;
                          if ($studremarks == 'Credited') {
                          ?>
                            <td> <?php echo '' ?></td>
                          <?php } else { ?>
                            <td><?php echo $wholename;  ?></td>
                          <?php } ?>
                        </tr>

                      <?php  } ?>


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
      $.post('functions/subjects/get_subject.php', {
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