<?php
session_start();
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM checklist WHERE ChecklistID='$id'");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <div class="form-group">
    <label for="inputZip">Track</label>
    <select name="Track" class="form-control">
      <option value="">Please Select Track</option>
      <?php
      $querytrack = mysqli_query($conn, "SELECT * FROM  track");
      while ($rowtracks = mysqli_fetch_array($querytrack)) {
      ?>
        <option value="<?php echo $rowtracks['TrackID']; ?>" <?php if ($rows['Track'] == $rowtracks['TrackID']) { ?> selected <?php } ?>><?php echo $rowtracks['TrackDescription']; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="inputZip">Strand</label>
    <select name="Strand" class="form-control">
      <option value="">Please Select Strand</option>
      <?php
      $querystrand = mysqli_query($conn, "SELECT * FROM  strand");
      while ($rowstrand = mysqli_fetch_array($querystrand)) {
      ?>
        <option value="<?php echo $rowstrand['StrandID']; ?>" <?php if ($rows['Strand'] == $rowstrand['StrandID']) { ?> selected <?php } ?>><?php echo $rowstrand['StrandDescription']; ?></option>
      <?php } ?>
    </select>
  </div>



  <div class="form-group">
    <label for="inputZip">Subject</label>
    <select name="Subject" class="form-control">
      <option value="">Please Select Subject</option>
      <?php
      $querysub = mysqli_query($conn, "SELECT * FROM  subjects");
      while ($rowsub = mysqli_fetch_array($querysub)) {
      ?>
        <option value="<?php echo $rowsub['ID']; ?>" <?php if ($rows['SubjectID'] == $rowsub['ID']) { ?> selected <?php } ?>><?php echo $rowsub['SubjectDescription']; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="inputPassword4">Prerequisite</label>
    <input type="text" class="form-control" name="prereq" value="<?php echo $rows['prerequisite']; ?>">
  </div>

  <div class="form-group">
    <label for="inputZip">Grade Level</label>
    <select name="Glevel" class="form-control">
      <?php $glvl = $rows['Gradelevel']; ?>
      <option value="">Please Select Grade Level</option>
      <option value="11" <?php if ($glvl == "11") {
                            echo "Selected";
                          }  ?>>11</option>
      <option value="12" <?php if ($glvl == "12") {
                            echo "Selected";
                          }  ?>>12</option>
    </select>
  </div>

  <div class="form-group">
    <label for="inputZip">Semester</label>
    <select name="Semester" class="form-control">
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



  <input type="hidden" name="id" value="<?php echo $rows['ChecklistID']; ?>">
<?php } ?>