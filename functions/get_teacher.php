<?php
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM faculty WHERE ID='$id'");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <div align="center">
    <?php if ($rows['Image'] != '') { ?>
      <?php echo '<img class="img-rounded" src="data:image/jpeg;base64,' . base64_encode($rows[9]) . '"width="100px" height="100px" id="pprev">'; ?>
    <?php } else { ?>
      <img src="img/default-user.png" alt="Image" class="img-rounded" width="50px" height="50px" />

    <?php } ?>
  </div>
  <div class="form-group">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <input type="file" name="files">
  </div>
  <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Faculty ID</label>
      <input type="text" class="form-control" name="FacultyID" value="<?php echo $rows['FacultyID']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Last Name</label>
      <input type="text" class="form-control" name="Lname" value="<?php echo $rows['LastName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>

  </div>

  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputPassword4">First Name</label>
      <input type="text" class="form-control" name="Fname" value="<?php echo $rows['FirstName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Middle Name</label>
      <input type="text" class="form-control" name="Mname" value="<?php echo $rows['MiddleName']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>
  </div>




  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Suffix</label>
      <input type="text" class="form-control" name="Suffix" value="<?php echo $rows['F_Suffix']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z, ]+/g,'');">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" name="email" value="<?php echo $rows['Email']; ?>">
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Address</label>
      <input type="text" class="form-control" name="Address" value="<?php echo $rows['Address']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Contact</label>
      <input type="text" class="form-control" name="Contact" value="<?php echo $rows['Contact']; ?>" oninput="this.value = this.value.replace(/[^0-9\.]+/g, '');">
    </div>

  </div>


  <div class="form-group">
    <label for="inputEmail4">Position</label>
    <input type="text" class="form-control" name="position" value="<?php echo $rows['Position']; ?>">
  </div>




  <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>