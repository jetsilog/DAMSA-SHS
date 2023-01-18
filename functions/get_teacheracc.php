<?php
include("../includes/config.php");
$id = $_POST['postid'];

$query = mysqli_query($conn, "SELECT * FROM accounts WHERE ID='$id'");
$rows = mysqli_fetch_array($query);

if($rows){

    ?>
   
   <div class="form-group row">
      <label class="col-sm-4 col-form-label">Username</label>
      <div class="col-sm-8">
      <input type="text" class="form-control" name="Username" value="<?php echo $rows['Username'];?>">
</div>
    </div>

    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Password</label>
      <div class="col-sm-8">
                      <input type="text" class="form-control" name="pass" value="<?php echo $rows['Password']; ?>" id="password">                     
                      
                    </div>
    </div>
  

 
  <div class="form-group row">
      <label class="col-sm-4 col-form-label">Name</label>
      <div class="col-sm-8">
      <input type="text" class="form-control" name="name" value="<?php echo $rows['Name'];?>">
      </div>
    </div>
   




 
  

 

 <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
<?php } ?>




<script>
    function showpass(){
        var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
    }
</script>