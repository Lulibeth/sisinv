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
$nombre=strtoupper($_REQUEST['nombre_em']);
$rif=($_REQUEST['rif']);
$letrarif=strtoupper($_REQUEST['le_rif']);
$telefono=($_REQUEST['telef']);
$direccion=strtoupper($_REQUEST['direc']);

$rif_c= $letrarif.$rif;

$consulpersona=$conex->sentencia("SELECT nombre, direccion, estatus, rif, ip, num_telef
  FROM empresa.empresa where rif='$rif_c'");
  $numcedu=$conex->numfilas($consulpersona);

if($numcedu>0)
{
?>
<script type="text/javascript">
alert('Rif ya Registrado!');
var pagina="../index.php?s=inemp";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{

$sqlinpersocar="INSERT INTO empresa.empresa(
             nombre, direccion, estatus, rif, fecha, ip, num_telef)
    VALUES ( '$nombre', '$direccion', '1', '$rif_c', '$fecha', '$ip', '$telefono');
";
	
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
var pagina="../index.php?s=basicoempre";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php 
pg_last_error();
}
}
?>