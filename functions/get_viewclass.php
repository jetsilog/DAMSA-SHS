<?php
session_start();
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM grades WHERE ID=$id");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label class="col-sm-4 col-form-label">FirstGrading</label>
      <?php
      $fg = $rows['First_Grade'];
      if ($fg >= 75) {
      ?>
        <input type="text" class="form-control" name="Fg" value="<?php echo $rows['First_Grade']; ?>" style="color: #39FF14" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" maxlength="5">
      <?php } else { ?>
        <input type="text" class="form-control" name="Fg" value="<?php echo $rows['First_Grade']; ?>" style="color:red" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" maxlength="5">
      <?php } ?>
    </div>
    <div class="form-group col-md-2">
      <label class="col-sm-4 col-form-label">SecondGrading</label>
      <?php
      $sg = $rows['Second_Grade'];
      if ($sg >= 75) {
      ?>
        <input type="text" class="form-control" name="Sg" value="<?php echo $rows['Second_Grade']; ?>" style="color: #39FF14" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" maxlength="5">
      <?php } else { ?>
        <input type="text" class="form-control" name="Sg" value="<?php echo $rows['Second_Grade']; ?>" style="color:red" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" maxlength="5">
      <?php } ?>
    </div>
    <div class="form-group col-md-2">
      <label class="col-sm-4 col-form-label">ThirdGrading</label>
      <?php
      $tg = $rows['Third_Grade'];
      if ($tg >= 75) {
      ?>
        <input type="text" class="form-control" name="Tg" value="<?php echo $rows['Third_Grade']; ?>" style="color: #39FF14" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" maxlength="5">
      <?php } else { ?>
        <input type="text" class="form-control" name="Tg" value="<?php echo $rows['Third_Grade']; ?>" style="color:red" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" maxlength="5">
      <?php } ?>
    </div>
    <div class="form-group col-md-2">
      <label class="col-sm-4 col-form-label">FinalGrade</label>
      <?php
      $fnlg = $rows['Final_Grade'];
      if ($fnlg >= 75) {
      ?>
        <input type="text" class="form-control" name="Fnlg" value="<?php echo $rows['Final_Grade']; ?>" readonly style="color: #39FF14">
      <?php } else { ?>
        <input type="text" class="form-control" name="Fnlg" value="<?php echo $rows['Final_Grade']; ?>" readonly style="color:red">
      <?php } ?>
    </div>
    <div class="form-group col-md-4">
      <label class="col-sm-4 col-form-label">Remarks</label>
      <input type="text" class="form-control" name="Remarks" readonly value="<?php echo $rows['Remarks']; ?>">
    </div>
  </div>

  <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>