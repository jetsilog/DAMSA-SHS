<?php
session_start();
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM sections WHERE ID='$id'");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Section</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="Section" value="<?php echo $rows['Section']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Status:</label>
    <div class="col-sm-8">
      <select name="status" class="form-control">
        <?php $stat = $rows['Sec_status']; ?>
        <option value="0" <?php if ($stat == 0) {
                            echo "selected";
                          } ?>>Full</option>
        <option value="1" <?php if ($stat == 1) {
                            echo "selected";
                          } ?>>Available</option>
      </select>
    </div>
  </div>



  <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>