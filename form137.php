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
  <title>Form 137</title>
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
            <h1 class="h3 mb-0 text-gray-800">Records</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">Form 137</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">form 137 list</h6>
                  <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#addSection">Add Form 137</button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light" align="center">
                      <tr>
                        <th>LRN</th>
                        <th>PDF file</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody align="center">
                      <?php $query = mysqli_query($conn, "SELECT * FROM formone");

                      while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?= $rows['LRN'] ?></td>
                          <td><?= $rows['pdf'] ?></td>


                          <?php
                          $status = $rows['formone_status'];
                          if ($status == 0) {
                          ?>
                            <td><span class="badge badge-warning">Unreleased</span></td>
                          <?php } else { ?>
                            <td><span class="badge badge-success">Released</span></td>
                          <?php } ?>

                          <?php if ($status == 0) { ?>
                            <td><a data-toggle="modal" data-target="#updatestatus" onclick="updatestatus(<?php echo $rows['ID']; ?>)" href=""><button class="btn btn-primary">Release</button></a></td>
                          <?php } else { ?>

                            <td><button class="btn btn-primary" disabled>Release</button></td>
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

          <div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="functions/add_form137.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">LRN</label>
                      <div class="col-sm-8">

                        <select name="LRN" class="form-control" required>
                          <option value="">Please Select LRN</option>
                          <?php
                          $querylist = mysqli_query($conn, "SELECT * FROM  students WHERE Standing='Existing'");
                          while ($rowquery = mysqli_fetch_array($querylist)) {
                          ?>
                            <option value="<?php echo $rowquery['StudentID']; ?>"><?php echo $rowquery['StudentID']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                    </div>
                    <div class="form-group row">

                      <label class="col-sm-4 col-form-label">Input Form 137 file</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" name="pdf" required>
                      </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </div>
                </form>
              </div>
            </div>
          </div>







          <div class="modal fade" id="updatestatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Releasing</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/release_form137.php" method="POST">
                  <div class="modal-body">
                    <p>Do you really want to release this record?</p>
                    <input type="text" name="id" id="zid">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submit">Yes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>








          <div class="modal fade" id="editSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/edit_section.php" method="POST">
                  <div class="modal-body">
                    <div id='result'></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
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
      $.post('functions/get_section.php', {
          postid: x
        },
        function(data) {
          $('#result').html(data);
        });
    }
  </script>


  <script type="text/javascript">
    function updatestatus(z) {
      document.getElementById("zid").value = z;

    }
  </script>
</body>

</html>
<?php include("includes/alerts.php"); ?>