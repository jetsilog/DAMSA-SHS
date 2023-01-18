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
  <title>Classes</title>
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
            <h1 class="h3 mb-0 text-gray-800">Classes</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">Files</li>
              <li class="breadcrumb-item active" aria-current="page">Classes</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Class list</h6>
                  <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#addclass">Add Class</button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>ClassCode</th>
                        <th>Track</th>
                        <th>Strand</th>
                        <th>SubjectCode</th>
                        <th>SubjectDescription</th>
                        <th>GradeLevel</th>
                        <th>Section</th>
                        <th>Schedule</th>
                        <th>Teacher</th>
                        <th></th>
                        <th></th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $query = mysqli_query($conn, "SELECT * FROM class INNER JOIN subjects ON class.subject=subjects.ID INNER JOIN track ON class.Track=track.TrackID INNER JOIN strand ON class.Strand=strand.StrandID INNER JOIN faculty ON class.Teacher=faculty.FacultyID INNER JOIN sections ON class.Section=sections.ID WHERE class.Schoolyear=$SYID");
                      while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $rows['ClassCode']; ?></td>
                          <td><?php echo $rows['TrackDescription']; ?></td>
                          <td><?php echo $rows['StrandDescription']; ?></td>
                          <td><?php echo $rows['SubjectCode']; ?></td>
                          <td><?php echo $rows['SubjectDescription']; ?></td>
                          <td><?php echo $rows['GradeLevel']; ?></td>
                          <td><?php echo $rows['Section']; ?></td>
                          <td><?php echo $rows['Schedule']; ?></td>
                          <td><?php echo $rows['LastName'] . ', ' . $rows['FirstName']; ?></td>

                          <td><a data-toggle="modal" data-target="#editclass" onclick="editxid(<?php echo $rows['0']; ?>)"><i class="fa fa-edit"></i></a></td>
                          <td><a data-toggle="modal" data-target="#Deleteclass" onclick="deletexid(<?php echo $rows['0']; ?>)"><i class="fa fa-trash"></i></a></td>

                        </tr>
                      <?php  } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <div class="modal fade bd-example-modal-xl" id="addclass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/add_class.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">ClassCode</label>
                        <input type="text" class="form-control" name="classcode" required>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputZip">Track</label>
                        <select name="Track" class="form-control track" id="track" required>
                          <option value="">Please Select Track</option>
                          <?php
                          $query2 = mysqli_query($conn, "SELECT * FROM  track");
                          while ($rowtrack = mysqli_fetch_array($query2)) {
                          ?>
                            <option value="<?php echo $rowtrack['TrackID']; ?>"><?php echo $rowtrack['TrackDescription']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputZip">Strand</label>
                        <select name="Strand" class="form-control strand" id="strand" required>
                          <option value="">Please Select Strand</option>

                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputZip">Subject</label>
                        <select name="subject" class="form-control" id="track" required>
                          <option value="">Please Select Subject</option>
                          <?php
                          $query3 = mysqli_query($conn, "SELECT * FROM  subjects");
                          while ($rowsub = mysqli_fetch_array($query3)) {
                          ?>
                            <option value="<?php echo $rowsub['ID']; ?>"><?php echo $rowsub['SubjectDescription']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputZip">Grade Level</label>
                        <select name="Glevel" class="form-control" required>
                          <option value="">Please Select Grade Level</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Section</label>
                        <select name="Section" class="form-control" id="track" required>
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


                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Schedule</label>
                        <input type="text" class="form-control" name="schedule" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputZip">Teacher</label>
                        <select name="teacher" class="form-control" id="track" required>
                          <option value="">Please Select Teacher</option>
                          <?php
                          $query4 = mysqli_query($conn, "SELECT * FROM  faculty");
                          while ($rowteach = mysqli_fetch_array($query4)) {
                          ?>
                            <option value="<?php echo $rowteach['FacultyID']; ?>"><?php echo $rowteach['LastName'] . ', ' . $rowteach['FirstName']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>






                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>








          <div class="modal fade" id="Deleteclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Class</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/delete_class.php" method="POST">
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







          <div class="modal fade bd-example-modal-xl" id="editclass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <form action="functions/edit_class.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div id='result'></div>
                    </div>


                </div>

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
    function editxid(x) {
      $.post('functions/get_class.php', {
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









    $(document).ready(function() {
      $(".track").change(function() {
        var id = $(this).val();
        var dataString = 'id=' + id;
        $.ajax({
          type: "POST",
          url: "functions/control_strand.php",
          data: dataString,
          cache: false,
          success: function(html) {
            $(".strand").html(html);
          }
        });

      });
    });
  </script>
</body>

</html>

<?php include("includes/alerts.php"); ?>