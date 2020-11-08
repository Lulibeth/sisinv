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
$arti=strtoupper($_REQUEST['articu']);

$consulpersona=$conex->sentencia("SELECT descripcion
  FROM factu_inv.articulo
  where descripcion='$arti' and estatus=1");
  $numcedu=$conex->numfilas($consulpersona);
if($numcedu>0)
{
?>
<script type="text/javascript">
alert('Disculpe! Articulo ya Registrado!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{

 $sqlitalla="INSERT INTO factu_inv.articulo(
            descripcion, estatus, usuario, ip,fecha)
    VALUES ( '$arti', 1, $id_usuario, '$ip','$fecha');";
	
 $rest = pg_query($sqlitalla); 

if($rest){
?>
<script type="text/javascript">
alert('Articulo Registrado con Exito!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{
?>
<script type="text/javascript">
alert('Disculpa, Articulo NO Registrado!');
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