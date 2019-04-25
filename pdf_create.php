<?php
if( !isset( $_SESSION ) ) {
    session_start();
}


 ?>
 <?php include("database/config.inc.php") ?>
<?php

require 'fpdf.php';

class PDF extends FPDF
{

  function Header()
  {
    $front_family='Arial';
    $bold = 'B';
    $front_size = 16;

    $this->SetFont($front_family,$bold,$front_size);

    $width=40;
    $height=10;
    $text="bestelling";

    $this->Cell($width,$height,$text);
    $this->Ln();
  }

  function Footer()
  {
      // Go to 1.5 cm from bottom
      $this->SetY(-15);
      // Select Arial italic 8
      $this->SetFont('Arial','I',8);
      // Print centered page number
      $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
  }
}
$pdf = new PDF();
$pdf->AddPage();
$front_family='Arial';
$bold = '';
$front_size = 12;
$pdf->SetFont($front_family,$bold,$front_size);
$naam="naam";
$test="prijs";
$test1="hoeveelheid";
$tottalamount="tottalamount";
$pdf->Cell(40,10,$naam,1);$pdf->Cell(40,10,$test,1);$pdf->Cell(40,10,$test1,1);$pdf->Cell(40,10,$tottalamount,1);
$pdf->Ln();
foreach ($_SESSION["idprod"] as $key => $value) {
  $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  $sql = "SELECT * FROM products WHERE id=$key";
  $result = mysqli_query($link, $sql);

  if (mysqli_num_rows($result) > 0) {

      while ($data = mysqli_fetch_assoc($result)) {
        $priceprod=$data['price']*$value;
        $pdf->Cell(40,10,$data['naam'],1);
        $pdf->Cell(40,10,$data['price'],1);
        $pdf->Cell(40,10,$value,1);
        $pdf->Cell(40,10,$priceprod,1);
        $pdf->Ln();

      }
    }
}
$tottal="totaal:";
$pdf->Cell(40,10,$tottal,1);
$pdf->Cell(40,10,$_SESSION["tottal"],1);

$pdf->Output();
?>
