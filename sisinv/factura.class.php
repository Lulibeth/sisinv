<?php
/*Para crear una clase en php usamos la sentencia class*/
class factura
{
	function imprimir_fila($x,$fila,$id_per)
	{
		echo "<td align='center' width='30px'><a href='javascript:borrar_fila($fila)'>
			<img src='http://".$_SERVER['HTTP_HOST']."/sisadmac/stssai/Imagenes/menos.png' height='30' width='30'  title='ELIMINAR'/></a></td>";
		echo "<td align='center' width='90px'>
			<input class='form-control1' name='cantidad$fila' id='cantidad$fila' type='text'  style='width:80%;' value='' size='5' maxlength='2' onChange='sumar($fila)' onkeypress='ValidaSoloNumeros()'></td>
		<td  align='center' width='200px'>";
		$this-> listar_productos($x,$fila,$id_per);
		/*la sentencia $this sirve para instancial un objeto de su misma clase*/
		echo "</td>
		<td align='center' width='100px'>
		<input class='form-control1' align='center' name='precio$fila' id='precio$fila' type='text' value='0' size='5' maxlength='5'  style='width:80%;' readonly='readonly' onChange='sumar($fila)'></td>
		<td align='center' width='100px'> 
		<input class='form-control1' name='impuesto$fila' id='impuesto$fila' type='hidden'  value='0' size='5' maxlength='5'  style='width:80%;' readonly='readonly'>
		<input class='form-control1' name='impuestom$fila' id='impuestom$fila' type='text'  value='0' size='5' maxlength='5'  style='width:80%;' readonly='readonly'></td>"; /*	*/
	   echo " <td align='center' width='100px'>
		<input class='form-control1' name='subtotal$fila' id='subtotal$fila' type='text' value='0' size='5' maxlength=''5'  style='width:85%;' readonly='readonly'></td>";
	}//Fin de la función imprimir_fila
	
	function listar_productos($conexion,$nro,$id_per)
	{	
/*
SELECT s.id_ser, s.descripcion_ser, d.monto, s.status_ser, s.nivel_ser,  s.iva_ser, s.fecha_ser, i.porcentaje_iva, i.descripcion_iva,d.fecha_tope
	  FROM facturacion.servicio as s, 
	  facturacion.iva as i,	
	    facturacion.deuda as d

	  where 
	  id_iva=iva_ser 
	  and s.id_ser=d.id_servicio
	  and id_estudiante=$id_per
	  and d.monto!='0,00'
	  and  id_estado_deuda='1'
	  order by id_ser
*/

		$sql=$conexion->sentencia("SELECT s.id_ser, s.descripcion_ser, s.precio_ser, s.status_ser, s.nivel_ser,  s.iva_ser, s.fecha_ser, i.porcentaje_iva, i.descripcion_iva
	  FROM facturacion.servicio as s, 
	  facturacion.iva as i
	  where 
	  id_iva=iva_ser 
	  and s.precio_ser!='0,00'
	  order by id_ser");
	//	$resultado=pg_query($sql,$x);
		echo "<select class='form-control1' name='producto$nro' id='producto$nro'  style='width:90%;' onchange='sumar($nro)'>";
		echo "<option  value='' >Seleccione </option>";	
		while($producto=$conexion->filas($sql))
		{
			 $pre=utf8_decode($producto[2]);
	 $prec=substr($pre,1); //RECORTAR EL SÍMBOLO DE MONEDA
//	 $t=substr_cont($fech);
	// $tt=intstrlen(string $fech);
	 $pr=substr($pre,0,-1);
	 $p=explode(".",$pr);
	 	 $costop=$p[0]."".$p[1]."".$p[2]."".$p[3]."".$p[4]."".$p[5]."".$p[6]."".$p[7]."".$p[8]."".$p[9];


		echo "<option value='$producto[0]#$costop#$producto[7]#$producto[8]'>  $producto[1]&nbsp;Bs&nbsp;-->&nbsp;&nbsp;$costop &nbsp;&nbsp;IVA -->&nbsp;$producto[8]</option>
		";	
		}
		echo "</select>";	
	}//fin de la función listar_productos



function listar_productosx($conexion,$nro,$id_per)
	{	

		$sql=$conexion->sentencia("SELECT s.id_ser, s.descripcion_ser, d.monto, s.status_ser, s.nivel_ser,  s.iva_ser, s.fecha_ser, i.porcentaje_iva, i.descripcion_iva,d.fecha_tope
	  FROM facturacion.servicio as s, 
	  facturacion.iva as i,	
	    facturacion.deuda as d

	  where 
	  id_iva=iva_ser 
	  and s.id_ser=d.id_servicio
	  and id_estudiante=$id_per
	  and d.monto!='0,00'
	  and  id_estado_deuda='1'
	  order by id_ser");
	//	$resultado=pg_query($sql,$x);
		echo "<select class='form-control1' name='producto$nro' id='producto$nro'  style='width:90%;' onchange='sumar($nro)'>";
		echo "<option  value='' >Seleccione </option>";	
		while($producto=$conexion->filas($sql))
		{
			 $pre=utf8_decode($producto[2]);
	 $prec=substr($pre,1); //RECORTAR EL SÍMBOLO DE MONEDA
//	 $t=substr_cont($fech);
	// $tt=intstrlen(string $fech);
	 $pr=substr($pre,0,-1);
	 $p=explode(".",$pr);
	 	 $costop=$p[0]."".$p[1]."".$p[2]."".$p[3]."".$p[4]."".$p[5]."".$p[6]."".$p[7]."".$p[8]."".$p[9];


		echo "<option value='$producto[0]#$costop#$producto[7]#$producto[8]'>  $producto[1]&nbsp;Bs&nbsp;-->&nbsp;&nbsp;$costop &nbsp;&nbsp;IVA -->&nbsp;$producto[8]</option>
		";	
		}
		echo "</select>";	
	}//fin de la función listar_productos
	
	
	function buscar_cliente($conexion,$cedula,$preced)
	{
	$cedulacomp=$preced.$cedula;
	//error_reporting(E_ALL); ini_set('display_errors', '1');
		$res3=$conexion->sentencia("
		SELECT 
  p.id,
  ((SELECT descripcion  FROM persona.prefijo_cedula where id=p.pre_cedula)||p.cedula) as cedula,
  (p.nombres||' '||p.apellidos) as nombres, 
  (pa.id) as id_fact, 
  ((SELECT descripcion  FROM persona.prefijo_cedula where id=pa.pre_cedula)||pa.cedula) as cedulafact, 
  (pa.nombres||' '||pa.apellidos) as apellido_fact, 
  (pa.diresccion) as diresccion, 
 ('0'||(SELECT  numero FROM persona.prefijo_telefono where id=pa.pre_tel_hab)||'-'||pa.telf_habitacion) as tefefono1,
 ('0'||(SELECT  numero FROM persona.prefijo_telefono where id=pa.pre_tel_personal)||'-'||pa.telef_personal) as tefefono2

FROM 
  
  persona.persona as p,
  persona.persona_adicionales as pa
  
where 
  p.cedula='$cedula'
and pa.id_persona_estu=p.id and pa.fracturacion=1 and pa.id_estatus=1");
			$datos=$conexion->filas($res3);
			$tabla="
<input type='hidden' name='id_per' id='id_per' value='$datos[id]'>
<input type='text' name='id_per_fact' id='id_per_fact' value='$datos[id_fact]'>

			<table width='100%' border='1' cellspacing='0' align='center' bgcolor='#EDEDED'  style='border-left:hidden; border-top:hidden; border-right:hidden; font-size: 13px'>

  <tr>
    <td><strong>Estudiante:</strong></td>
    <td><b>NOMBRES Y APELLIDOS</b></td>
    <td>$datos[nombres]</td>
    <td><strong>CED\RIF</strong></td>
    <td >$datos[cedula]</td>
	<td rowspan='2'>NRO. TELEFONICO:</td>
    <td>$datos[tefefono1]</td>
  </tr>
 
  <tr>
    <td rowspan='2'><strong>Datos de Facturaci&oacute;n </strong></td>
    <td><b>NOMBRES Y APELLIDOS O RAZON SOCIAL:</b></td>
    <td>$datos[apellido_fact]</td>
    <td><strong>CED\RIF:</strong></td>
    <td>$datos[cedulafact]</td>
    <td>$datos[tefefono2]</td>
  </tr>
  <tr>
    <td><b>DIRECCION</b></td>
    <td colspan='5'>$datos[diresccion]</td>
    </tr>
</table>";
		if($datos["cedula"]!='')
			echo $tabla;
		else 
			echo  "
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			<b style='font-size:medium; color:red;'>
			REGISTRO NO ENCONTRADO </b>";
		//	}//Fin del while	
	}//Fin de la función buscar_cliente


} //Fin de la clase factura

?>
