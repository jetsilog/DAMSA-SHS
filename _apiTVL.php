<?php include("includes/config.php");

function _getRequestTVL($conn)
{
  $result = mysqli_query($conn, "SELECT count(*) as TVLcounts from students WHERE TrackID=8 AND Standing='Existing'");
  $data = mysqli_fetch_assoc($result);


  echo json_encode($data, JSON_PRETTY_PRINT);
}

_getRequestTVL($conn);
