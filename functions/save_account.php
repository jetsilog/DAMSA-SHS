<?php
include("../includes/config.php");

if(isset($_POST['submit'])){
    $firstname = $_POST['fn'];
    $middlename = $_POST['mn'];
    $lastname = $_POST['ln'];
    $emailad = $_POST['ea'];
    $contactno = $_POST['cn'];
    $shippingadd = $_POST['sa'];
    $username = $_POST['un'];
    $pass = $_POST['pw'];

    $query = mysqli_query($conn, "INSERT INTO customers (LastName,FirstName,MiddleName,EmailAddress,ContactNo,ShippingAddress) VALUES ('$lastname','$firstname','$middlename','$emailad','$contactno','$shippingadd')");

    $query1 = mysqli_query($conn, "INSERT INTO accounts (Username,Password,AccountType) VALUES ('$username','$pass','Customer')");


    if($query && $query1){
header("location: ../login.php");
    }
    else{
        echo "Error can't register";
    }
}





?>