<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php

function empresaPRE()
{
?>
<script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.js"></script>

<script type="text/javascript">
function popup(url) {
var  ancho=900;
 var alto=600;

var posicion_x; 
var posicion_y; 

posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "leonpurpura.com", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=yes,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script> 
	<div class="container-fluid">
 		 <div class="row">
		<h2  style=" margin:0; border-radius: 20px 20px 0px 0px;  text-align: center;">Empresa</h2>
                <table class='table table-hover'>
                    <thead>
                        <tr class="">
							<th onclick="prueba2.asignar({capoOrdernar:'id'});">Id</th>
                            <th onclick="prueba2.asignar({capoOrdernar:'rif'});">Rif</th>
							<th onclick="prueba2.asignar({capoOrdernar:'nombre_em'});">Nombre de la Empresa</th>
							<th onclick="prueba2.asignar({capoOrdernar:'telef'});">Numero de Telefono</th>
							<th onclick="prueba2.asignar({capoOrdernar:'direc'});">Direccion</th>
							<th onclick="prueba2.asignar({capoOrdernar:'estatus'});">Estatus</th>
							<th >Editar</th>
                        </tr>
                    </thead>
                    <tbody id="datos">
                    </tbody>
                </table>

			   
			    <script>
			   		prueba2= new Paginador('vista/empresa_json.php', 'datos',function(data){
							tablaBody=$('#datos');
							for(var i=0; i<data.length;i++){
								var usuario=data[i];
								tablaBody.append('<tr ><td >'+usuario.id+'</td><td >'+usuario.rif+'</td><td>'+usuario.nombre+'</td><td>'+usuario.num_telef+'</td><td>'+usuario.direccion+'</td><td>'+usuario.descestatus+'</td><td><a href=javascript:popup(\'Empresa_editar.php?nest='+usuario.id+'\') ><img src=\'imagenes/ver-detalles_318-1493__.png\' width=\'30\' height=\'30\' /></a></td></tr>');
					}
				});
				prueba2.listar();
               </script>
         
			</div>
	</div>


<?php } ?>
</html>
