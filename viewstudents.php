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
  <title>My Students</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
</head>
<?php

$CC = $_GET['classcode'];
$_SESSION['classcode'] = $CC;
?>

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
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="teacherclass.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Student list</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover print" id="dataTableHover">
                    <thead class="thead-light">
                      <tr align="center">
                        <th scope="col">StudentID</th>
                        <th scope="col">Name</th>
                        <th scope="col">FirstGrade</th>
                        <th scope="col">SecondGrade</th>
                        <th scope="col">ThirdGrade</th>
                        <th scope="col">FinalGrade</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Semester</th>
                        <th>AddGrade</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $query = mysqli_query($conn, "SELECT * FROM grades INNER JOIN students ON grades.Stud_ID=students.StudentID WHERE grades.Class_ID='$CC' AND grades.Schoolyear=$SYID");
                      while ($rows = mysqli_fetch_array($query)) {
                      ?>

                        <tr align="center">
                          <td><?php echo $rows['Stud_ID'];
                              ?></td>
                          <td><?php echo $rows['LastName'] . ', ' . $rows['FirstName'];
                              ?></td>
                          <?php
                          $fg = $rows['First_Grade'];
                          if ($fg >= 75) {
                          ?>
                            <td style="color:#39FF14"><?php echo $rows['First_Grade'];
                                                      ?></td>
                          <?php } else { ?>
                            <td style="color:red"><?php echo $rows['First_Grade'];
                                                  ?></td>
                          <?php } ?>
                          <?php
                          $sg = $rows['Second_Grade'];
                          if ($sg >= 75) {
                          ?>
                            <td style="color:#39FF14"><?php echo $rows['Second_Grade'];
                                                      ?></td>
                          <?php } else { ?>
                            <td style="color:red"><?php echo $rows['Second_Grade'];
                                                  ?></td>
                          <?php } ?>
                          <?php
                          $tg = $rows['Third_Grade'];
                          if ($tg >= 75) {
                          ?>
                            <td style="color:#39FF14"><?php echo $rows['Third_Grade'];
                                                      ?></td>
                          <?php } else { ?>

                            <td style="color:red"><?php echo $rows['Third_Grade'];
                                                  ?></td>
                          <?php } ?>

                          <?php
                          $fnlg = $rows['Final_Grade'];
                          if ($fnlg >= 75) {
                          ?>
                            <td style="color:#39FF14"><?php echo $rows['Final_Grade'];
                                                      ?></td>
                          <?php } else { ?>

                            <td style="color:red"><?php echo $rows['Final_Grade'];
                                                  ?></td>
                          <?php } ?>
                          <?php
                          $remark = $rows['Remarks'];
                          if ($remark == 'In progress') {
                          ?>
                            <td><span class="badge badge-warning"><?php echo $rows['Remarks'];
                                                                  ?></span></td>
                          <?php } else if ($remark == 'Passed') { ?>

                            <td><span class="badge badge-success"><?php echo $rows['Remarks'];
                                                                  ?></span></td>
                          <?php } else { ?>
                            <td><span class="badge badge-danger"><?php echo $rows['Remarks'];
                                                                  ?></span></td>
                          <?php } ?>

                          <td><?php echo $rowsy['Semester'];
                              ?></td>
                          <td><a data-toggle="modal" data-target="#addgrade" onclick="viewclass(<?php echo $rows['0']; ?>)"><i class="editgrade fa fa-plus fa-2x" onmouseover="style.color='blue'" onmouseout="style.color='grey'"></i></a></td>

                        </tr>

                      <?php  }
                      ?>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->




          <div class="modal fade bd-example-modal-xl" id="addgrade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
  <!-- data tables -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"> </script> -->
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable({
        dom: 'Blfrtip',
        buttons: {
          buttons: [{
            extend: 'print',
            text: '<i class="fa fa-print"></i>',
            title: $('h1').text(),
            exportOptions: {},
            footer: true,
            autoPrint: true
          }]
        }
      }); // ID From dataTable with Hover
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