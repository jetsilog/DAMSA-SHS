<?php
include('includes/config.php');
require_once('TCPDF-main/tcpdf.php');
include('includes/lock.php');

if (isset($_GET['submit'])) {
  $schoolyear = $_GET['Schoolyear'];
  $sem = $_GET['Semester'];

  $show = mysqli_query($conn, "SELECT * FROM grades WHERE Schoolyear='$schoolyear' AND Semester='$sem'");
  while ($rowshow = mysqli_fetch_array($show)) {
  }



  class PDF extends TCPDF
  {
    public function Header()
    {
      $imageFile = K_PATH_IMAGES . 'damsashs.jpg';
      $this->Image($imageFile, 40, 10, 20, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
      $this->Ln(5);
      $this->SetFont('', 'B', 12);
      $this->Cell(189, 5, 'Delfin Albano(Magsaysay)', 0, 1, 'C');
      $this->SetFont('', 'B', 12);
      $this->Cell(189, 5, 'Stand Alone Senior High School', 0, 1, 'C');
      $this->SetFont('', '', 12);
      $this->Cell(189, 3, 'Certificate of Grades', 0, 1, 'C');
      $this->Ln(2);
      $this->Cell(189, 3, 'Test', 0, 1, 'C');
    }

    public function Footer()
    {
      $this->SetY(-148);
      $this->Ln(5);
      $this->SetFont('times', 'B', 10);
      $this->MultiCell(189, 5, 'This Certificate is Computer Generated ipa sign mo man o hindi okay lang', 0, 'L', 0, 1, '', '', true);
      $this->Ln(2);
      $this->Cell(20, 1, '_______________', 0, 0);
      $this->Cell(118, 1, '', 0, 0);
      $this->Cell(51, 1, '_________________', 0, 1);
      $this->Cell(20, 5, 'Student Signature', 0, 0);
      $this->Cell(118, 5, '', 0, 0);
      $this->Cell(51, 5, 'Registrar Signature', 0, 1);
      $this->Ln(60);

      $this->SetFont('', 'I', 8);
      date_default_timezone_set('Asia/Singapore');
      $today = date("Y-m-d h:i:sa");
      $this->Cell(25, 5, 'Generation Date and Time: ' . $today, 0, 0, 'L');
      $this->Cell(164, 5, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
  }


  // create new PDF document
  $pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Jet');
  $pdf->SetTitle('Grades');
  $pdf->SetSubject('');
  $pdf->SetKeywords('');

  // set default header data
  $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
  $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

  // set header and footer fonts
  $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

  // set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  // set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

  // set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  // set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

  // set some language-dependent strings (optional)
  if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
  }

  // set default font subsetting mode
  $pdf->setFontSubsetting(true);

  // Set font
  // dejavusans is a UTF-8 Unicode font, if you only need to
  // print standard ASCII chars, you can use core fonts like
  // helvetica or times to reduce file size.
  $pdf->SetFont('dejavusans', '', 14, '', true);



  // Add a page
  // This method has several options, check the source code documentation for more information.
  $pdf->AddPage();

  $pdf->Ln(18);
  $pdf->setFont('times', 'B', 10);
  $pdf->Cell(189, 3, 'Firstgrade: ' . $sem, 0, 1, 'C');
  $pdf->Ln(5);

  $pdf->setFont('times', 'B', 10);
  $pdf->Cell(130, 5, 'Firstgrade: ' . $accountname . ' ', 0, 0);
  $pdf->Ln(5);

  $pdf->setFillColor(224, 235, 255);
  $pdf->Cell(35, 5, 'Firstgrade:', 1, 0, 'C', 1);
  $pdf->Cell(35, 5, 'Secondgrade:', 1, 0, 'C', 1);
  $pdf->Cell(35, 5, 'thirdgrade:', 1, 0, 'C', 1);
  $pdf->Cell(35, 5, 'finalgrade:', 1, 0, 'C', 1);
  $pdf->Cell(35, 5, 'Remarks:', 1, 0, 'C', 1);
  $pdf->setFont('times', 'B', 10);


  $showgrade = mysqli_query($conn, "SELECT First_Grade, Second_Grade, Third_Grade, Final_Grade, Remarks FROM grades WHERE Schoolyear=$schoolyear AND Semester='$sem'");
  $i = 1;
  $max = 6;

  while ($rowshowg = mysqli_fetch_array($showgrade)) {
    $firstg = $rowshow['First_Grade'] ?? null;
    if (!empty($firstg)) {
      if ($firstg > 0) {
        $firstg = number_format($firstg, 2);
      }
    }
    $secondg = $rowshow['Second_Grade'] ?? null;
    $thirdg = $rowshow['Third_Grade'] ?? null;
    $finalg = $rowshow['Final_Grade'] ?? null;
    $remarks = $rowshow['Remarks'] ?? null;
    if (($i % $max) == 0) {
      $pdf->AddPage();

      $pdf->Ln(18);
      $pdf->setFont('times', 'B', 10);
      $pdf->Cell(189, 3, 'Firstgrade: ' . $sem, 0, 1, 'C');
      $pdf->Ln(5);

      $pdf->setFont('times', 'B', 10);
      $pdf->Cell(130, 5, 'Firstgrade: ' . $accountname . ' ', 0, 0);
      $pdf->Ln(5);

      $pdf->setFillColor(224, 235, 255);
      $pdf->Cell(35, 5, 'page:', 1, 0, 'C', 1);
      $pdf->Cell(35, 5, 'Firstgrade:', 1, 0, 'C', 1);
      $pdf->Cell(35, 5, 'Secondgrade:', 1, 0, 'C', 1);
      $pdf->Cell(35, 5, 'thirdgrade:', 1, 0, 'C', 1);
      $pdf->Cell(35, 5, 'finalgrade:', 1, 0, 'C', 1);
      $pdf->Cell(35, 5, 'Remarks:', 1, 0, 'C', 1);
      $pdf->setFont('times', 'B', 10);
    }
    $pdf->Ln(3);
    $pdf->Cell(20, 4, $i, 0, 0, 'C');
    $pdf->Cell(50, 4, $firstg, 0, 0, 'C');
    $pdf->Cell(40, 4, $secondg, 0, 0, 'C');
    $pdf->Cell(20, 4, $thirdg, 0, 0, 'C');
    $pdf->Cell(35, 4, $finalg, 0, 0, 'C');
    $pdf->Cell(18, 4, $remarks, 0, 1, 'C');
    $i++;
  }
  $pdf->Output('example_001.pdf', 'I');
}

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
