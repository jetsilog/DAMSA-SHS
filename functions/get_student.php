<?php
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM students WHERE ID='$id'");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <div align="center">
    <?php if ($rows['Image'] != '') { ?>
      <?php echo '<img class="img-profile rounded-circle" src="data:image/jpeg;base64,' . base64_encode($rows[17]) . '"width="100px" height="100px" id="pprev">'; ?>
    <?php } else { ?>
      <img src="img/default-user.png" alt="Image" class="img-profile rounded-circle" width="50px" height="50px" />

    <?php } ?>
  </div>
  <div class="form-group">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <input type="file" name="files">
  </div>
  <br>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">LRN</label>
      <input type="text" class="form-control" name="IDnum" value="<?php echo $rows['StudentID']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Last Name</label>
      <input type="text" class="form-control" name="Lname" value="<?php echo $rows['LastName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">First Name</label>
      <input type="text" class="form-control" name="Fname" value="<?php echo $rows['FirstName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Middle Name</label>
      <input type="text" class="form-control" name="Mname" value="<?php echo $rows['MiddleName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputPassword4">Suffixes</label>
      <input type="text" class="form-control" name="Suffix" maxlength="3" placeholder="(optional)" value="<?php echo $rows['Suffix']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>
    <div class="form-group col-md-3">

      <label for="inputPassword4">Birthday</label>
      <input type="date" class="form-control" name="Bday" value="<?php echo $rows['Birthday']; ?>" id="bday">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Sex</label>
      <select name="Sex" class="form-control">
        <?php $gender = $rows['Sex']; ?>
        <option value="">Please Select Gender</option>
        <option value="Male" <?php if ($gender == "Male") {
                                echo "Selected";
                              }  ?>>Male</option>
        <option value="Female" <?php if ($gender == "Female") {
                                  echo "Selected";
                                }  ?>>Female</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Age</label>
      <input type="text" class="form-control" name="Age" value="<?php echo $rows['Age']; ?>" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');" id="age">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="Address" value="<?php echo $rows['Address']; ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Contact Number</label>
      <input type="text" class="form-control" name="Cnum" value="<?php echo $rows['ContactNum']; ?>" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Guardian</label>
      <input type="text" class="form-control" name="Guardian" value="<?php echo $rows['Guardian']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Guardian Contact Number</label>
      <input type="text" class="form-control" name="GCnum" value="<?php echo $rows['GuardianContact']; ?>" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');">
    </div>
  </div>
  <div class="form-row">
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
      <label for="inputZip">Track</label>
      <select name="Track" class="form-control">
        <option value="">Please Select Track</option>
        <?php
        $query2 = mysqli_query($conn, "SELECT * FROM  track");
        while ($rowtrack = mysqli_fetch_array($query2)) {
        ?>
          <option value="<?php echo $rowtrack['TrackID']; ?>" <?php if ($rows['TrackID'] == $rowtrack['TrackID']) { ?> selected <?php } ?>><?php echo $rowtrack['TrackDescription']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Strand</label>
      <select name="Strand" class="form-control">
        <option value="">Please Select Strand</option>
        <?php
        $query3 = mysqli_query($conn, "SELECT * FROM  strand");
        while ($rowstrand = mysqli_fetch_array($query3)) {
        ?>
          <option value="<?php echo $rowstrand['StrandID']; ?>" <?php if ($rows['StrandID'] == $rowstrand['StrandID']) { ?> selected <?php } ?>><?php echo $rowstrand['StrandDescription']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $rows['email']; ?>">
  </div>




  <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>