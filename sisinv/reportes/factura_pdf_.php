
<?php 
session_start();
//error_reporting(E_ALL); ini_set('display_errors', '1');
require_once('../conectarpg.php');
require_once("dompdf/dompdf_config.inc.php");
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);
@session_start();
$usuariox=$_SESSION["s_usuario"];
 

$firma_autorizada=$_SESSION["furma_aut"];

/*<hr style='border-color: #18c820 hsla(0,100%,50%,1); margin:0px; padding:0px;'>
<img src='http://".$_SERVER['HTTP_HOST']."/Imagenes/encabezado.jpg' title='Banner Superior' height='58' width='718' />
	<hr style='border-color: #18c820 hsla(0,100%,50%,1); margin:0px; padding:0px;'>
	<font size='xx-small'><b>Consultorio Odontol&oacute;gico de Ortodoncia y Ortopedia Funcional de los Maxilares</b></font>	*/


$id=$_REQUEST['nest'];


$id=$_REQUEST['nest'];

     	$sql2="SELECT 
  p.id,f.id_fact,f.fecha_fact,f.n_control_fact,f.sub_total_fact,f.iva_fact,f.total_fact,
  ((SELECT descripcion  FROM persona.prefijo_cedula where id=p.pre_cedula)||p.cedula) as cedula,
  (p.nombres||' '||p.apellidos) as nombres, 
  (pa.id) as id_per_fact, 
  ((SELECT descripcion  FROM persona.prefijo_cedula where id=pa.pre_cedula)||pa.cedula) as cedulafact, 
  (pa.nombres||' '||pa.apellidos) as apellido_fact, 
 ((SELECT (descrip_pais||' '||descrip_estado||' '||descrip_muni||' '||descrip_parro) as direccfact  FROM general.vista_ubicacion  where parroquia_id=pa.parroquia_r_id)||' '||pa.diresccion) as diresccion, 
 ('0'||(SELECT  numero FROM persona.prefijo_telefono where id=pa.pre_tel_hab)||'-'||pa.telf_habitacion) as tefefono1,
 ('0'||(SELECT  numero FROM persona.prefijo_telefono where id=pa.pre_tel_personal)||'-'||pa.telef_personal) as tefefono2

FROM 
  
  persona.persona as p,
  persona.persona_adicionales as pa,
  facturacion.factura as f
  
where 
f.id_fact='$id'
and f.id_per_fact=pa.id
and pa.id_persona_estu=p.id ";

$cantidad=$conex->sentencia($sql2);
	while($datos1=$conex->filas($cantidad)){
	 $numf=utf8_decode($datos1["id_fact"]);
	 $loo=strlen ($numf); 
			switch ($loo) {
			case ($loo=='1'):{$jo = '0000000'. $numf; break;}
			case ($loo=='2'):{$jo = '000000'. $numf; break;}
			case ($loo=='3'):{$jo = '00000'. $numf; break;}
			case ($loo=='4'):{$jo = '0000'. $numf; break;}
			case ($loo=='5'):{$jo = '000'. $numf; break;}
			case ($loo=='6'):{$jo = '00'. $numf; break;}
			case ($loo=='7'):{$jo = '0'. $numf; break;}
			case ($loo=='8'):{$jo = $numf; break;}
			default:   $jo = '';
						   }
	 
	 
	 $fec=utf8_decode($datos1["fecha_fact"]);
	 $fech=substr($fec,0,10);
	 $f=explode("-",$fech);
	 $fecha=$f[2]."-".$f[1]."-".$f[0];
	 $numc=utf8_decode($datos1["n_control_fact"]);
	  $sbf=utf8_decode($datos1["sub_total_fact"]);
	 $subf=substr($sbf,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	subttal
	  $ivt=utf8_decode($datos1["iva_fact"]);
	 $ivaf=substr($ivt,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	
	  $ttf=utf8_decode($datos1["total_fact"]);
	 $totalf=substr($ttf,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	
	 $idper=utf8_decode($datos1["id_per"]);

	 $nom=$datos1["apellido_fact"]; 
	 $ced=utf8_decode($datos1["cedulafact"]);
	 $direc=utf8_decode($datos1["diresccion"]);
	 $tel=utf8_decode($datos1["tefefono1"]);
	  $tel2=utf8_decode($datos1["tefefono2"]);

	 }
$res2="SELECT *
  FROM facturacion.detalle_factura
  where id_fact='$id' order by precio_unitario_df,iva_df";
$cantidad2=$conex->sentencia($res2);
$contfila=pg_num_rows($cantidad2);
$fechaimp=substr($fec,0,10);
$horaimp=substr($fec,10,9);
$html.="
<!doctype html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <META http-equiv=Content-Type content='text/html; charset=utf-8'>
  <title>FACTURA</title>
  <link rel='stylesheet' href='../../css/style.css'>
  <style>

@page {
margin-top: 0.5em;
margin-bottonm: 0.5em;
margin-left: 2em;
margin-right: 2em;
	}
  .caract{font-size:75%;line-height: 13.2px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;}
  </style>
  <head>
<body>


<table width='100%' border='0' bgcolor='#fff' style=' align='center' cellspacing='0' class='caract'>
  <tr >
	<td>
  
<table width='100%' border='0' align='center'>
  <tr >
	<td align='center' height='30'  >	
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

<table width='100%' border='0' align='center' cellspacing='0' style='border-bottom:hidden'>
 <tr >
	<td width='10%'><div align='center'><b>CANTIDAD</b></div></td>
	<td width='50%'><div align='center'><b>DESCRIPCION DEL SERVICIO</b></div></td>
	<td width='15%'><div align='center'><b>PRECIO UNITARIO</b></div></td>
	<td width='10%'><div align='center'><b>IMPUESTO</b></div></td>
	<td width='15%'><div align='center'><b>MONTO</b></div></td>
  </tr>";
//; border:solid
while($datos2=$conex->filas($cantidad2)){
	  $ser=utf8_decode($datos2['id_ser']); 

		 $res3=$conex->sentencia("SELECT *
	  FROM facturacion.servicio
	  where id_ser='$ser' ");
	  $cantd=utf8_decode($datos2['cantidad_ser_df']);
	  $preco=utf8_decode($datos2['precio_unitario_df']);
	 $pred=substr($preco,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	  
	  $ivadx=utf8_decode($datos2['iva_df']);
	  $ivad=substr($ivadx,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	  

	  $std=utf8_decode($datos2['sub_total_df']);
	 $subtd=substr($std,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA
	 
$html.=" <tr >
	<td><div align='center'>  $cantd </div></td>
	<td align='left'>";
		  while($producto=$conex->filas($res3)){
		  $serd=utf8_decode($producto["descripcion_ser"]); }
	 $html.="$serd &nbsp;&nbsp;</td>
	<td align='right'>  $pred  &nbsp;&nbsp;Bs.</td>
	<td align='right'>  $ivad  &nbsp;&nbsp;Bs.</td>			
	<td align='right'>  $subtd &nbsp;&nbsp;Bs.</td>
  </tr>";
  	}
		for($xx=$contfila;$xx<9;$xx++)
		{
		 $html.="<tr>
		 <td >&nbsp;</td>
		 <td >&nbsp;</td>
		 <td >&nbsp;</td>
		 <td >&nbsp;</td>
		 <td >&nbsp;</td>
		 </tr>";
		}
$html.="	
</table>

<table width='100%' border='0' align='center'  cellspacing='0'>
  <tr>
    <td width='85%' align='right'><b>SUBTOTAL:</b></td>
    <td width='15%' align='right'>  $subf &nbsp;&nbsp;&nbsp;Bs.</td>
  </tr>
  <tr>
    <td align='right'><b>IMPUESTO:</b></td>
    <td align='right'>  $ivaf &nbsp;&nbsp;&nbsp;Bs.</td>
  </tr>
  <tr>
    <td align='right'><b>TOTAL A PAGAR:</b></td>
    <td align='right'>  $totalf &nbsp;&nbsp;&nbsp;Bs.</td>
  </tr>
    <tr>
    <td align='right'>
	 <table width='100%'>
  <tr>
    <td><strong>FORMA DE PAGO:</strong></td>
    <td><strong>MONTO:</strong></td>
    <td><strong>N DEP.</strong></td>
    <td><strong>FECHA:</strong></td>
  </tr>";
   $formadepago="SELECT id, (SELECT descripcion_fp  FROM facturacion.forma_pago where id_fp=id_forma_pago) as formadepago, monto, codigo_transsaccion,substring(CAST(fecha as text),0,11 ) as fecha
  FROM facturacion.factura_f_pago
  WHERE id_factura=$id AND estatus_id=1";
$fiformadepago=$conex->sentencia($formadepago);
	while($datos_fopag=$conex->filas($fiformadepago)){
	 $formadepago=utf8_decode($datos_fopag["formadepago"]);
	   $codigo_transsaccion=utf8_decode($datos_fopag["codigo_transsaccion"]);
	   $fecha_formadepago=utf8_decode($datos_fopag["fecha"]);
	  $monto=utf8_decode($datos_fopag["monto"]);
	 $montof=substr($monto,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	
$html.="		
	<tr><td>$formadepago</td><td>$montof Bs.</td><td>$codigo_transsaccion</td><td>$fecha_formadepago</td></tr>";
}
$html.="	
</table>
<td ><strong>FIRMA AUTORIZADA:</strong><b>$firma_autorizada</b></td>
	</td>
  </tr>
</table>  	


	</td>
  </tr >
</table>
";
$html.="</body>";
	
  $dompdf = new DOMPDF();
  //se carga el codigo html
 $dompdf->load_html($html);
  //aumentamos memoria del servidor si es necesario
  //portrait= VERTICAL letter
 // $tamanopapel="array(0,0,500,500)";
  $dompdf->set_paper(array(0,0,400,792), "landscape");
 // $dompdf->set_paper('a6', 'landscape');

  //lanzamos a render
  $dompdf->render();
  //guardamos a PDF
  $dompdf->stream('Factura-'.$numf.'_'.date("d-m-Y").'.pdf',array('Attachment'=>0));

?>