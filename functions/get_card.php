<?php
session_start();
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM cards WHERE ID='$id'");
$rows = mysqli_fetch_array($query);

if ($rows) {

?>
  <center>
    <?php echo '<img class="img-rounded" src="data:image/jpeg;base64,' . base64_encode($rows[3]) . '"width="500px" height="500px" id="pprev">'; ?>
  </center>
  <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>