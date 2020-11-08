<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title>FACTURA</title>
<!--<link rel="stylesheet" href="../../css/style.css">
<link href="../../css/calendario.css" type="text/css" rel="stylesheet">
<script src="../../js/calendar.js" type="text/javascript"></script>
<script src="../../js/calendar-es.js" type="text/javascript"></script>
<script src="../../js/calendar-setup.js" type="text/javascript"></script>-->
</head>

<?Php 
	session_start();  
//error_reporting(E_ALL); ini_set('display_errors', '1');
     require_once('conectarpg.php');
	 $conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);
/*
	function listar_fp($conex)
	{	
		$fp=$conex->sentencia("SELECT id_fp, descripcion_fp, status_fp
	  FROM facturacion.forma_pago order by id_fp");
		echo "<select class='form-control1' name='fp_factura' id='fp_factura'  style='width:80%;'>";
		echo "<option  value=''> Seleccione </option>";	
		while($formapago=$conex->filas($fp))
		{
		echo "<option value='$formapago[0]'> $formapago[1] </option>";	
		}
		echo "</select>";	
			
	}//fin de la función listar_fp
	*/
	function nrof($conex)
	{
	$sql=$conex->sentencia("select id_fact from facturacion.factura
order by  id_fact desc limit 1");
	$factura=$conex->xfilas($sql);
	if (($factura[0]=='')or($factura[0]!='')){

		 $lo =  $factura[0]+1;
		$loo=strlen ($lo); 
			switch ($loo) {
			case ($loo=='1'):{$jo = '0000000'. $lo; break;}
			case ($loo=='2'):{$jo = '000000'. $lo; break;}
			case ($loo=='3'):{$jo = '00000'. $lo; break;}
			case ($loo=='4'):{$jo = '0000'. $lo; break;}
			case ($loo=='5'):{$jo = '000'. $lo; break;}
			case ($loo=='6'):{$jo = '00'. $lo; break;}
			case ($loo=='7'):{$jo = '0'. $lo; break;}
			case ($loo=='8'):{$jo = $lo; break;}
			default:   $jo = '';
						   }
			return  $jo;}
	else
		return ñ;
	}//fin de la función nrof
	function nroc($conex)
	{
	$sql=$conex->sentencia("select max(n_control_fact) from facturacion.factura");
	$factura=$conex->xfilas($sql);
	if (($factura[0]=='')or($factura[0]!='')){
		$lo =  $factura[0]+1;
		$loo=strlen ($lo); 
			switch ($loo) {
			case ($loo==''):{$jo = '0000000'. $lo; break;}
			case ($loo=='1'):{$jo = '0000000'. $lo; break;}
			case ($loo=='2'):{$jo = '000000'. $lo; break;}
			case ($loo=='3'):{$jo = '00000'. $lo; break;}
			case ($loo=='4'):{$jo = '0000'. $lo; break;}
			case ($loo=='5'):{$jo = '000'. $lo; break;}
			case ($loo=='6'):{$jo = '00'. $lo; break;}
			case ($loo=='7'):{$jo = '0'. $lo; break;}
			case ($loo=='8'):{$jo = $lo; break;}
			default:   $jo = '';
						   }
			return  $jo;}
	else
		return ñ;
	}//fin de la función nroc
?>
<script>
<!-- recarga en la misma página el detalle de factura -->
function sumar(numero)
{
var suma;
var impuesto;
var cantidad;
var precio;
var subtotal;
var impu;
var imp;
var pre;
var pro;
var total;
cantidad='cantidad'+numero;
precio='precio'+numero;
impuesto='impuesto'+numero;
impuestom='impuestom'+numero;
subtotal='subtotal'+numero;
producto='producto'+numero;

pre=document.getElementById(producto).value.split("#")
document.getElementById(precio).value=pre[1].split("#")//monto
document.getElementById(impuesto).value=pre[2].split("#")//monto iva
document.getElementById(impuestom).value=pre[3]; //descripcion iva

//alert(document.getElementById(impuesto).value);
//alert(document.getElementById(precio).value);
sumai=parseFloat((document.getElementById(cantidad).value))*parseFloat((document.getElementById(precio).value));	

impucal=0;
//parseFloat(document.getElementById(impuesto).value)/100
impu=parseFloat( document.getElementById(impuesto).value / 100);
imp=parseFloat(impucal) * parseFloat(sumai);
//alert(imp);

precio=parseFloat(document.getElementById(precio).value) - (parseFloat(document.getElementById(precio).value) * parseFloat(impucal));

suma=(document.getElementById(cantidad).value) * parseFloat(precio);	



document.getElementById(impuesto).value=imp.toFixed(2);
document.getElementById(subtotal).value=suma.toFixed(2);
//alert(suma);
 var acum_imp=0
 var acum_sub=0
 var fil=document.getElementById("fila").value
 /*Hacemos un ciclo desde 0 hasta fila, donde acumularemos el total de impuestos y subtotales*/
for(x=0;x<fil;x++)
	{
	try//es una función q asume el error pero es controlado y sigue...Y es parecida al if y else
			{
		acum_imp=parseFloat(acum_imp.toFixed(2))+parseFloat(document.getElementById("impuesto"+x).value)
		acum_sub=parseFloat(acum_sub.toFixed(2))+parseFloat(document.getElementById("subtotal"+x).value)
		}catch(error)
		{
		error=1
		}
	}
document.getElementById("subtotal").value=acum_sub.toFixed(2)
document.getElementById("impuesto").value=acum_imp.toFixed(2)

total=document.getElementById("total").value=
parseFloat(document.getElementById("subtotal").value) +
parseFloat(document.getElementById("impuesto").value) 
document.getElementById("total").value=total.toFixed(2);
}// Fin de la función sumar


function buscar_cliente()
{
/*Primero tomamos la cédula del cliente a buacar */
var ced=document.getElementById("cedula").value
var pced=document.getElementById("preced").value
/*Creamos un objeto de tipo XMLHttpRequest*/
var objAjax=new XMLHttpRequest()
objAjax.open("GET","controlador.php?accion=buscar_cliente&cedula="+ced+"&preced="+pced,true)
/*Llamamos a la función open para decirle qué página del servidor necesitamos que se ejecute y le enivamos los datos que sean necesarios*/
objAjax.onreadystatechange=function() /*Preguntamos por onreadystatechange para que nos avise cuando exista un cambio de readyState*/
/*function() es una función anónima porq se ejecuta lo que tiene dentro*/
	{
	/*alert("el valor de status es:"+objAjax.status)
	alert("el valor de readyState es:"+objAjax.readyState)*/
	if(objAjax.status==200 && objAjax.readyState==4)
		{
		/*readyState vale 4 cuando recibimos toda la data y status vale 200 ->ok ó 404 -> no encontrado ó 500 -> error*/
		/*Lo que el servidor me devolvio (responseText) lo coloco en la zona dinámica*/
		document.getElementById("fila_cliente").innerHTML=objAjax.responseText
		/*el innerHTML toma la información como parte de su código fuente*/
		}
	}
objAjax.send(null)
}//Fin de la función buscar_cliente

function agregar_fila()
{
//Tomamos el valor de la fila actual
var contador=document.getElementById("fila").value
/*Instanciamos un objeto SMLHttpRequest*/
var objAjax2=new XMLHttpRequest()
objAjax2.open("GET","controlador.php?accion=pintar_fila&fila="+contador,true)
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

function borrar_fila(fila)
{
//Borramos lafila asignando vacío a su código fuente
document.getElementById("fila"+fila).innerHTML=""
sumar(0)
}//Fin de la función borrar_fila
//-->
</script>
<body>
<h4 class='titulo'> INGRESE LOS DATOS DE LA FACTURA</h4>
<div class="gradiente">
<form action="index_o.php?s=gfactura3" method="post" name="formulario" onsubmit="return validar(this);" >
<!--  Tabla superior para la Factura   -->
<input type="hidden" name="fila" id="fila" value="0">
<!--Creamos la variable que nos servirá como contador al momento de crear las filas-->
<!-- DETALLES -->
<input name="fecha_factura" id="fecha_factura" type="hidden" value="<?php echo date('Y-m-d H:i:s') ?>" >
<!--	ñ=	&ntilde;	-->	
<table width="100%" border="1" align="center" bgcolor="#EDEDED" style="font-size:13px">
  <tr>
	<td align="center" width="33%"><b>NRO. DE FACTURA EMITIDA POR EL SISTEMA:</b>
	  <input class="form-control1" name="numero_control" id="numero_control" type="text" size="15" maxlength="10"  style="width:100px;"  value="<?php echo nroc($conex); ?>" readonly="readonly"></td>
    <td align="center" width="33%"><b>NRO. DE FACTURA:</b>
      <input class="form-control1" name="numero_factura" id="numero_factura" type="text" size="15" maxlength="10"  style="width:100px;"  value="<?php echo nrof($conex); ?>" readonly="readonly"></td>
    <td align="center" width="33%"><b>FECHA DE EMISION:</b>
       <input  name="fecha_mostrar" type="text"   size="10" maxlength="10" value="<?php echo date('d-m-Y H:i:s') ?>" style="width:100px;"  readonly="readonly" class=":required form-control1"></td>
  </tr>  
<!-- -->
  <tr>
	<td align="center" width="33%" >
		<table width="100%"  align="center" border="0" >
		<tr align="center"><td colspan="2"><b>NRO. DE IDENTIFICACION:</b></td></tr>	
		<tr><td width="75%" align="right" >
		<select class="form-control1" name="preced" id="preced" style='width:60px'>
			<option selected value="V-">V-</option>
			<option value="E-">E-</option>
			<option value="P-">P-</option>
		</select>
		<input class="form-control1" type="text" name='cedula' id='cedula'  autofocus="autofocus"  size="8" maxlength="12" style='width:45%;' onkeyup="this.value=this.value.toUpperCase();" onkeypress='ValidaSoloNumeros()'>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="25%"align="left"><p style="width:100%"><a href="javascript:buscar_cliente()"><img src='http://<?Php  echo  $_SERVER['HTTP_HOST']; ?>/sisadmac/stssai/Imagenes/buscar-personas-internet2.png' height='40%' width='50%' title="BUSCAR"/><br/><b>BUSCAR</b></a></p></td></tr></table>
	</td>
	<!--Llamamos a la función de javascript buscar_cliente()-->
    <td align="center" width="33%"><b>FORMA DE PAGO:</b></br><?php 	/*echo listar_fp($conex);*/?></td>
	<td align='center'  width='33%'>
		<a href='javascript:agregar_fila()'><img src='http://<?Php  echo  $_SERVER['HTTP_HOST']; ?>/sisadmac/stssai/Imagenes/add.png' height='30' width='30' title='+ SERVICIO'/></br><b>AGREGAR SERVICIO</b></a>   </td>
  </tr>
  <tr>
    <td colspan="3" id="fila_cliente"></td><!--FILA DINÄMICA: se crea la zona dinámica donde se recargarán los datos del cliente-->
  </tr>
</table>


<table width="100%" border="1" align="center" bgcolor='#EDEDED' style="font-size: 13px">
  <tr align="center" bgcolor="#EDEDED">

<td width='10%'><b>ELIMINAR</b></td>
<td width='10%'><b>CANTIDAD</b></td>
<td width='40%'><b>DESCRIPCION DE LA PRESTACION DEL SERVICIO</b></td>
<td width='15%'><b>PRECIO UNITARIO</b></td>
<td width='10%'><b>IMPUESTO</b></td><!---->
<td width='15%'><b>MONTO</b></td>
  </tr>
  <tr id="fila0"></tr>
  <tr id="fila1"></tr>
  <tr id="fila2"></tr>
  <tr id="fila3"></tr>
  <tr id="fila4"></tr>
  <tr id="fila5"></tr>
  <tr id="fila6"></tr>
  <tr id="fila7"></tr>
 <!-- <tr id="fila8"></tr>
  <tr id="fila9"></tr>   --> 
</table>

<table width="100%" border="1" align="center" bgcolor='#EDEDED'  style="font-size: 13px">
  <tr>
    <td width="85%" align="right"><b>SUBTOTAL:</b></td>
    <td  align="center" width="15%"><input class="form-control1" name="subtotal" type="text" size="15" maxlength="15" value="0" id="subtotal" readonly="readonly" style='width:85%;' ></td>
  </tr>
  <tr>
    <td align="right"><b>IMPUESTO:</b></td>
    <td align="center"><input class="form-control1" name="impuesto" type="text" value="0" size="15" maxlength="15" id="impuesto" readonly="readonly" style='width:85%;' ></td>
  </tr>
  <tr>
    <td align="right"><b>VALOR TOTAL DE LA PRESTACION DEL SERVICIO:</b></td>
    <td align="center"><input class="form-control1" name="total" type="text" value="0" size="15" maxlength="15" id="total" readonly="readonly" style='width:85%;' ></td>
  </tr>
   <tr>

   <input name="estatus_factura" id="estatus_factura" type="hidden" value="1" >
     <td colspan="2" height='30' align="center">
    <input name="boton" type="submit" value="GUARDAR" class="btn" ></td>
  </tr>

</table>


</form>
</div><!-- gradiente -->

</body>
</html>

<script language="JavaScript" type="text/javascript">
function validar(formulario){

	//cedula	
if (document.formulario.cedula.value==""){
       alert("Por favor ingrese cedula")
       document.formulario.cedula.focus()
       return false;
    } 	

	//forma de pago
if (document.formulario.fp_factura.value==""){
       alert("Por favor elija un forma de pago")
       document.formulario.fp_factura.focus()
       return false;
    } 
/*if (document.formulario.id_per.value==null) {
       alert("Por favor busque nuevamente cédula del paciente")
       document.formulario.cedula.focus()
       return false;
}	*/
	// inicio de cantidad  y servicio
	if (document.formulario.cantidad0.value==""){
       alert("Por favor introduzca 1ra cantidad de servicio")
       document.formulario.cantidad0.focus()
       return false;
    } 
if (document.formulario.producto0.value==""){
       alert("Por favor elija 1er servicio")
       document.formulario.producto0.focus()
       return false;
    } 
if (document.formulario.cantidad1.value==""){
       alert("Por favor introduzca 2da cantidad de servicio")
       document.formulario.cantidad1.focus()
       return false;
    } 
if (document.formulario.producto1.value==""){
       alert("Por favor elija 2do servicio")
       document.formulario.producto1.focus()
       return false;
    } 
if (document.formulario.cantidad2.value==""){
       alert("Por favor introduzca 3ra cantidad de servicio")
       document.formulario.cantidad2.focus()
       return false;
	  
    } 
if (document.formulario.producto2.value==""){
       alert("Por favor elija 3er servicio")
       document.formulario.producto2.focus()
       return false;
    } 
if (document.formulario.cantidad3.value==""){
       alert("Por favor introduzca 4ta cantidad de servicio")
       document.formulario.cantidad3.focus()
       return false;
    } 
if (document.formulario.producto3.value==""){
       alert("Por favor elija 4to servicio")
       document.formulario.producto3.focus()
       return false;
    } 
if (document.formulario.cantidad4.value==""){
       alert("Por favor introduzca 5ta cantidad de servicio")
       document.formulario.cantidad4.focus()
       return false;
    } 
if (document.formulario.producto4.value==""){
       alert("Por favor elija 5to servicio")
       document.formulario.producto4.focus()
       return false;
    } 
if (document.formulario.cantidad5.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formulario.cantidad5.focus()
       return false;
    } 
if (document.formulario.producto5.value==""){
       alert("Por favor elija servicio")
       document.formulario.producto5.focus()
       return false;
    } 
if (document.formulario.cantidad6.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formulario.cantidad6.focus()
       return false;
    } 
if (document.formulario.producto6.value==""){
       alert("Por favor elija servicio")
       document.formulario.producto6.focus()
       return false;
    } 
if (document.formulario.cantidad7.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formulario.cantidad7.focus()
       return false;
    } 
if (document.formulario.producto7.value==""){
       alert("Por favor elija servicio")
       document.formulario.producto7.focus()
       return false;
    } 
if (document.formulario.cantidad8.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formulario.cantidad8.focus()
       return false;
    } 
if (document.formulario.producto8.value==""){
       alert("Por favor elija servicio")
       document.formulario.producto8.focus()
       return false;
    } 
if (document.formulario.cantidad9.value==""){
       alert("Por favor introduzca cantidad de servicio")
       document.formulario.cantidad9.focus()
       return false;
    } 
if (document.formulario.producto9.value==""){
       alert("Por favor elija servicio")
       document.formulario.producto9.focus()
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






