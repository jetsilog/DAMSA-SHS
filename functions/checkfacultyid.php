<?php
include("../includes/config.php");
if (!empty($_POST["facultyID"])) {
  $query = mysqli_query($conn, "SELECT * FROM faculty WHERE FacultyID='" . $_POST["facultyID"] . "'");
  $count = mysqli_num_rows($query);
  if ($count > 0) {
    echo "<span style='color:red'>FacultyID already exist .</span>";
    echo "<script>$('#facultysubmit').prop('disabled',true);</script>";
  } else {
    echo "<span style='color:green'>FacultyID available.</span>";
    echo "<script>$('#facultysubmit').prop('disabled',false);</script>";
  }
}
