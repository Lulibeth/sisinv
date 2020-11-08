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
<form action="guardar/G_empresa.php" name="inemp" id="inemp" method="post"> 
<div class="form-group"> 

<div class="col-md-1"><label for="exampleInputtext">Rif</label></div>
<div class="col-md-1"><select name="le_rif" id="le_rif" class="form-control1">
<option>Seleccion</option>
<option value="V-">V-</option>
<option value="E-">E-</option>
<option value="J-">J-</option>
<option value="G-">G-</option>
</select> </div>
<div class="col-md-2"><input type="number" class="form-control" id="rif" name="rif" placeholder="Rif"> </div>

<div class="col-md-2"><label for="exampleInputtext">Nombre de la Empresa</label> </div>
<div class="col-md-2"><input type="text" class="form-control" id="nombre_em" name="nombre_em" placeholder="Nombre"></div>

<div class="col-md-2">
  <label for="exampleInputtext">N&uacute;mero de Tel&eacutefono </label> </div>
<div class="col-md-2"><input type="number" class="form-control" id="telef" name="telef" placeholder="Telefono"></div>


</div>

<div class="form-group"> 

<br/> <br/> <br/> <br/>
<div class="col-md-3">
  <label for="exampleInputtext">Direcci&oacute;n</label> </div>
<div class="col-md-9"><input type="text" class="form-control" id="direc" name="direc" placeholder="Direccion"></div> 

</div>


<div align="center"> <button type="submit" class="btn btn-default">Ingresar</button> </div>
   
   
   </form> 
</div>
</div>
</div>
											