<?php

require_once('../tcpdf/tcpdf_include.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       $pdf->AddPage();
	   //$html1=0;
	   
 if (!isset($_SESSION)) session_start();
       // echo $_SESSION['s'];    
//global $html1;
 if(isset($_SESSION['s']))
	   {
		 //  echo $_SESSION['s'];
	  $html1=$_SESSION['s'];

	   $val=explode(",",$html1);

//echo $val;
$html2= '<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 
 <tr>
  <th colspan="2" align="center">Monthly report</th>
 </tr>
  <tr>
  <td>Date</td>
  <td>Amount</td>
 </tr>
 
 <tr>
  <td>'.$val[0].'</td>
    <td>'.$val[1].'</td>
 </tr>
 
 

</table>';
$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
$pdf->Output('example_001.pdf', 'I');
	   }
?>

      