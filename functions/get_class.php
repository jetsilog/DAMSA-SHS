<?php
session_start();
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM class WHERE ID='$id'");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">ClassCode</label>
      <input type="text" class="form-control" name="classcode" required value="<?php echo $rows['ClassCode']; ?>">
    </div>

    <div class="form-group col-md-4">
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

    <div class="form-group col-md-4">
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
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputZip">Subject</label>
      <select name="Subject" class="form-control">
        <option value="">Please Select Subject</option>
        <?php
        $querysub = mysqli_query($conn, "SELECT * FROM  subjects");
        while ($rowsub = mysqli_fetch_array($querysub)) {
        ?>
          <option value="<?php echo $rowsub['ID']; ?>" <?php if ($rows['Subject'] == $rowsub['ID']) { ?> selected <?php } ?>><?php echo $rowsub['SubjectDescription']; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Grade Level</label>
      <select name="Glevel" class="form-control">
        <?php $glvl = $rows['GradeLevel']; ?>
        <option value="">Please Select Grade Level</option>
        <option value="11" <?php if ($glvl == "11") {
                              echo "Selected";
                            }  ?>>11</option>
        <option value="12" <?php if ($glvl == "12") {
                              echo "Selected";
                            }  ?>>12</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="inputPassword4">Section</label>



      <select name="Section" class="form-control">
        <option value="">Please Select Section</option>
        <?php
        $querysec = mysqli_query($conn, "SELECT * FROM  sections");
        while ($rowsec = mysqli_fetch_array($querysec)) {
        ?>
          <option value="<?php echo $rowsec['ID']; ?>" <?php if ($rows['Section'] == $rowsec['ID']) { ?> selected <?php } ?>><?php echo $rowsec['Section']; ?></option>
        <?php } ?>
      </select>
    </div>

  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Schedule</label>
      <input type="text" class="form-control" name="schedule" required value="<?php echo $rows['Schedule']; ?>">
    </div>

    <div class="form-group col-md-6">
      <label for="inputZip">Teacher</label>
      <select class="form-control" name="teacher">
        <?php
        $sqlteacher = mysqli_query($conn, "SELECT * FROM faculty");
        ?>
        <option value="">Select Teacher</option>
        <?php while ($rowteacher = mysqli_fetch_array($sqlteacher)) { ?>
          <option value="<?php echo $rowteacher['FacultyID']; ?>" <?php if ($rowteacher['FacultyID'] == $rows['Teacher']) { ?> selected <?php } ?>> <?php echo   $rowteacher['LastName'] . ' ' . $rowteacher['FirstName']; ?> </option> <?php } ?>
      </select>
    </div>
  </div>


  <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>