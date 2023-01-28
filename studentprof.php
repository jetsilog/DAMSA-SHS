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
  <title>Students</title>
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
            <h1 class="h3 mb-0 text-gray-800">Students</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Files</li>
              <li class="breadcrumb-item active" aria-current="page">Students</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Students</h6>
                  <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#addStudent">Add Student</button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr align="center">
                        <th>Student_Image</th>
                        <th>LRN</th>
                        <th>Name</th>

                        <th>View&Edit</th>
                        <?php if ($usertype == 'Co-admin') { ?>


                        <?php  } else { ?>
                          <th>Delete</th>
                        <?php } ?>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $query = mysqli_query($conn, "SELECT * FROM students INNER JOIN track ON students.TrackID=track.TrackID INNER JOIN strand ON students.StrandID=strand.StrandID WHERE students.Standing='Existing'");
                      while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr align="center">
                          <td>
                            <?php
                            if ($rows['Image'] != '') {
                              echo '<img class="img-profile rounded-circle" src="data:image/jpeg;base64,' . base64_encode($rows[17]) . '"width="50px" height="50px">';
                            } else { ?>
                              <img src="img/default-user.png" alt="Image" class="img-profile rounded-circle" width="50px" height="50px" />
                            <?php } ?>
                          </td>
                          <td><?php echo $rows['StudentID']; ?></td>
                          <?php $studentfullname = $rows['LastName'] . ', ' . $rows['FirstName'] . $rows['MiddleName']; ?>
                          <td><?= $studentfullname; ?></td>



                          <td><a data-toggle="modal" data-target="#editStudent" onclick="editxid(<?php echo $rows['0']; ?>)"><i class="fa fa-eye"></i></a></td>
                          <?php if ($usertype == 'Co-admin') { ?>

                          <?php } else { ?>
                            <td><a data-toggle="modal" data-target="#DeleteStudent" onclick="deletexid(<?php echo $rows['0']; ?>)"><i class="fa fa-trash"></i></a></td>
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


          <div class="modal fade bd-example-modal-xl" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/add_student.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">LRN</label>
                        <input type="text" class="form-control" name="IDnum" id="IDnum" maxlength="11" required oninput="checklrn()">
                        <span id="check-lrn"></span>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Last Name</label>
                        <input type="text" class="form-control" name="Lname" maxlength="50" required oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">First Name</label>
                        <input type="text" class="form-control" name="Fname" maxlength="50" required oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Middle Name</label>
                        <input type="text" class="form-control" name="Mname" maxlength="50" placeholder="(optional)" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Suffixes</label>
                        <input type="text" class="form-control" name="Suffix" maxlength="3" placeholder="(optional)" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Birthday</label>
                        <input type="date" class="form-control" name="Bday" required id="bday" onchange="ageCount();">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Sex</label>
                        <select name="Sex" class="form-control" required>
                          <option value="">Please Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">

                        <label for="inputPassword4">Age</label>
                        <input type="text" class="form-control" maxlength=2 name="Age" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');" readonly id="age" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" name="Address" required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputCity">Mobile Number</label>
                        <input type="text" class="form-control" maxlength=10 name="Cnum" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');" required />
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Guardian</label>
                        <input type="text" class="form-control" name="Guardian" required oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputZip">Guardian Mobile Number</label>
                        <input type="text" class="form-control" maxlength=10 name="GCnum" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');" required />
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputZip">Grade Level</label>
                        <select name="Glevel" class="form-control" required>
                          <option value="">Please Select Grade Level</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
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
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>







          <div class="modal fade" id="DeleteStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/delete_student.php" method="POST">
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


          <div class="modal fade bd-example-modal-xl" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">View/Edit Student</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/edit_student.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div id='result'></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" id="submitedit">Save</button>
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
      $.post('functions/get_student.php', {
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



    function ageCount() {
      var date1 = new Date();
      var bday = document.getElementById("bday").value;
      var date2 = new Date(bday);
      var y1 = date1.getFullYear();
      var y2 = date2.getFullYear();
      var day1 = date1.getUTCDate();
      var month1 = date1.getUTCMonth();
      var day2 = date2.getUTCDate();
      var month2 = date2.getUTCMonth();
      if (month2 <= month1) {
        if (day2 <= day1) {
          var age = y1 - y2;
        } else {
          var age = (y1 - y2) - 1;
        }
      } else {
        var age = (y1 - y2) - 1;
      }
      document.getElementById("age").value = age;
      return true;
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


  <script>
    function checklrn() {
      jQuery.ajax({
        url: "functions/checklrn.php",
        data: 'IDnum=' + $("#IDnum").val(),
        type: "POST",
        success: function(data) {
          $('#check-lrn').html(data);
        },
        error: function() {}
      });
    }
  </script>

  <script>
    function editlrn() {
      jQuery.ajax({
        url: "functions/checklrnonupdate.php",
        data: 'IDnumupdate=' + $("#IDnumupdate").val(),
        type: "POST",
        success: function(data) {
          $('#check-lrnupdate').html(data);
        },
        error: function() {}
      });
    }
  </script>

</body>

</html>
<?php include("includes/alerts.php"); ?>