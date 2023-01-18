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
  <title>Enroll Student</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <h1 class="h3 mb-0 text-gray-800">Enroll Student</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">Enroll Student</li>
            </ol>
          </div>
          <?php

          ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="functions/add_studsub.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">LRN</label>
                      <select name="IDnum" class="form-control">
                        <option value="">Please Select LRN</option>
                        <?php
                        $queryenlist = mysqli_query($conn, "SELECT * FROM  enlistment WHERE Estatus='Pending'");
                        while ($rowquery = mysqli_fetch_array($queryenlist)) {
                        ?>
                          <option value="<?php echo $rowquery['Stud_ID']; ?>"><?php echo $rowquery['Stud_ID']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Grade Level</label>
                      <select name="Gradelvl" id="" class="form-control">
                        <option value="">Please select Grade Level</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Section</label>
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



                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </form>
                </div>
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
      $.post('functions/get_track.php', {
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