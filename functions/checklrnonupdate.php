<?php
include("../includes/config.php");
if (!empty($_POST["IDnumupdate"])) {
  $query = mysqli_query($conn, "SELECT * FROM students WHERE StudentID='" . $_POST["IDnumupdate"] . "'");
  $count = mysqli_num_rows($query);
  if ($count > 0) {
    echo "<span style='color:red'>LRN already exist do not save .</span>";
  } else {
    echo "<span style='color:green'>LRN available.</span>";
  }
}
