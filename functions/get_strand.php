<?php
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM strand WHERE StrandID='$id'");
$rows = mysqli_fetch_array($query);

if($rows){

    ?>
<div class="form-group row">
<label class="col-sm-4 col-form-label">Strand Code:</label>
 <div class="col-sm-8">
<input type="text" class="form-control" name="SC" value="<?php echo $rows['SCode'];?>">
   </div>
 </div>
 <div class="form-group row">
<label class="col-sm-4 col-form-label">Strand Description:</label>
 <div class="col-sm-8">
<input type="text" class="form-control" name="SD" value="<?php echo $rows['StrandDescription'];?>">
   </div>
 </div>
 <div class="form-group row">
<label class="col-sm-4 col-form-label">Status:</label>
 <div class="col-sm-8">
<select name="status" class="form-control">
  <?php $stat = $rows['Status']; ?>
<option value="0" <?php if($stat==0){echo "selected"; } ?>>Inactive</option>
<option value="1" <?php if($stat==1){echo "selected"; } ?>>Active</option>
</select>
   </div>
 </div>

 <input type="hidden" name="id" value="<?php echo $rows['StrandID']; ?>">
<?php } ?>