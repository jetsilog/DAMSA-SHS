<?php
require('fpdf184/fpdf.php');
require('fpdf184/makefont/makefont.php');
include('includes/lock.php');
$db = new PDO('mysql:host=localhost;dbname=damsashs', 'root', '');
if (isset($_POST['submit'])) {
  $schoolyear = $_POST['Schoolyear'];
  $sem = $_POST['Semester'];
  class myPDF extends FPDF
  {
    function header()
    {

      $this->Image('img/logo/damsashs.jpg', 15, 5, 35, 35);
      $this->Ln();
      $this->SetFont('OLDENGL', '', 20);
      $this->Cell(200, 5, 'Delfin Albano(Magsaysay)', 0, 0, 'C');
      $this->Ln();
      $this->Ln();
      $this->SetFont('OLDENGL', '', 20);
      $this->Cell(200, 5, 'Stand-Alone Senior High School', 0, 0, 'C');
      $this->Ln(15);
      $this->setFont('Arial', 'B', 11);
      $this->Cell(200, 10, 'Certification of Grades', 0, 0, 'C');
      $this->Ln(20);
    }
    function footer()
    {
      $this->SetY(-15);
      $this->setFont('Arial', '', 8);
      $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function headerTable($name, $db, $uuuuname)
    {
      $profile = $db->query("SELECT * FROM students INNER JOIN track ON students.TrackID=track.TrackID INNER JOIN strand ON students.StrandID=strand.StrandID WHERE StudentID='$uuuuname'");
      $pprofile = $profile->fetch(PDO::FETCH_OBJ);
      $gradelevel = $pprofile->GradeLevel;
      $Mystrand = $pprofile->StrandDescription;
      $mytrack = $pprofile->TrackDescription;
      $this->SetFont('times', '', 10);
      $this->Write(5, "       This is to certify that $name, a Grade $gradelevel student of $Mystrand under $mytrack of this Senior High School Institution was officially enrolled in the subject(s) listed below with their corresponding grade(s): ");

      $this->Ln(10);
      $this->SetX(15);
      $this->setFont('arial', 'B', 8);
      $this->Cell(30, 10, 'Subject Code', 0, 0, 'C');
      $this->Cell(30, 10, 'First Grade', 0, 0, 'C');
      $this->Cell(30, 10, 'Second Grade', 0, 0, 'C');
      $this->Cell(30, 10, 'Third Grade', 0, 0, 'C');
      $this->Cell(30, 10, 'Final Grade', 0, 0, 'C');
      $this->Cell(30, 10, 'Remarks', 0, 0, 'C');
      $this->Ln();
    }
    function viewTable($db, $sy, $semester, $name, $uuname)
    {


      $stmt = $db->query("SELECT * FROM grades INNER JOIN class ON grades.Class_ID=class.ClassCode INNER JOIN subjects ON class.Subject=subjects.ID WHERE grades.Schoolyear='$sy' AND grades.Semester='$semester' AND grades.Stud_ID='$uuname'");
      $sy = $db->query("SELECT * FROM schoolyear WHERE Status=1");
      $getsem = $sy->fetch(PDO::FETCH_OBJ);
      $displaysem =  $getsem->Semester;
      $displaysy = $getsem->Schoolyear;
      $this->setFont('times', 'UB', 10);
      $this->Cell(5, 5, $displaysem .  ' S.Y ' . $displaysy, 0, 0, 'L');
      $this->Ln();
      $this->setFont('times', '', 10);
      while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
        $this->SetX(15);
        $this->Cell(30, 10, $data->SubjectCode, 0, 0, 'C');
        $this->Cell(30, 10, $data->First_Grade, 0, 0, 'C');
        $this->Cell(30, 10, $data->Second_Grade, 0, 0, 'C');
        $this->Cell(30, 10, $data->Third_Grade, 0, 0, 'C');
        $this->Cell(30, 10, $data->Final_Grade, 0, 0, 'C');
        $this->Cell(30, 10, $data->Remarks, 0, 0, 'C');
        $this->Ln();
      }
      $this->Ln(10);
      $this->SetFont('times', '', 10);
      date_default_timezone_set('Asia/Singapore');
      $today = date("Y-m-d h:i:sa");
      $this->Write(5, "This certification is issued upon the request of Ms/Mr.$name, this $today for reference purpose only. ");
    }
  }
  $pdf = new myPDF();
  $pdf->AddFont('OLDENGL', '', 'OLDENGL.php');
  $pdf->AliasNbPages();
  $pdf->AddPage('P', 'A4', 0);
  $pdf->headerTable($accountname, $db, $username);
  $pdf->viewTable($db, $schoolyear, $sem, $accountname, $username);
  $pdf->Output('I', 'example_001.pdf', True);
}
