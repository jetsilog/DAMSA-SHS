<?php
session_start();
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM grades WHERE ID='$id'");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">LRN</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="LRN" value="<?php echo $rows['Stud_ID']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-4 col-form-label">ClassCode</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="classcode" value="<?php echo $rows['Class_ID']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Remarks</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="remarks" value="<?php echo $rows['Remarks']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Semester</label>
    <div class="col-sm-8">
      <select name="semester" id="" class="form-control">
        <?php $semes = $rows['Semester']; ?>
        <option value="">Please Select Semester</option>
        <option value="First Semester" <?php if ($semes == "First Semester") {
                                          echo "Selected";
                                        }  ?>>First Semester</option>
        <option value="Second Semester" <?php if ($semes == "Second Semester") {
                                          echo "Selected";
                                        }  ?>>Second Semester</option>
      </select>
    </div>
  </div>

  <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>