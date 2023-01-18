<?php
session_start();
include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/damsashs.jpg" rel="icon">
  <title>Registration form</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->

    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Enlistment Form</h1>
            <ol class="breadcrumb">

              <li class="breadcrumb-item active" aria-current="page">
                <font style="color:red;">Provide the scanned image of your card.</font>
              </li>
            </ol>
          </div>
          <?php
          $nslrn = $_SESSION['nSlrn'];
          ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DAMSASHS Form</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="functions/add_card.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputAddress">LRN</label>
                      <input type="text" name="LRN" class="form-control" value="<?php echo $nslrn; ?>">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputAddress">Scanned Image of your card</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input type="file" class="form-control" name="files" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Applying for</label>
                        <select name="type" class=form-control>
                          <option value="">Please Select type</option>
                          <option value="New Student">New Student</option>
                          <option value="Transferee">Transfer</option>
                        </select>
                      </div>
                    </div>
                    <a href="newstudent.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
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

  <!-- This script start or initiate the address setter -->
  <script>
    var my_handlers = {
      // fill province
      fill_provinces: function() {
        //selected region
        var region_code = $(this).val();

        // set selected text to input
        var region_text = $(this).find("option:selected").text();
        let region_input = $('#region-text');
        region_input.val(region_text);
        //clear province & city & barangay input
        $('#province-text').val('');
        $('#city-text').val('');
        $('#barangay-text').val('');

        //province
        let dropdown = $('#province');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
        dropdown.prop('selectedIndex', 0);

        //city
        let city = $('#city');
        city.empty();
        city.append('<option selected="true" disabled></option>');
        city.prop('selectedIndex', 0);

        //barangay
        let barangay = $('#barangay');
        barangay.empty();
        barangay.append('<option selected="true" disabled></option>');
        barangay.prop('selectedIndex', 0);

        // filter & fill
        var url = 'ph-json/province.json';
        $.getJSON(url, function(data) {
          var result = data.filter(function(value) {
            return value.region_code == region_code;
          });

          result.sort(function(a, b) {
            return a.province_name.localeCompare(b.province_name);
          });

          $.each(result, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
          })

        });
      },
      // fill city
      fill_cities: function() {
        //selected province
        var province_code = $(this).val();

        // set selected text to input
        var province_text = $(this).find("option:selected").text();
        let province_input = $('#province-text');
        province_input.val(province_text);
        //clear city & barangay input
        $('#city-text').val('');
        $('#barangay-text').val('');

        //city
        let dropdown = $('#city');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose city/municipality</option>');
        dropdown.prop('selectedIndex', 0);

        //barangay
        let barangay = $('#barangay');
        barangay.empty();
        barangay.append('<option selected="true" disabled></option>');
        barangay.prop('selectedIndex', 0);

        // filter & fill
        var url = 'ph-json/city.json';
        $.getJSON(url, function(data) {
          var result = data.filter(function(value) {
            return value.province_code == province_code;
          });

          result.sort(function(a, b) {
            return a.city_name.localeCompare(b.city_name);
          });

          $.each(result, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
          })

        });
      },
      // fill barangay
      fill_barangays: function() {
        // selected barangay
        var city_code = $(this).val();

        // set selected text to input
        var city_text = $(this).find("option:selected").text();
        let city_input = $('#city-text');
        city_input.val(city_text);
        //clear barangay input
        $('#barangay-text').val('');

        // barangay
        let dropdown = $('#barangay');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose barangay</option>');
        dropdown.prop('selectedIndex', 0);

        // filter & Fill
        var url = 'ph-json/barangay.json';
        $.getJSON(url, function(data) {
          var result = data.filter(function(value) {
            return value.city_code == city_code;
          });

          result.sort(function(a, b) {
            return a.brgy_name.localeCompare(b.brgy_name);
          });

          $.each(result, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
          })

        });
      },

      onchange_barangay: function() {
        // set selected text to input
        var barangay_text = $(this).find("option:selected").text();
        let barangay_input = $('#barangay-text');
        barangay_input.val(barangay_text);
      },

    };


    $(function() {
      // events
      $('#region').on('change', my_handlers.fill_provinces);
      $('#province').on('change', my_handlers.fill_cities);
      $('#city').on('change', my_handlers.fill_barangays);
      $('#barangay').on('change', my_handlers.onchange_barangay);

      // load region
      let dropdown = $('#region');
      dropdown.empty();
      dropdown.append('<option selected="true" disabled>Choose Region</option>');
      dropdown.prop('selectedIndex', 0);
      const url = 'ph-json/region.json';
      // Populate dropdown with list of regions
      $.getJSON(url, function(data) {
        $.each(data, function(key, entry) {
          dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
        })
      });

    });
  </script>
</body>

</html>

<?php include("includes/alerts.php"); ?>