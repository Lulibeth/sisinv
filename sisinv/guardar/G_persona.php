<?Php
@session_start();
		$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fecha=date("d/m/Y");
function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}
$ip=getRealIP();

require_once('../conectarpg.php'); 
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);
///////////////////////////////////////////////////////////////////////////////////////////////////
$cedula=$_REQUEST['cedula'];
$preced=$_REQUEST['preced'];
$nombre=strtoupper($_REQUEST['nombre']);
$apellido=strtoupper($_REQUEST['apellido']);
$direccion=strtoupper($_REQUEST['direccion']);
$telefono=$_REQUEST['telefono'];


$consulpersona=$conex->sentencia("SELECT id
  FROM persona.persona
  where cedula=$cedula");
  $numcedu=$conex->numfilas($consulpersona);
if($numcedu>0)
{
?>
<script type="text/javascript">
alert('Cedula ya Registrada!');
var pagina="../index.php?s=basicoper";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{

 echo $sqlinperso="INSERT INTO persona.persona(
          cedula, nombre, apellido, direccion, telefono, estatus, usuario, 
            fecha, ip,precedu)
    VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono', '1', '$id_usuario','$fecha', '$ip','$preced');";
	
$resper = pg_query($sqlinperso);

if($resper){
?>
<script type="text/javascript">
alert('Datos Registrados con Exito!');
var pagina="../index.php?s=basicoper";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{
?>
<script type="text/javascript">
alert('Disculpa, Datos NO Registrados!');
var pagina="../index.php?s=basicoper";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php 
pg_last_error();
}
}
?>