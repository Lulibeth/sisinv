 <script>
function iva_produc()
{

	var arti_iva =document.getElementById('iva').value; 
	var arti_precio =document.getElementById('precio').value; 
	var calcular;
	var ncalcu;
	var id_iva;

ncalcu=arti_iva.split("#")[0];
id_iva=arti_iva.split("#")[1];


	
		calcular=((parseFloat(arti_precio)*parseFloat(ncalcu))+parseFloat(arti_precio));		
		
			document.getElementById('valor').value=calcular;
			document.getElementById('ivaid').value=id_iva;

}
</script>
	<!--<h2 class="inner-tittle" align="center">Ingresar Producto </h2> -->

<form action="guardar/G_producto.php" name="inpro" id="inpro" method="post"> 
<div class="form-group"> 

<div class="col-md-2"><label for="exampleInputtext">Artículo</label> </div>
<div class="col-md-2"><select name="descrip" id="descrip" class="form-control1">
<option>Seleccion</option>
<?Php

$descrip=$conex->sentencia("SELECT id, descripcion  FROM factu_inv.articulo where  estatus=1");
		while($dadescrip=$conex->filas($descrip)){
		$id_talla=$dadescrip["id"];
		$descripcion_talla=$dadescrip["descripcion"];
		echo "<option value='$id_talla'>$descripcion_talla</option>";
		}
?>
</select></div>

<div class="col-md-2"><label for="exampleInputtext">Tipo de P.</label> </div>
<div class="col-md-2"><select name="tipro" id="tipro" class="form-control1">
<option>Seleccion</option>
<?Php

$descrip=$conex->sentencia("SELECT id, descripcion  FROM factu_inv.tip_produ where  estatus=1");
		while($dadescrip=$conex->filas($descrip)){
		$id_tip_produ=$dadescrip["id"];
		$descripcion_tip_produ=$dadescrip["descripcion"];
		echo "<option value='$id_tip_produ'>$descripcion_tip_produ</option>";
		}
?>
</select></div>


<div class="col-md-2"><label for="exampleInputtext">Talla</label> </div>
<div class="col-md-2"><select name="talla" id="talla" class="form-control1">
<option>Seleccion</option>
<?Php

$talla=$conex->sentencia("SELECT id, descripcion
  FROM factu_inv.talla where estatus=1");
		while($datotalla=$conex->filas($talla)){
		$id_talla=$datotalla["id"];
		$descripcion_talla=$datotalla["descripcion"];
		echo "<option value='$id_talla'>$descripcion_talla</option>";
		}
?>
</select></div>
</div>

<br/><br/>

<div class="form-group"> 

<div class="col-md-2"><label for="exampleInputtext">Proveedor</label> </div>
<div class="col-md-2">
<select name="provee" id="provee" class="form-control1">
<option>Seleccion</option>
<?Php

$proveedor=$conex->sentencia("SELECT id, descripcion
  FROM factu_inv.proveedor where estatus=1");
		while($datoproveedor=$conex->filas($proveedor)){
		$id_proveedor=$datoproveedor["id"];
		$descripcion_proveedor=$datoproveedor["descripcion"];
		echo "<option value='$id_proveedor'>$descripcion_proveedor</option>";
		}
?>
</select></div>

<div class="col-md-2"><label for="exampleInputtext">Cantidad</label> </div>
<div class="col-md-2"><input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad"> </div>

<div class="col-md-2"><label for="exampleInputNumber">Precio Unitario</label></div> 
<div class="col-md-2"><input type="number/text" class="form-control" id="precio" name="precio" placeholder="Precio"> </div>

</div>

<br/><br/>

<div class="form-group"> 
<div class="col-md-2"><label for="exampleInputDate">Iva</label> </div>
<div class="col-md-4">
<select name="iva" id="iva" onchange="iva_produc()" class="form-control1">
<option>Seleccion</option>
<?Php

$iva=$conex->sentencia("SELECT id, n_calcular,descripcion
  FROM factu_inv.iva where estatus=1 order by descripcion");
		while($datoiva=$conex->filas($iva)){
		$id_iva=$datoiva["id"];
		$n_calcular=$datoiva["n_calcular"];
		$descripcion_iva=$datoiva["descripcion"];
		echo "<option value='$n_calcular#$id_iva'>$descripcion_iva</option>";
		}
?>
</select></div>
<input name="ivaid" id="ivaid" type="hidden" value="0" />
<div class="col-md-2"><label for="exampleInputNumber">Valor Total Unitario</label></div> 
<div class="col-md-4"><input type="number/text" class="form-control" id="valor" name="valor" value="0" readonly="readonly"> </div>



</div> 
<br/><br/>
<div class="form-group"> 
<div class="col-md-6"><label for="exampleInputDate">Fecha de ingreso</label> </div>
<div class="col-md-6"><input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha"></div>
</div>



<br/><br/>
<div align="center"> <button type="submit" class="btn btn-default">Ingresar</button> </div>



</form> 


