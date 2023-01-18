<?php include("includes/config.php");

function _getRequestAcademicTrack($conn)
{
  $result = mysqli_query($conn, "SELECT count(*) as AcademicTrackCounts from students WHERE TrackID=9");
  $data = mysqli_fetch_assoc($result);


  echo json_encode($data, JSON_PRETTY_PRINT);
}

_getRequestAcademicTrack($conn);
