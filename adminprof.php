<?php
include_once('fb-config.php');
include("includes/config.php");
include("_google-link.php");
?>
<?php
$permissions = array('email'); // Optional permissions
$loginUrl = $helper->getLoginUrl('https://localhost/damsashs/fb-callback.php', $permissions);
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
  <title>Account Profile</title>
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
            <h1 class="h3 mb-0 text-gray-800">Account Profile</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Account Profile</li>

            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->

            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Account Details</h6>
                </div>
                <div class="table-responsive p-3">
                  <form action="functions/edit_account.php" method="POST" enctype="multipart/form-data">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM accounts WHERE Username='$username'");
                    $rows = mysqli_fetch_array($query);


                    ?>
                    <center>
                      <div class="form-group">
                        <label for="inputEmail4"><b>Profile Picture</b></label> <br>
                        <?php
                        if ($rows['Image'] != '') {
                          echo '<img class="img-profile rounded-circle" src="data:image/jpeg;base64,' . base64_encode($rows[5]) . '"width="150px" height="150px">';
                        } else { ?>

                          <img src="img/default-user.png" alt="Image" class="img-profile rounded-circle" width="100px" height="100px" />

                        <?php } ?>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input type="file" name="files">
                      </div>
                    </center>
                    <div class="form-group">

                      <label for="inputEmail4">Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $rows['Name'];  ?>">


                    </div>
                    <div class="form-group">
                      <label for="inputState">Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $rows['Username'];  ?>" readonly>
                    </div>
                    <!-- remove if linked -->
                    <?php
                    $fblinkquery = mysqli_query($conn, "SELECT fb_link_status FROM accounts WHERE Username='$username'");
                    $fbrows = mysqli_fetch_array($fblinkquery);
                    // Login Buttons with Facebook
                    if ($fbrows['fb_link_status'] == '0') { ?>
                      <a href="<?php echo htmlspecialchars($loginUrl); ?>" class="btn btn-primary btn-block">
                        <i class="fab fa-facebook-square"></i> Link your Facebook</a>
                    <?php } else { ?>
                      <a href="" class="btn btn-danger btn-block" data-toggle="modal" data-target="#unbind" onclick="deletexid(<?php echo $rows['ID']; ?>)"><i class="fab fa-facebook-square"></i> Unlink your Facebook</a>
                    <?php } ?>

                    <!-- Login button with Google -->
                    <?php
                    $Google_link_status = mysqli_query($conn, "SELECT google_status FROM accounts WHERE Username='$username'");
                    $google_rows = mysqli_fetch_array($Google_link_status);
                    ?>
                    <?php if ($google_rows['google_status'] == '0') { ?>
                      <!-- //Create a URL to obtain user authorization -->
                      <a href="<?= $google_client->createAuthUrl() ?>" class="btn btn-warning btn-block">
                        <i class="fab fa-google-plus-g"></i> Link with Google</a>
                    <?php } else { ?>
                      <a href="" class="btn btn-warning btn-block" data-toggle="modal" data-target="#unbindG" onclick="updategoogle(<?php echo $rows['ID']; ?>)">

                        <i class="fab fa-google-plus-g"></i> Unlink Google to (<?= $rows['google_mail'] ?>)</a>
                    <?php } ?>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>


                    <input type="hidden" class="form-control" name="id" value="<?php echo $rows['ID'];  ?>">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <div class="modal fade" id="unbind" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Unbind your Account</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/unbindaccount.php" method="POST">
                  <div class="modal-body">
                    <p>Do you really want to unbind your account??</p>
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



          <div class="modal fade" id="unbindG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Unbind your Google Account</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="functions/unbindgoogle.php" method="POST">
                  <div class="modal-body">
                    <p>Do you really want to unbind your Google account??</p>
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


    function updategoogle(j) {
      document.getElementById("zidd").value = j;

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