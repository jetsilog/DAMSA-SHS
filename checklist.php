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
              <li class="breadcrumb-item active" aria-current="page">Checklist</li>
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
                  <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#addchecklist">Add Checklist</button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Track</th>
                        <th>Strand</th>
                        <th>Subject</th>
                        <th>Prerequisite</th>
                        <th>Gradelevel</th>
                        <th>Semester</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $query = mysqli_query($conn, "SELECT * FROM checklist INNER JOIN track ON checklist.Track=track.TrackID INNER JOIN strand ON checklist.Strand=strand.StrandID INNER JOIN subjects ON checklist.SubjectID=subjects.ID");
                      while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $rows['TrackDescription']; ?></td>
                          <td><?php echo $rows['StrandDescription']; ?></td>
                          <td><?php echo $rows['SubjectDescription']; ?></td>
                          <td><?php echo $rows['prerequisite']; ?></td>
                          <td><?php echo $rows['Gradelevel']; ?></td>
                          <td><?php echo $rows['Semester']; ?></td>
                          <td><a data-toggle="modal" data-target="#editchecklist" onclick="editxid(<?php echo $rows['0']; ?>)"><i class="fa fa-edit"></i></a></td>
                          <td><a data-toggle="modal" data-target="#Deletechecklist" onclick="deletexid(<?php echo $rows['0']; ?>)"><i class="fa fa-trash"></i></a></td>

                        </tr>
                      <?php  } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <div class="modal fade" id="addchecklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Checklist</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="functions/add_checklist.php" method="POST">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Track</label>
                      <div class="col-sm-8">
                        <select name="track" id="track" class="form-control track">
                          <?php $queryt = mysqli_query($conn, "SELECT * FROM track"); ?>
                          <option value="">Please Select Track</option>
                          <?php while ($rowst = mysqli_fetch_array($queryt)) { ?>
                            <option value="<?php echo $rowst['TrackID']; ?>"><?php echo $rowst['TrackDescription']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Strand</label>
                      <div class="col-sm-8">
                        <select name="strand" id="strand" class="form-control strand">

                          <option value="">Please Select Strand</option>

                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Subject</label>
                      <div class="col-sm-8">
                        <select name="subject" id="" class="form-control">
                          <?php $querysub = mysqli_query($conn, "SELECT * FROM subjects"); ?>
                          <option value="">Please Select Stubject</option>
                          <?php while ($rowssub = mysqli_fetch_array($querysub)) { ?>
                            <option value="<?php echo $rowssub['ID']; ?>"><?php echo $rowssub['SubjectDescription']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Prerequisite</label>
                      <div class="col-sm-8">
                        <input type="text" name="prereq" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Gradelevel</label>
                      <div class="col-sm-8">
                        <select name="glvl" id="" class="form-control">
                          <option value="">Please Select GradeLevel</option>

                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Semester</label>
                      <div class="col-sm-8">
                        <select name="Sem" id="" class="form-control">
                          <option value="">Please Select Semester</option>

                          <option value="First Semester">First Semester</option>
                          <option value="Second Semester">Second Semester</option>
                        </select>
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







          <div class="modal fade" id="Deletechecklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Checklist</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/delete_checklist.php" method="POST">
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








          <div class="modal fade" id="editchecklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Checklist</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/edit_checklist.php" method="POST">
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
      $.post('functions/get_checklist.php', {
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