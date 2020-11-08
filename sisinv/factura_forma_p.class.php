<?php
/*Para crear una clase en php usamos la sentencia class*/
class factura
{
	function imprimir_fila2($x,$fila,$facturaid)
	{
		echo "<td align='center' ><a href='javascript:borrar_fila2($fila)'>
			<img src='http://".$_SERVER['HTTP_HOST']."/sisadmac/stssai/Imagenes/menos.png' height='30' width='30'  title='ELIMINAR'/></a></td>
			<td align='center' >
		<input class='form-control1' name='monto$fila' id='monto$fila' type='text'  style='width:80%;' value='' size='5'  onChange='sumar($fila)'  required=''>
		</td>
			
			<td  align='center' >";
		$this-> listar_fp($x,$fila);
		/*la sentencia $this sirve para instancial un objeto de su misma clase*/
		echo "</td>
		<td align='center'>
		<input class='form-control1' align='center' name='ntrans$fila' id='ntrans$fila' type='text'  size='5'   style='width:80%;' required='' >
		</td>
		<td align='center' > 
		<input class='form-control1 ng-invalid ng-invalid-required' ng-model='model.date' name='fechfatran$fila' id='fechfatran$fila' type='date'  size='5' style='width:80%;' required=''>
		</td>
	<td  align='center' > ";
		$this-> listar_servi($x,$fila,$facturaid);
		/*la sentencia $this sirve para instancial un objeto de su misma clase*/
		echo "</td>
		"; /*	*/
	   
	}//Fin de la función imprimir_fila
	

	function listar_fp($conexion,$nro)
	{	
		$sql=$conexion->sentencia("SELECT id_fp, descripcion_fp, status_fp
	  FROM facturacion.forma_pago order by id_fp");
	//	$resultado=pg_query($sql,$x);
		echo "<select class='form-control1' name='fp_factura$nro' id='fp_factura$nro'  style='width:90%;' onchange='sumar($nro)'>";
		echo "<option  value='' >Seleccione </option>";	
		while($fp=$conexion->filas($sql))
		{
		echo "<option value='$fp[0]'> $fp[1] </option>";	

		}
		echo "</select>";	
	}//fin de la función listar_productos
	
	function listar_servi($conexion,$nro,$facturaid)
	{	
		$sqlxcd=$conexion->sentencia("SELECT 
s.id_ser,s.descripcion_ser
  FROM 
	facturacion.factura as f,
	facturacion.detalle_factura as df,
	facturacion.servicio  as s


where 
f.id_fact=$facturaid
and f.id_fact=df.id_fact
and s.id_ser=df.id_ser");
	//	$resultado=pg_query($sql,$x);
		echo "<select class='form-control1' name='servi$nro' id='servi$nro'  style='width:90%;'>";
		echo "<option  value='' >Seleccione </option>";	
		while($fpxx=$conexion->filas($sqlxcd))
		{
		echo "<option value='$fpxx[0]'> $fpxx[1] </option>";	

		}
		echo "</select>";	
	}//fin de la función listar_productos

	

} //Fin de la clase factura

?>
