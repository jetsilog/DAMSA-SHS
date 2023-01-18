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
                <font style="color:red;">Do not leave anything blank. Put N/A if not applicable.</font>
              </li>
            </ol>
          </div>
          <?php

          ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DAMSASHS Form</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="functions/add_new_student.php" enctype="multipart/form-data">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">LRN</label>
                        <input type="text" class="form-control" name="LRN" maxlength="11" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Last Name</label>
                        <input type="text" class="form-control" name="Lastname" maxlength="50" required oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">First Name</label>
                        <input type="text" class="form-control" name="Firstname" maxlength="50" required oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Middle Name</label>
                        <input type="text" class="form-control" name="Middlename" maxlength="50" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Suffixes</label>
                        <input type="text" class="form-control" name="Suffixx" maxlength="3" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-3">

                        <label for="inputPassword4">Birthday</label>
                        <input type="date" class="form-control" name="Birthday" required id="bday" onchange="ageCount();">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Sex</label>
                        <select name="Sexx" class="form-control" required>
                          <option value="">Please Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Age</label>
                        <input type="text" class="form-control" maxlength=2 name="Agee" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');" readonly id="age" />
                      </div>
                    </div>



                    <!--   <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" name="Address" required>
                    </div> -->

                    <!-- Uncomment Below -->
                    <!-- <div class="row">
                      <div class="col-sm-12 mb-6">
                        <label class="form-label">Region *</label>
                        <select name="region" class="form-control form-control-md" id="region"></select>
                        <input type="hidden" class="form-control form-control-md" name="region_text" id="region-text" required>
                      </div>
                    </div>
                    <br>
                    <div class="row">

                      <div class="col-sm-6 mb-3">
                        <label class="form-label">Province *</label>
                        <select name="province" class="form-control form-control-md" id="province"></select>
                        <input type="hidden" class="form-control form-control-md" name="province_text" id="province-text" required>
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label class="form-label">City / Municipality *</label>
                        <select name="city" class="form-control form-control-md" id="city"></select>
                        <input type="hidden" class="form-control form-control-md" name="city_text" id="city-text" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 mb-3">
                        <label class="form-label">Barangay *</label>
                        <select name="barangay" class="form-control form-control-md" id="barangay"></select>
                        <input type="hidden" class="form-control form-control-md" name="barangay_text" id="barangay-text" required>
                      </div>
                    </div> -->

                    <!-- Up until here only -->
                    <!--
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputCity">Mobile Number</label>
                        <input type="text" class="form-control" maxlength=11 name="Cnumm" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');" required />
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Guardian</label>
                        <input type="text" class="form-control" name="Guardiann" required oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputZip">Guardian Mobile Number</label>
                        <input type="text" class="form-control" maxlength=10 name="GCnumm" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');" required />
                      </div>
                    </div>
-->
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputZip">Grade Level</label>
                        <select name="Gradelevel" class="form-control" required>
                          <option value="">Please Select Grade Level</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputZip">Track</label>
                        <select name="Trackk" class="form-control track" id="track" required>
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
                        <select name="Strandd" class="form-control strand" id="strand" required>
                          <option value="">Please Select Strand</option>

                        </select>
                      </div>


                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputAddress">Student_Image</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input type="file" class="form-control" name="files">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="email" required>
                      </div>
                    </div>
                    <a href="index.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
                    <button type="submit" class="btn btn-primary" name="submit">Next</button>

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