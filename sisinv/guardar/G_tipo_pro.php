<?Php
@session_start();
		$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fecha=date("d/m/Y - H:i:s");
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
$des_art=strtoupper($_REQUEST['des_arti']);

$consulpersona=$conex->sentencia("SELECT descripcion
  FROM factu_inv.tip_produ
  where descripcion='$des_art'");
  $numcedu=$conex->numfilas($consulpersona);
if($numcedu>0)
{
?>
<script type="text/javascript">
alert('Disculpe! Tipo de Articulo ya Registrado!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{
 $sqlintipoproduct="INSERT INTO factu_inv.tip_produ(
             descripcion, estatus, usuario, fecha, ip)
    VALUES ( '$des_art', '1', '$id_usuario', '$fecha', '$ip');";
	
 $restp = pg_query($sqlintipoproduct); 

if($restp){
?>
<script type="text/javascript">
alert('Datos Registrados con Exito!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{
?>
<script type="text/javascript">
alert('Disculpa, Datos NO Registrados!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php 
//pg_last_error();
}
}

?>