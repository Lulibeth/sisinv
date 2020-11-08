
<?php 
//error_reporting(E_ALL); ini_set('display_errors', '1');
require_once('../conectarpg.php');
require_once("../histo/pdfz/dompdf/dompdf_config.inc.php");

$conexHM=new BaseDatos();
$conexHM->conectar($conexHM->servidor,$conexHM->usuario,$conexHM->password,$conexHM->BD);
@session_start();
$usuariox=$_SESSION["s_usuario"];
$firma_autorizada=$_SESSION["furma_aut"];
$estudiante=$_REQUEST['nest'];
$fecha=$_REQUEST['fecha'];
$fecha_format_4 = date('d-m-Y', strtotime($fecha));


$sqlprim2="
SELECT distinct(substring(cast(ff.fecha_fact as text),0,11)) as fecha, 
(SELECT distinct(f.id_fact)
  FROM 
  facturacion.factura as f, 
  facturacion.detalle_factura as df
  where 
  f.id_fact=df.id_fact  
  and cast(substring(cast(f.fecha_fact as text),0,11) as date)='$fecha' 
  order by f.id_fact  asc limit 1) as primera,
(SELECT distinct(f.id_fact)
  FROM 
  facturacion.factura as f, 
  facturacion.detalle_factura as df
  where 
  f.id_fact=df.id_fact  
  and cast(substring(cast(f.fecha_fact as text),0,11) as date)='$fecha' 
  order by f.id_fact  desc limit 1) as segunda,
   sum(dff.sub_total_df) as total_fact
  FROM 
  facturacion.factura as ff, 
  facturacion.detalle_factura as dff
  where 
  ff.id_fact=dff.id_fact  
  and ff.status_fact=1 
  and dff.status_fact=1  
  and cast(substring(cast(ff.fecha_fact as text),0,11) as date)='$fecha' 
GROUP BY fecha, primera, segunda";
	$ressqlprim2=$conexHM->sentencia($sqlprim2);

// HEADERRRR
$html.="
<!doctype html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <META http-equiv=Content-Type content='text/html; charset=utf-8'>
  <link rel='stylesheet' href='../css/style.css'>
  <link rel='stylesheet' href='../css/bootstrap.css'>
  <title>Consulta de Movimientos Diarios</title>
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
$el='el';$o='o';
date_default_timezone_set("Venezuela/Caracas");
include "../lib_fecha_texto_jjcm.php";

    //imprimirmos el resultado	
	
$nombre="jhonathan jesus canchica moros";
$fn=fechaATexto("15/11/1991");
$nacionalidad="VEMEZOLANO";
$cedula="V-21002331";
$anoe="5to AÑO";
$niveleducacion="BACHILLERATO";
$aoescolar="2019-2020";
$fecha_impre=date('Y-m-d');
$hora_impre=date("h:i:s");
$fecha_impre2 = date('d-m-Y', strtotime($fecha_impre));
$mes=date('m');
switch($mes){
   case 1: $mesl="Enero"; break;        case 2: $mesl="Febrero"; break;    case 3: $mesl="Marzo"; break;        case 4: $mesl="Abril"; break;
   case 5: $mesl="Mayo"; break;         case 6: $mesl="Junio"; break;      case 7: $mesl="Julio"; break;        case 8: $mesl="Agosto"; break;
   case 9: $mesl="Septiembre"; break;   case 10: $mesl="Octubre"; break;   case 11: $mesl="Noviembre"; break;   case 12: $mesl="Diciembre"; break;
}
$ano=date('Y');
switch($ano){
   case 2019: $anol="Dos Mil Diecinueve"; break;
   case 2020: $anol="Dos Mil Veinte"; break;
   case 2021: $anol="Dos Mil Veintiuno"; break;
   case 2022: $anol="Dos Mil Veintidos"; break;
   case 2023: $anol="Dos Mil Veintitres"; break;
   case 2024: $anol="Dos Mil Veinticuatro"; break;
   case 2025: $anol="Dos Mil Veinticinco"; break;
   case 2026: $anol="Dos Mil Veintiseis"; break;
   case 2027: $anol="Dos Mil Veintisiete"; break;
   case 2028: $anol="Dos Mil Veintiocho"; break;
   case 2029: $anol="Dos Mil Veintinueve"; break;
   case 2030: $anol="Dos Mil Treinta"; break;
}
$dia=date('d');
switch($mes){
case 01: $dial="Uno"; break; case 02: $dial="Dos"; break; case 03: $dial="Tres"; break; case 04: $dial="Cuatro"; break;  case 05: $dial="Cinco"; break;  case 06: $dial="Seis"; break; case 07: $dial="Siete"; break; case 08: $dial="Ocho"; break;case 09: $dial="Nueve"; break;
case 1: $dial="Uno"; break; case 2: $dial="Dos"; break; case 3: $dial="Tres"; break; case 4: $dial="Cuatro"; break;case 5: $dial="Cinco"; break; case 6: $dial="Seis"; break;
case 7: $dial="Siete"; break; case 8: $dial="Ocho"; break; case 9: $dial="Nueve"; break;  case 10: $dial="Diez"; break;  case 11: $dial="Once"; break;  case 12: $dial="Doce"; break;case 13: $dial="Trece"; break;case 14: $dial="Catorce"; break;case 15: $dial="Quince"; break;case 16: $dial="Dieciseis"; break;case 17: $dial="Diecisiete"; break;case 18: $dial="Dieciocho"; break; case 19: $dial="Diecinueve"; break;case 20: $dial="Veinte"; break;case 21: $dial="Veintiuno"; break; case 22: $dial="Veintidos"; break; case 23: $dial="Veintitres"; break; case 24: $dial="Veinticuatro"; break; case 25: $dial="Veinticinco"; break; case 16: $dial="Veintiseis"; break; case 27: $dial="Veintisiete"; break; case 28: $dial="Veintiocho"; break; case 29: $dial="Veintinueve"; break; case 30: $dial="Treinta"; break; case 31: $dial="Treinta y uno"; break; 
}
 




$html.= "
<div id='header'>
<table width='100%' border='0' align='center'  cellspacing='0'>
   <tr>
    <td  width='25%'><p align='center'><img src='http://".$_SERVER['HTTP_HOST']."/sisadmac/stssai/Imagenes/logoeditable.png' height='100' width='90' title='Banner Superior'  /></p></td>
	
	 <td width='50%' ><p align='center' class='comoqueda4'><strong><em>UNIDAD EDUCATIVA <br>COLEGIO JUAN XXIII<br>
    Rif. J-30970529-6 </em></strong></p></td>
	 <td width='25%' ></td>
  </tr>
</table>
<br>
<div align='center'>
<h2><strong>CONSTANCIA DE ESTUDIOS</strong></h2>
</div>
</div>";

	$html.='<div id="footer">

	<p align="center"><strong>________________________________________<br>Lcda. REY LENNY <br>C.I V-17.369.750</strong> </p><br><br><br>
<hr/>
<table width="95%" border="0" align="center"  cellspacing="0" class="comoqueda3">
   <tr>
    <td width="40%"><p align="left">Avda. Principal Urb. Coromoto<br>N 29-82 La Concordia<br> San Cristobal Estado Táchira</td>
	<td width="60%"><p align="left">Telefono: 0276-3470992<br> Correo Electronico: u.e.colegiojuanxxiii@gmail.com<br>Rif.: J-30970529-6</p></td>
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
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quien suscribe, <strong>Lcda. REY LENNY</strong>, titular de la cédula  de identidad <strong>N V-17.369.750</strong>, en carácter  de Directora de la UNIDAD EDUCATIVA COLEGIO JUAN XXIII, con código  de plantel: S1727D2023. Por medio del presente documento <strong>hago constar que</strong>: $el ciudadan$o <strong>$nombre</strong> $nacionalidad, nacido el $fn, con cédula de identidad $cedula, es  estudiante del $anoe de $niveleducacion, en el año escolar $aoescolar.</p><br>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Constancia que se expide en San Cristóbal, a solicitud de parte interesada a los $dial días del mes de $mesl del año $anol.</p>
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


 $dompdf = new DOMPDF();

  $dompdf->load_html($html);// $dompdf->lastPage();
  $dompdf->set_paper("carta", "portrait");
  $dompdf->render();
  $dompdf->stream("CONSTANCIA_ESTUDIOS_".$fecha_format_4.".pdf",array('Attachment'=>0));
  
?>

