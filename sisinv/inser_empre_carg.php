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
<form action="guardar/G_cargo.php" name="incar" id="incar" method="post"> 
<div class="form-group"> 


<div class="col-md-6"><label for="exampleInputtext">Ingrese Cargo</label> </div>
<div class="col-md-6"><input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"></div> 

</div>


<div align="center"> <button type="submit" class="btn btn-default">Ingresar</button> </div>
   
   
   </form> 
</div>
</div>
</div>
											