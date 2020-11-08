

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title>FACTURA</title>
</head>

<body>
<h4 class='titulo'> INGRESE LOS DATOS DE LA FACTURA</h4>
<div class="gradiente">
<form action="index.php?s=gfactura3" method="post" name="formulario" onSubmit="return validar(this);" >
<!--  Tabla superior para la Factura   -->
<input  type="hidden" name="fila" id="fila" value="0">
<!--Creamos la variable que nos servirá como contador al momento de crear las filas-->
<!-- DETALLES -->
<input name="fecha_factura" id="fecha_factura" type="hidden" value="<?php echo date('Y-m-d H:i:s') ?>" >
<!--	ñ=	&ntilde;	-->	
<table width="100%" border="1" align="center" bgcolor="#EDEDED" style="font-size:13px">
  <tr>
	<td align="center" width="33%"><b>NRO. DE FACTURA EMITIDA POR EL SISTEMA:</b>
	  <input class="form-control1" name="numero_control" id="numero_control" type="text" size="15" maxlength="10"  style="width:100px;"  value="" readonly="readonly"></td>
    <td align="center" width="33%"><b>NRO. DE FACTURA:</b>
      <input class="form-control1" name="numero_factura" id="numero_factura" type="text" size="15" maxlength="10"  style="width:100px;"  value="" readonly="readonly"></td>
    <td align="center" width="33%"><b>FECHA DE EMISION:</b>
       <input  name="fecha_mostrar" type="text"   size="10" maxlength="10" value="<?php echo date('d-m-Y H:i:s') ?>" style="width:100px;"  readonly="readonly" class=":required form-control1"></td>
  </tr>  
<!-- -->
  <tr>
	<td align="center" width="33%" >
	<b>NRO. DE IDENTIFICACION:</b>
		<input onKeyUp="cargarperfact('8')"  class="form-control1" type="text" name='cedula' id='cedula'  autofocus="autofocus"  size="8" maxlength="12" style='width:45%;'>
	</td>
	<!--Llamamos a la función de javascript buscar_cliente()-->
    <td align="center" width="33%"><div id="divpersonafact"></div></td>
	<td align='center'  width='33%'><div id="divservmost"></div> </td>
  </tr>
  <tr>
    <td colspan="3" id="fila_cliente"><div id="divtablapersona"></div></td><!--FILA DINÄMICA: se crea la zona dinámica donde se recargarán los datos del cliente-->
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
<!--  <tr id="fila6"></tr>
  <tr id="fila7"></tr>
  <tr id="fila8"></tr>
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






