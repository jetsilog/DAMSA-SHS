<?php
include("../includes/config.php");
if (!empty($_POST["IDnum"])) {
  $query = mysqli_query($conn, "SELECT * FROM students WHERE StudentID='" . $_POST["IDnum"] . "'");
  $count = mysqli_num_rows($query);
  if ($count > 0) {
    echo "<small><span style='color:red'>LRN already exist .</span></small>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else {
    echo "<small><span style='color:green'>LRN available.</span></small>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
