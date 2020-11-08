<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php

function personaPRE()
{
?>
	<div class="container-fluid">
 		 <div class="row">
		<h2  style=" margin:0; border-radius: 20px 20px 0px 0px;  text-align: center;">Personas</h2>
                <table class='table table-hover'>
                    <thead>
                        <tr class="">
							<th onclick="prueba2.asignar({capoOrdernar:'id'});">Id</th>
                            <th onclick="prueba2.asignar({capoOrdernar:'cedula'});">Cedula</th>
                            <th onclick="prueba2.asignar({capoOrdernar:'apellidos'});">Apellidos</th>
                            <th onclick="prueba2.asignar({capoOrdernar:'nombres'});">Nombres</th>
                            <th onclick="prueba2.asignar({capoOrdernar:'descestatus'});">Estatus</th>
							<th >Ver</th>
                        </tr>
                    </thead>
                    <tbody id="datos">
                    </tbody>
                </table>
               <script>
			   		prueba2= new Paginador('vista/persona_json.php', 'datos',function(data){
							tablaBody=$('#datos');
							for(var i=0; i<data.length;i++){
								var usuario=data[i];
								tablaBody.append('<tr ><td >'+usuario.id+'</td><td >'+usuario.cedula+'</td><td>'+usuario.apellido+'</td><td>'+usuario.nombre+'</td><td>'+usuario.descestatus+'</td><td><a href=\'index.php?s=coper2&id_persona='+usuario.id +'\' target=\'_blank\' ><img src=\'imagenes/ver-detalles_318-1493__.png\' width=\'30\' height=\'30\' /></a></td></tr>');
					}
				});
				prueba2.listar();
               </script>
         
			</div>
	</div>


<?php } ?>
</html>
