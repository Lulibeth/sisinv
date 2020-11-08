<?Php
@session_start();
$nomusuario=$_SESSION["nombres"];
$alusuario=$_SESSION["apellidos"];
$fotouuario=$_SESSION['s_foto'];
?>
											
												<!--/forms-->
<div class="forms-main">
	<div class="graph-form">
		<div class="form-body">
<form action="guardar/G_persona.php" name="inper" id="inper" method="post"> 
<div class="form-group"> 

<div class="col-md-3"><label for="exampleInputtext">Cédula</label></div>
<div class="col-md-3"><select name="preced" id="preced" class="form-control1">
<option>Seleccion</option>
<option value="V-">V-</option>
<option value="E-">E-</option>
</select> </div>
<div class="col-md-3"><input type="number" class="form-control" id="cedula" name="cedula" placeholder="Cédula"> </div>
<br/><br/>
</div>
<div class="form-group"> 

<div class="col-md-3"><label for="exampleInputtext">Nombres</label> </div>
<div class="col-md-3"><input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres"></div> 

<div class="col-md-3"><label for="exampleInputtext">Apellidos</label></div>
<div class="col-md-3"><input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos"></div> 

</div>
<br/><br/>

<div class="form-group"> 

<div class="col-md-2"><label for="exampleInputNumber">Teléfono</label></div>
<div class="col-md-3"> <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono"> </div> 


<div class="col-md-3"><label for="exampleInputtext">Dirección</label></div>
<div class="col-md-4"><input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección"></div>


</div>
<br/><br/>

<div align="center"> <button type="submit" class="btn btn-default">Ingresar</button> </div>
   
   
   </form> 
</div>
</div>
</div>
											