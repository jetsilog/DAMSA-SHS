<?php include("includes/lock.php"); ?>
<?php include("includes/config.php"); ?>

<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/damsashs.jpg" rel="icon">
  <title>Profile</title>
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
            <h1 class="h3 mb-0 text-gray-800">Your Profile</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Profile</li>

            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profile Details</h6>
                </div>
                <div class="table-responsive p-3">
                  <form action="functions/update_teacherown_profile.php" method="POST">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM faculty WHERE FacultyID='$username'");
                    $rows = mysqli_fetch_array($query);


                    ?>
                    <input type="hidden" name="ID" value="<?php echo $rows['ID']; ?>">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">FacultyID</label>
                        <input type="text" class="form-control" name="FID" value="<?php echo $username; ?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">FirstName</label>
                        <input type="text" class="form-control" name="FN" value="<?php echo $rows['FirstName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">LastName</label>
                        <input type="text" class="form-control" name="LN" value="<?php echo $rows['LastName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputState">MiddleName</label>
                        <input type="text" class="form-control" name="MN" value="<?php echo $rows['MiddleName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Suffix</label>
                        <input type="text" class="form-control" name="Sf" value="<?php echo $rows['F_Suffix']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">ContactNumber</label>
                        <input type="text" class="form-control" name="CN" value="<?php echo $rows['Contact']; ?>" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputState">Address</label>
                        <input type="text" class="form-control" name="ADD" value="<?php echo $rows['Address']; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState">Position</label>
                        <input type="text" class="form-control" name="pos" value="<?php echo $rows['Position']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputState">Email</label>
                      <input type="email" class="form-control" name="EA" value="<?php echo $rows['Email']; ?>">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>



                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->










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
  </script>


  <script>
    function showpass() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
  <script type="text/javascript">
    document.getElementById('Cpwd').onclick = function() {
      var disabled = document.getElementById("password").disabled;
      if (disabled) {
        document.getElementById("password").disabled = false;
      } else {
        document.getElementById("password").disabled = true;
      }
    }
  </script>
</body>

</html>
<?php include("includes/alerts.php"); ?>