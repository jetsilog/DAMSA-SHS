<?php
include("../../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM subjects WHERE ID='$id'");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Subject Code:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="SC" value="<?php echo $rows['SubjectCode']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Subject Description:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="SD" value="<?php echo $rows['SubjectDescription']; ?>">
    </div>
  </div>


  <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>