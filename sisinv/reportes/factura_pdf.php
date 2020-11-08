
<?php 


//require_once('../conectarpg.php');
require_once("dompdf/dompdf_config.inc.php");

//$conex=new BaseDatos();
//$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);
@session_start();


$html.=" 
<!doctype html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <META http-equiv=Content-Type content='text/html; charset=utf-8'>
  <title>FACTURA</title>
 
  <head>
<body>";
$html.="<div id='header'>
  <table width='95%' border='0' align='center'>
  <tr >
	<td align='center' height='20'  >	
	</td>
  </tr>
</table>

<table width='100%' border='0' align='center'  cellspacing='0'>
  <tr>
    <td colspan='2' rowspan='4'>&nbsp;</td>
    <td colspan='3'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='3'><div align='center'><b>FACTURA N&deg;   $jo </b></div></td>
  </tr>
  <tr>
    <td colspan='3'><div align='center'><b>FECHA  DE EMISION:&nbsp; $fechaimp </b></div></td>
  </tr>
  <tr>
    <td colspan='3'><div align='center'><b>HORA DE EMISION:&nbsp;  $horaimp </b></div></td>
  </tr>
  <tr>
    <td><b>NOMBRE O RAZON SOCIAL: </b></td>
    <td colspan='4'>  $nom </td>
  </tr>
  <tr>
    <td><b>CED/RIF:</b></td>
    <td>  $ced </td>
    <td><b>TELEFONOS:</b></td>
    <td>  $tel </td>
    <td>  $tel2 </td>
  </tr>
  <tr>
    <td><b>DIRECCION</b></td>
    <td colspan='4'>  $direc </td>
  </tr>
</table>
</div>";


$html.="</body>";
	
  $dompdf = new DOMPDF();
 $dompdf->load_html($html);
$dompdf->set_paper(array(0, 0, 612.00, 396.00), 'portrait');
  $dompdf->render();
  $dompdf->stream('Factura-'.$numf.'_'.date("d-m-Y").'.pdf',array('Attachment'=>0));
?>