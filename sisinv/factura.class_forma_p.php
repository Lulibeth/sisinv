<?php
/*Para crear una clase en php usamos la sentencia class*/
class factura
{
	function imprimir_fila2($x,$fila)
	{
		echo "<td align='center' width='30px'><a href='javascript:borrar_fila2($fila)'>
			<img src='http://".$_SERVER['HTTP_HOST']."/sisadmac/stssai/Imagenes/menos.png' height='30' width='30'  title='ELIMINAR'/></a></td>
			
			<td  align='center' width='200px'>";
		$this-> listar_fp($x,$fila);
		/*la sentencia $this sirve para instancial un objeto de su misma clase*/
		echo "</td><td align='center' width='90px'>hola
			<input class='form-control1' name='cantidad$fila' id='cantidad$fila' type='text'  style='width:80%;' value='' size='5' maxlength='2' onChange='sumar($fila)' ></td>
		
		<td align='center' width='100px'>
		<input class='form-control1' align='center' name='precio$fila' id='precio$fila' type='text' value='0' size='5' maxlength='5'  style='width:80%;' readonly='readonly' onChange='sumar($fila)'></td>
		<td align='center' width='100px'> 
		<input class='form-control1' name='impuesto$fila' id='impuesto$fila' type='hidden'  value='0' size='5' maxlength='5'  style='width:80%;' readonly='readonly'></td>"; /*	*/
	   
	}//Fin de la función imprimir_fila
	
	
	
	function listar_fp($conexion,$nro)
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
	}//fin de la función listar_productos

	

} //Fin de la clase factura

?>
