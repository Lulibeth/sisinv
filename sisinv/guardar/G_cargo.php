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
$nombre=strtoupper($_REQUEST['nombre']);


$consulpersona=$conex->sentencia("SELECT  nombre
  FROM empresa.cargo
where nombre='$nombre'");
  $numcedu=$conex->numfilas($consulpersona);

if($numcedu>0)
{
?>
<script type="text/javascript">
alert('Cargo ya Registrado!');
var pagina="../index.php?s=basicoempre";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{

$sqlinpersocar="INSERT INTO empresa.cargo(
             nombre, estatus, usuario)
    VALUES ('$nombre', '1', '$id_usuario')";
	
$resper = pg_query($sqlinpersocar);

if($resper){
?>
<script type="text/javascript">
alert('Datos Registrados con Exito!');
var pagina="../index.php?s=basicoempre";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{
?>
<script type="text/javascript">
alert('Disculpa, Datos NO Registrados!');
var pagina="../index.php?s=inpercar";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php 
pg_last_error();
}
}
?>