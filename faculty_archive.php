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
  <title>Faculty Archive</title>
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
            <h1 class="h3 mb-0 text-gray-800">Faculty Archive</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Files</li>
              <li class="breadcrumb-item active" aria-current="page">Faculty Archive</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Details</h6>

                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light" align="center">
                      <tr>
                        <th>Faculty_Image</th>
                        <th>FacultyID</th>
                        <th>Name</th>
                        <th>Suffix</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Restore</th>
                        <?php if ($usertype == 'Co-admin') { ?>


                        <?php  } else { ?>
                          <th>Delete</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody align="center">
                      <?php $query = mysqli_query($conn, "SELECT * FROM faculty WHERE farchive_status='archived'");
                      while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td>
                            <?php
                            if ($rows['Image'] != '') {
                              echo '<img class="img-rounded" src="data:image/jpeg;base64,' . base64_encode($rows[9]) . '"width="50px" height="50px">';
                            } else { ?>
                              <img src="img/default-user.png" alt="Image" class="img-rounded" width="50px" height="50px" />
                            <?php } ?>
                          </td>
                          <td><?php echo $rows['FacultyID']; ?></td>
                          <?php $teacherfullname = $rows['LastName'] . ', ' . $rows['FirstName'] . ' ' . $rows['MiddleName']; ?>
                          <td><?php echo $teacherfullname; ?></td>
                          <td><?php echo $rows['F_Suffix']; ?></td>
                          <td><?php echo $rows['Position']; ?></td>
                          <td><?php echo $rows['Email']; ?></td>
                          <td><?php echo $rows['Contact']; ?></td>
                          <td><?php echo $rows['Address']; ?></td>
                          <td><a data-toggle="modal" data-target="#restoref" onclick="restoref(<?php echo $rows['ID']; ?>)"><i class="fa fa-history"></i></a></td>
                          <?php if ($usertype == 'Co-admin') { ?>

                          <?php } else { ?>
                            <td><a data-toggle="modal" data-target="#DeleteFaculty" onclick="deletexid(<?php echo $rows['ID']; ?>)"><i class="fa fa-trash"></i></a></td>
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



          <div class="modal fade bd-example-modal-xl" id="addteacher" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add a faculty</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/add_teacher.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Faculty ID</label>
                        <input type="text" class="form-control" name="FacultyID" id="facultyID" required maxlength="12" oninput="checkfid()">
                        <span id="check-faculty"></span>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Last Name</label>
                        <input type="text" class="form-control" name="Lname" required maxlength="25" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">First Name</label>
                        <input type="text" class="form-control" name="Fname" required maxlength="25" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                    </div>

                    <div class="form-row">

                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Middle Name</label>
                        <input type="text" class="form-control" name="Mname" required maxlength="25" placeholder="N/A if not available" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Suffix</label>
                        <input type="text" class="form-control" name="Suffix" required maxlength="3" placeholder="N/A if not available" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                    </div>

                    <div class="form-group">

                      <label for="inputEmail4">Mobile Number</label>
                      <input type="text" class="form-control" name="Contact" required maxlength="11" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');">


                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="Address" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAddress">Position</label>
                        <select name="position" class="form-control" required>
                          <option value="">Please Select Position</option>
                          <option value="Teacher II">Teacher II</option>
                          <option value="Teacher III">Teacher III</option>
                          <option value="Master Teacher I">Master Teacher I</option>

                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputAddress">Image</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input type="file" class="form-control" name="files">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="email" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" id="facultysubmit">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="modal fade" id="restoref" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Restore</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/restore_faculty.php" method="POST">
                  <div class="modal-body">
                    <p>Do you really want to restore this record?</p>
                    <input type="hidden" name="id" id="zidd">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submit">Yes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="modal fade" id="DeleteFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Faculty</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/delete_faculty.php" method="POST">
                  <div class="modal-body">
                    <p>Do you really want to delete this record?</p>
                    <input type="hidden" name="id" id="zid">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="submit">Yes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>






          <div class="modal fade" id="editFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Faculty</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/edit_teacher.php" method="POST" enctype="multipart/form-data">
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
      $.post('functions/get_teacher.php', {
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

  <script type="text/javascript">
    function restoref(j) {
      document.getElementById("zidd").value = j;

    }
  </script>

  <script>
    function checkfid() {
      jQuery.ajax({
        url: "functions/checkfacultyid.php",
        data: 'facultyID=' + $("#facultyID").val(),
        type: "POST",
        success: function(data) {
          $('#check-faculty').html(data);
        },
        error: function() {}
      });
    }
  </script>

  <script>
    function checkfidupdate() {
      jQuery.ajax({
        url: "functions/checkfacultyid_update.php",
        data: 'facultyIDupdate=' + $("#facultyIDupdate").val(),
        type: "POST",
        success: function(data) {
          $('#check-facultyupdate').html(data);
        },
        error: function() {}
      });
    }
  </script>
</body>

</html>
<?php include("includes/alerts.php"); ?>