<?php
include("../includes/config.php");
if (!empty($_POST["facultyIDupdate"])) {
  $query = mysqli_query($conn, "SELECT * FROM faculty WHERE FacultyID='" . $_POST["facultyIDupdate"] . "'");
  $count = mysqli_num_rows($query);
  if ($count > 0) {
    echo "<span style='color:red'>FacultyID already exist .</span>";
  } else {
    echo "<span style='color:green'>FacultyID available.</span>";
  }
}
