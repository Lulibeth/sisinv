<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title>FORMA DE PAGO</title>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
</style>
</head>

<?Php 
	session_start();  
//error_reporting(E_ALL); ini_set('display_errors', '1');
require_once('conectarpg.php');
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$id=$_REQUEST['id'];
$id_facturaxsd=$_REQUEST['id'];
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
     $totalapago=str_replace(".","",$totalf);

	 $nom=$datos1["apellido_fact"]; 
	 $ced=utf8_decode($datos1["cedulafact"]);
	 $direc=utf8_decode($datos1["diresccion"]);
	 $tel=utf8_decode($datos1["tefefono1"]);
	 $tel2=utf8_decode($datos1["tefefono2"]);

	 }
?>
<script>
<!-- recarga en la misma página el detalle de factura -->
function sumar(numero)
{
var suma;
var monto;
var fp_factura;
var ntrans;
var fechfatran;
var total;
monto='monto'+numero;
fp_factura='fp_factura'+numero;
ntrans='ntrans'+numero;
fechfatran='fechfatran'+numero;
 var acum_imp=0
 var fil=document.getElementById("fila").value
 /*Hacemos un ciclo desde 0 hasta fila, donde acumularemos el total de impuestos y subtotales*/
for(x=0;x<fil;x++)
	{
	try//es una función q asume el error pero es controlado y sigue...Y es parecida al if y else
			{
		acum_imp=parseFloat(acum_imp.toFixed(2))+parseFloat(document.getElementById("monto"+x).value)
		}catch(error)
		{
		error=1
		}
	}
document.getElementById("total").value=acum_imp.toFixed(2);
if((document.getElementById("total").value)>=(document.getElementById("totalfactura").value))
		{	
		
		document.getElementById("mosbenmen").innerHTML="<button type='submit' class='btn btn-primary'>Guardar</button>";
		return true;
		}else{
		document.getElementById("mosbenmen").innerHTML="";
		return false;
		}
	
}// Fin de la función sumar




function agregar_fila2x(numfac)
{
facturaidx=0;
//Tomamos el valor de la fila actual
var contador=document.getElementById("fila").value;
var facturaidx=numfac;
//alert(facturaidx);
/*Instanciamos un objeto SMLHttpRequest*/
var objAjax2=new XMLHttpRequest()
objAjax2.open("GET","controlador.php?accion=pintar_fila2&fila="+contador+"&facturaid="+facturaidx,true)
/*llamamos a la propiedad onreadystatechange que me indicará cuando exista un cambio en readySate*/
objAjax2.onreadystatechange=function()
	{
	/*alert("el valor de status es:"+objAjax2.status)
	alert("el valor de readyState es:"+objAjax2.readyState)*/
	if(objAjax2.status==200 && objAjax2.readyState==4)
		{//Si cumple con la condición status==200 y readyState==4 es porque tuvimos comunicación exitosa con el servidor y ya tenemos cargada la respuesta (responseText)
		document.getElementById("fila"+contador).innerHTML=objAjax2.responseText
		document.getElementById("fila").value=parseInt(contador)+parseInt(1)
		}
	}
	objAjax2.send(null)
}//Fin de la función agregar_fila

function borrar_fila2(fila)
{
//Borramos lafila asignando vacío a su código fuente
document.getElementById("fila"+fila).innerHTML=""
sumar(0)
}//Fin de la función borrar_fila
//-->
</script>
<body>
<h4 class='titulo'> INGRESE FORMA DE PAGO DE LA FACTURA</h4>
<div class="gradiente">
<form action="index_o.php?s=gfactura3gf" method="post" name="formularioxc" onsubmit="return validar(this);" >
<!--  Tabla superior para la Factura   -->
<input type="hidden" name="fila" id="fila" value="0">
<input type="hidden" name="facturan" id="facturan" value="<?php echo $numf; ?>">
<input type="hidden" name="totalfactura" id="totalfactura" value="<?php echo $totalapago; ?>">

<table class="table-condensed" width="100%">
  <tr>
    <td colspan="2"><div align="center"><b>FACTURA N&deg; <?php echo $jo; ?></b></div></td>
    <td colspan="2"><div align="center"><b>FECHA  DE EMISION:&nbsp;</b><?php echo substr($fecha,0,10); ?></div></td>
    <td colspan="2"><div align="center"><b>HORA DE EMISION:&nbsp;</b><?php echo substr($fecha,11,19); ?></div></td>
  </tr>
  <tr>
    <td><b>NOMBRE O RAZON SOCIAL: </b></td>
    <td colspan="5"><?php echo $nom; ?></td>
  </tr>
  <tr>
    <td><b>CED/RIF:</b></td>
    <td><?php echo $ced; ?></td>
    <td><b>TELEFONOS:</b><?php echo $tel; ?></td>
    <td><?php echo $tel2; ?></td>
    <td><strong>TOTAL DE MONTO A PAGAR </strong></td>
    <td><span class="Estilo1"><?php echo $totalf; ?></span></td>
  </tr>
  <tr>
    <td><b>DIRECCION</b></td>
    <td colspan="3"><?php echo $direc; ?></td>
	<td colspan="5"><a href='javascript:agregar_fila2x(<?php echo $numf; ?>)'><img src='http://<?Php  echo  $_SERVER['HTTP_HOST']; ?>/sisadmac/stssai/Imagenes/add.png' height='30' width='30' title='+ SERVICIO'/></br><b>AGREGAR SERVICIO</b></a> </td>
  </tr>
</table>



<table width="100%" border="1" align="center" bgcolor='#EDEDED' style="font-size: 13px">
  <tr align="center" bgcolor="#EDEDED">
 <tr>
    <td width="5%"><div align="center"><strong>#</strong></div></td>
    <td width="25%"><div align="center"><strong>MONTO</strong></div></td>
	<td width="15%"><div align="center"><strong>FORMA DE PAGO </strong></div></td>
    <td width="20%"><div align="center"><strong>N DE TRANSACCION </strong></div></td>
    <td width="15%"><div align="center"><strong>FECHA</strong></div></td>
	<td width="20%"><div align="center"><strong>SERVICIO</strong></div></td>

  </tr>
  </tr>
  <tr id="fila0"></tr>
  <tr id="fila1"></tr>
  <tr id="fila2"></tr>
  <tr id="fila3"></tr>
  <tr id="fila4"></tr>
  <tr id="fila5"></tr>
</table>

<table width="100%" border="1" align="center" bgcolor='#EDEDED'  style="font-size: 13px">
 
  <tr>
    <td align="right"><b>VALOR TOTAL DE LA PRESTACION DEL SERVICIO:</b></td>
    <td align="center"><input class="form-control1" name="total" type="text" value="0" size="15" maxlength="15" id="total" readonly="readonly" style='width:85%;' ></td>
  </tr>
   <tr>
     <td colspan="2" height='30' align="center"><div id="mosbenmen"></div></td>
  </tr>

</table>


</form>
</div><!-- gradiente -->

</body>
</html>

<script language="JavaScript" type="text/javascript">
function validar(formularioxc){

	//cedula	
if (document.formularioxc.cedula.value==""){
       alert("Por favor ingrese cedula")
       document.formularioxc.cedula.focus()
       return false;
    } 	

	//forma de pago
if (document.formularioxc.fp_factura.value==""){
       alert("Por favor elija un forma de pago")
       document.formularioxc.fp_factura.focus()
       return false;
    } 
/*if (document.formularioxc.id_per.value==null) {
       alert("Por favor busque nuevamente cédula del paciente")
       document.formularioxc.cedula.focus()
       return false;
}	*/
	// inicio de cantidad  y servicio
	if (document.formularioxc.cantidad0.value==""){
       alert("Por favor introduzca 1ra cantidad de servicio")
       document.formularioxc.cantidad0.focus()
       return false;
    } 
if (document.formularioxc.producto0.value==""){
       alert("Por favor elija 1er servicio")
       document.formularioxc.producto0.focus()
       return false;
    } 
if (document.formularioxc.cantidad1.value==""){
       alert("Por favor introduzca 2da cantidad de servicio")
       document.formularioxc.cantidad1.focus()
       return false;
    } 
if (document.formularioxc.producto1.value==""){
       alert("Por favor elija 2do servicio")
       document.formularioxc.producto1.focus()
       return false;
    } 
if (document.formularioxc.cantidad2.value==""){
       alert("Por favor introduzca 3ra cantidad de servicio")
       document.formularioxc.cantidad2.focus()
       return false;
	  
    } 
if (document.formularioxc.producto2.value==""){
       alert("Por favor elija 3er servicio")
       document.formularioxc.producto2.focus()
       return false;
    } 
if (document.formularioxc.cantidad3.value==""){
       alert("Por favor introduzca 4ta cantidad de servicio")
       document.formularioxc.cantidad3.focus()
       return false;
    } 
if (document.formularioxc.producto3.value==""){
       alert("Por favor elija 4to servicio")
       document.formularioxc.producto3.focus()
       return false;
    } 
if (document.formularioxc.cantidad4.value==""){
       alert("Por favor introduzca 5ta cantidad de servicio")
       document.formularioxc.cantidad4.focus()
       return false;
    } 
if (document.formularioxc.producto4.value==""){
       alert("Por favor elija 5to servicio")
       document.formularioxc.producto4.focus()
       return false;
    } 
if (document.formularioxc.cantidad5.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formularioxc.cantidad5.focus()
       return false;
    } 
if (document.formularioxc.producto5.value==""){
       alert("Por favor elija servicio")
       document.formularioxc.producto5.focus()
       return false;
    } 
if (document.formularioxc.cantidad6.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formularioxc.cantidad6.focus()
       return false;
    } 
if (document.formularioxc.producto6.value==""){
       alert("Por favor elija servicio")
       document.formularioxc.producto6.focus()
       return false;
    } 
if (document.formularioxc.cantidad7.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formularioxc.cantidad7.focus()
       return false;
    } 
if (document.formularioxc.producto7.value==""){
       alert("Por favor elija servicio")
       document.formularioxc.producto7.focus()
       return false;
    } 
if (document.formularioxc.cantidad8.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formularioxc.cantidad8.focus()
       return false;
    } 
if (document.formularioxc.producto8.value==""){
       alert("Por favor elija servicio")
       document.formularioxc.producto8.focus()
       return false;
    } 
if (document.formularioxc.cantidad9.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formularioxc.cantidad9.focus()
       return false;
    } 
if (document.formularioxc.producto9.value==""){
       alert("Por favor elija servicio")
       document.formularioxc.producto9.focus()
       return false;
    } 
// fin de cantidad 


// inicio de servicio
// fin de servicio 
	

}




function ValidaSoloNumeros() 
{
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}


</script>






