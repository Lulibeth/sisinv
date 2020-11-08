
<?php 
//error_reporting(E_ALL); ini_set('display_errors', '1');
require_once('../conectarpg.php');
require_once("../histo/pdfz/dompdf/dompdf_config.inc.php");

$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);


$dompdf = new DOMPDF();

  

  @session_start();
		$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fecha=date("d/m/Y");


$html.="
<!doctype html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<META http-equiv=Content-Type content='text/html; charset=utf-8'>
<title>proveedor</title>
<script type='text/php'>
$font = Font_Metrics::get_font('helvetica', 'bold');
$pdf->page_text(100, 50, 'Header: {PAGE_NUM} of {PAGE_COUNT}', 
$font, 6, array(0,0,0));
       
		


 </script>
		


  
<style type='text/css'>



body
{
font-family: Georgia, 'Times New Roman', Times, serif;
font-size:14px;	
line-height: 2em;
color:#000000;
	margin: 0 cm;
	margin-top:  5 cm ;
	margin-bottom: 5cm;
}


.tabla.th, .tabla.td {
  
text-align: left;
vertical-align: top;
border: 1px solid #444;
border-spacing: 0;
padding-left:0px;
border-style: solid; 
border-color: #444; 
border-bottom-width: 0.0 em; 
border-right-width: 0.0 em; 

}


@page {
margin-top: 2.5cm;
margin-left: 2.5cm;
margin-right: 2.5cm;
	}



#header,
#footer {
position: fixed;
left: 0;
right: 0;
color: #000;
font-size: 0.9em;
}

#header {
  top: 0;
	}

#footer {
    bottom: 25%;
}

 .comoqueda4
{
font-family: Georgia, 'Times New Roman', Times, serif;
font-size:14px;	

line-height: 1.5;
color: #000000;
}

 .comoqueda3
{
font-family: Georgia, 'Times New Roman', Times, serif;
font-size:12px;	

line-height: 1.5;
color: #000000;
}

.page-number {
  text-align:center;
 }

.page-number:before {
  		text-align:center;
    }

 </style>

<head>
<body>

";


$html.= "
<div id='header'>
<table width='100%' border='0' align='center'  cellspacing='0'>
   <tr>
    <td  width='25%'><p align='center'><img src='http://".$_SERVER['HTTP_HOST']."/sisinv/logo/MARYHOR(2).png' height='100' width='90' title='Banner Superior'  /></p></td>
	
	 <td width='50%' ><p align='center' class='comoqueda4'><strong><em>TIENDA MARYHOR <br>SAN CRISTOBAL<br>
    Rif. V-073641752 </em></strong></p></td>
	 <td width='25%' ></td>
  </tr>
</table>
<br>
<div align='center'>
<h2><strong>PROVEEDORES</strong></h2>
</div>
</div>";

	$html.='<div id="footer">

	<p align="center"><strong>________________________________________<br>NELLY GARCIA <br>C.I V-73641752<BR>PROPIETARIA</strong> </p><br><br><br>
<hr/>
<table width="95%" border="0" align="center"  cellspacing="0" class="comoqueda3">
   <tr>
    <td width="40%"><p align="left">Avda. Principal Urb. Coromoto<br>N 29-82 La Concordia<br> San Cristobal Estado Táchira</td>
	<td width="60%"><p align="left">Telefono: 0276-3470992<br> Correo Electronico:<br>Rif.: J-30970529-6</p></td>
  </tr>
  <tr>
  <td colspan="2">
	<div class="page-number"><script type="text/php">   $font = Font_Metrics::get_font("helvetica", "");
$pdf->page_text(510, 730, "Pagina: {PAGE_NUM} de {PAGE_COUNT}", 
$font, 9, array(0,0,0));</script></div>
  </td>
  <tr>
</table>		

<br>

</div>';


$html.="
<br><br>
<div align='justify' >

<table style='width:100%'>
  <tr>
    <th width='20%'>Rif</th> 
    <th width='30%'>Nombre o Razón Social</th>
	<th width='25%'>Número de Telefono</th> 
    <th width='25%'>Número de Telefono 2</th>
	
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
	<td></td>
  </tr>
 
</table>



</div>";
		
 $html.="
  </body>";
 
 

///////**************************************************************************************************************************************************************


function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
          return $_SERVER['HTTP_CLIENT_IP'];
             
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
          return $_SERVER['HTTP_X_FORWARDED_FOR'];
      
  return $_SERVER['REMOTE_ADDR'];
}


 
  $dompdf->load_html($html);// $dompdf->lastPage();
  $dompdf->set_paper("carta", "portrait");
  $dompdf->render();
  $dompdf->stream("PROVEEDORES".$fecha.".pdf",array('Attachment'=>0));
?>

