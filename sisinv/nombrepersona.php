
 
 <script>
function cargaroferta()
{
		   var persona =document.getElementById('persona').value; 
			libAjax('form1re1','contenido/cargaroferta.php?persona='+persona,'divofertad');

}

function cargarmaterias()
{
//alert("csd");
	
			var persona=document.getElementById('persona').value;
				libAjax('form1re1','contenido/modifi_mat_guardar2.php?persona='+persona,'divmateria');

}
function cargarmateriasr()
{
//alert("csd");
	
			var persona=document.getElementById('persona').value;
				libAjax('form1re1','contenido/modifi_mat_guardar3.php?persona='+persona,'divmateria3');

}



function cargartabla()
{
var estudiante=document.getElementById('personafactura').value.split("#");//estu

var estudiante2=document.getElementById('personafactura').value=estudiante[0];//fact
var fact=document.getElementById('personafactura').value=estudiante[1];//fact


				libAjax('form1mat','contenido/tabla_persona_fact.php?estudiante='+estudiante2+'&fact='+fact,'divtablapersona', function(){
				$('#sectorizacion').css({'display':'inline-block'});
				});

}

</script>
<?php
session_start(); 
    $cedula=$_REQUEST["cedula"];

 
require_once('conectarpg.php'); 
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);  


   $personaver="SELECT id, cedula, nombre, apellido
  FROM persona.persona
  where cedula = '$cedula' ";  
 $nompersonaver=$conex->sentencia($personaver);
 $numdatres_dsmatxx=$conex->numfilas($nompersonaver);
 if($numdatres_dsmatxx>0){
 while($datres_dsmatxx=$conex->filas($nompersonaver))
						{ 
						 $id_personax=$datres_dsmatxx["id"];
						 $cedulax=$datres_dsmatxx["cedula"];
						 $nombres=$datres_dsmatxx["nombre"];
						 $apellidos=$datres_dsmatxx["apellido"];
						echo "<div class='alert-success alert-dismissible fade in' role='alert' align='center'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>*</span></button> <h4>Bienvenido! Verifica Informacion!</h4> <p > Numero de Cedula: <strong>$cedulax</strong>, Nombre: <strong>$nombres</strong>, Apellido: <strong>$apellidos</strong><br> si estos son tus datos puedes continuar de lo contrario verifica tu cedula </p> </div>";
						}
						}else{	echo "<div class='alert-success' role='alert' align='center' > <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>*</span></button> <h4>Disculpe! Verifica tu Informacion!</h4> <p > Este Numero de Cedula: <strong>$cedula</strong>, no se encuentra en nuestra base de datos </p> </div>";
						
						}
						
		 	/*$comparar="SELECT id, codigo, correo
  FROM inscripcion.codigo_secreto
  where id_persona=$id_personax and substring(cast(fecha as text),0,5)=substring(cast(now() as text),0,5)  order by fecha desc  limit 1  ";  
 $vercomparar=$conex->sentencia($comparar);
  $numcomparar=$conex->numfilas($vercomparar);
  if($numcomparar>0){
 while($datcomparar=$conex->filas($vercomparar))
						{ 
 $correo=$datcomparar["correo"];
echo "<div class='alert alert-danger alert-dismissible fade in' role='alert' align='center'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>*</span></button> <h4>Disculpe! Verifica Informacion!</h4> <p > Ya fue enviado a su correo $correo el codigo secreto para que continues con el proceso sin utilizar la opcion Solicitar Codigo </p> </div>";
					}	
					$cedulax='';
					}	*/
			
						?>
<input  name='cedulaesta' id='cedulaesta' type='hidden' required='' value='<?Php echo $cedulax; ?>'>
<input  name='id_personax' id='id_personax' type='hidden' required='' value='<?Php echo $id_personax; ?>'>

		
