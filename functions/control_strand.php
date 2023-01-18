<?php
include('../includes/config.php');

if ($_POST['id']) {

  $id = $_POST['id'];
  $sql = mysqli_query($conn, "SELECT * FROM strand WHERE Tcode='$id' AND Status=1");
  echo '<option value="">Please Select Strand</option>';
  while ($row = mysqli_fetch_array($sql)) {
    $id = $row['StrandID'];
    $data = $row['StrandDescription'];
    echo '<option value="' . $id . '">' . $data . '</option>';
  }
}
