 <script>
function iva()
{
	var arti_iva =document.getElementById('arti_iva').value; 
	var calcular;
		calcular=(arti_iva/100);		
			document.getElementById('calcu').value=calcular;
}
</script>

<div class="form-group">

<form action="guardar/G_iva.php" name="iniva" id="iniva" method="post"> 
<div class="col-md-3"><label for="exampleInputtext">Ingresar Iva</label> </div>
<div class="col-md-3"><input type="number" onkeyup="iva()" class="form-control" id="arti_iva" name="arti_iva" placeholder="12"> </div>

<div class="col-md-3"><label for="exampleInputtext">Numero Calcular</label> </div>
<div class="col-md-3"><input type="text"  class="form-control" id="calcu" name="calcu" readonly="readonly" > </div>

<div align="center"> <button type="submit" class="btn btn-default">Ingresar</button> </div>

</form> 

</div>







