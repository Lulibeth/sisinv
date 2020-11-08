

<!--	<h2 class="inner-tittle" align="center">Ingresar Proveedor  </h2> -->
<form action="guardar/G_prove.php" name="inprove" id="inprove" method="post"> 
<div class="form-group"> 
<div class="col-md-3"><label for="exampleInputtext">Nombre o Razon Social</label> </div>
<div class="col-md-3"><input type="text"  class="form-control" id="descrip" name="descrip" placeholder="SARA CA."> </div>
<div class="col-md-2"><label for="exampleInputtext">Rif O Cedula</label> </div>
<div class="col-md-1"><select name="prerif" id="prerif" class="form-control1">
<option>Seleccion</option>
<option value="V-">V-</option>
<option value="E-">E-</option>
<option value="J-">J-</option>
<option value="G-">G-</option>
<option value="O-">O-</option>
</select>
</div>
<div class="col-md-3"><input type="number" maxlength="12" class="form-control" id="cedu" name="cedu" placeholder="00000000-0"> </div>
</div>


<br /><br /><br />
<div class="form-group"> 
<div class="col-md-3"><label for="exampleInputtext">Telefono</label> </div>
<div class="col-md-3"><input maxlength="12" type="number" class="form-control" id="telef" name="telef" placeholder="0000-0000000"> </div>
<div class="col-md-3"><label for="exampleInputtext">Telefono</label> </div>
<div class="col-md-3"><input maxlength="12" type="number" class="form-control" id="telef_" name="telef_" placeholder="0000-0000000"> </div>
</div>


<br/><br/>

<div align="center"> <button type="submit" class="btn btn-default">Ingresar</button> </div>

</form> 
