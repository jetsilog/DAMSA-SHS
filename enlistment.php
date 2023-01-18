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
  <title>Enlistment</title>
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
            <h1 class="h3 mb-0 text-gray-800">Enlistment</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">Enlistment</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Enlistment</h6>

                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light" align="center">
                      <tr>

                        <th>StudentID</th>
                        <th>Name</th>
                        <th>Track</th>
                        <th>Strand</th>
                        <th>GradeLevel</th>
                        <th>Date&time</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody align="center">
                      <?php $query = mysqli_query($conn, "SELECT * FROM enlistment INNER JOIN students ON enlistment.Stud_ID=students.StudentID INNER JOIN track ON enlistment.Track=track.TrackID INNER JOIN strand ON enlistment.Strand=strand.StrandID");
                      while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr>

                          <td><?php echo $rows['Stud_ID']; ?></td>
                          <td><?php echo $rows['LastName'] . ', ' . $rows['FirstName'] . ' ' . $rows['MiddleName']; ?></td>
                          <td><?php echo $rows['TrackDescription']; ?></td>
                          <td><?php echo $rows['StrandDescription']; ?></td>
                          <td><?php echo $rows['Grade_Level']; ?></td>
                          <td><?php echo $rows['Date_time']; ?></td>
                          <td><?php echo $rows['EStatus']; ?></td>
                          <?php if ($rows['EStatus'] == "Pending") { ?>
                            <?php $studentgradelevel = $rows['Grade_Level']; ?>
                            <td><a data-toggle="modal" data-target="#updateenlist" onclick="deletexid(<?php echo  $rows['0'] . ',' . $rows['Grade_Level']; ?> , '<?= $rows['Stud_ID'] ?>')" href=""><button class="btn btn-primary">Approve</button></a></td>
                          <?php } else { ?>
                            <td><i class="fa fa-check-square fa-2x"></i></td>
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





          <div class="modal fade" id="updateenlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Approve Student</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/update_enlistment.php" method="POST">
                  <div class="modal-body">
                    <p>Do you really want to enroll this student?</p>
                    <p>If yes please enter section</p>
                    <input type="hidden" name="id" id="zid">
                    <input type="hidden" name="glvl" id="zidd">
                    <input type="hidden" name="LRN" id="ziddd">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Section:</label>
                      <select name="section" class="form-control" id="track" required>
                        <option value="">Please Select Section</option>
                        <?php
                        $querysect = mysqli_query($conn, "SELECT * FROM  sections WHERE Sec_status=1");
                        while ($rowsec = mysqli_fetch_array($querysect)) {
                        ?>
                          <option value="<?php echo $rowsec['ID']; ?>"><?php echo $rowsec['Section']; ?></option>
                        <?php } ?>

                      </select>

                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submit">Yes</button>
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
    function editxid(x) {
      $.post('functions/get_strand.php', {
          postid: x
        },
        function(data) {
          $('#result').html(data);
        });
    }
  </script>


  <script type="text/javascript">
    function deletexid(z, v, r) {
      document.getElementById("zid").value = z;

      document.getElementById("zidd").value = v;
      document.getElementById("ziddd").value = r;
    }
  </script>
</body>

</html>
<?php include("includes/alerts.php"); ?>