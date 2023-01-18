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
  <title>Student Grades</title>
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
            <h1 class="h3 mb-0 text-gray-800">Student Grades</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">Student Grades</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grade List</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr align="center">
                        <th>ClassCode</th>
                        <th>Subject</th>
                        <th>GradeLevel</th>
                        <th>SchoolYear</th>
                        <th>Semester</th>
                        <th>ViewStudents</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $queryyy = mysqli_query($conn, "SELECT * FROM accounts WHERE Username='$username'");
                      $checkquery =  mysqli_fetch_array($queryyy);
                      $myusername = $checkquery['Username'];
                      ?>
                      <?php $query = mysqli_query($conn, "SELECT * FROM class INNER JOIN track ON class.Track=track.TrackID INNER JOIN strand ON class.Strand=strand.StrandID INNER JOIN faculty ON class.Teacher=faculty.FacultyID INNER JOIN subjects ON class.Subject=subjects.ID AND class.Schoolyear=$SYID");
                      while ($rows = mysqli_fetch_array($query)) {
                      ?>

                        <tr align="center">
                          <td><?php echo $rows['ClassCode']; ?></td>
                          <td><?php echo $rows['SubjectDescription']; ?></td>
                          <td><?php echo $rows['GradeLevel']; ?></td>
                          <td><?php echo $rowsy['Schoolyear']; ?></td>
                          <td><?php echo $rowsy['Semester']; ?></td>
                          <td><a style="color:grey" onmouseover="this.style.color='blue'" onmouseout="this.style.color='grey'" href="adminviewstudents.php?classcode=<?php echo $rows['ClassCode']; ?>"><i class="fa fa-eye"></i></a></td>

                        </tr>
                      <?php  } ?>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->




          <div class="modal fade bd-example-modal-xl" id="Viewclass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Students</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/updategrade.php" method="POST">
                  <div class="modal-body">
                    <div id='result'></div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>













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
    function viewclass(x) {
      $.post('functions/get_viewclass.php', {
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